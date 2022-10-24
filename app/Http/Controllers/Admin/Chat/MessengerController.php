<?php

namespace App\Http\Controllers\Admin\Chat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Chat\ChatTopicCreateRequest;
use App\Http\Requests\Chat\ChatTopicReplyRequest;
use App\Models\Chat\ChatTopic;
use App\Models\User\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessengerController extends Controller
{
    public function index()
    {
        $topics = ChatTopic::where(function ($query) {
            $query
                ->where('creator_id', Auth::id())
                ->orWhere('receiver_id', Auth::id());
        })
            ->orderBy('created_at', 'DESC')
            ->get();

        $title   = trans('global.all_messages');
        $unreads = $this->unreadTopics();

        return view('admin.messenger.index', compact('topics', 'title', 'unreads'));
    }

    public function createTopic()
    {
        $users = User::all()
            ->except(Auth::id());

        $unreads = $this->unreadTopics();

        return view('admin.messenger.create', compact('users', 'unreads'));
    }

    public function storeTopic(ChatTopicCreateRequest $request)
    {
        $topic = ChatTopic::create([
            'subject'     => $request->input('subject'),
            'creator_id'  => Auth::id(),
            'receiver_id' => $request->input('recipient'),
        ]);

        $topic->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
        ]);

        return redirect()->route('admin.messenger.index');
    }

    public function showMessages(ChatTopic $topic)
    {
        $this->checkAccessRights($topic);

        foreach ($topic->messages as $message) {
            if ($message->sender_id !== Auth::id() && $message->read_at === null) {
                $message->read_at = Carbon::now();
                $message->save();
            }
        }

        $unreads = $this->unreadTopics();

        return view('admin.messenger.show', compact('topic', 'unreads'));
    }

    public function destroyTopic(ChatTopic $topic)
    {
        $this->checkAccessRights($topic);

        $topic->delete();

        return redirect()->route('admin.messenger.index');
    }

    public function showInbox()
    {
        $title = trans('global.inbox');

        $topics = ChatTopic::where('receiver_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreads = $this->unreadTopics();

        return view('admin.messenger.index', compact('topics', 'title', 'unreads'));
    }

    public function showOutbox()
    {
        $title = trans('global.outbox');

        $topics = ChatTopic::where('creator_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();

        $unreads = $this->unreadTopics();

        return view('admin.messenger.index', compact('topics', 'title', 'unreads'));
    }

    public function replyToTopic(ChatTopicReplyRequest $request, ChatTopic $topic)
    {
        $this->checkAccessRights($topic);

        $topic->messages()->create([
            'sender_id' => Auth::id(),
            'content'   => $request->input('content'),
        ]);

        return redirect()->route('admin.messenger.index');
    }

    public function showReply(ChatTopic $topic)
    {
        $this->checkAccessRights($topic);

        $receiverOrCreator = $topic->receiverOrCreator();

        if ($receiverOrCreator === null || $receiverOrCreator->trashed()) {
            abort(404);
        }

        $unreads = $this->unreadTopics();

        return view('admin.messenger.reply', compact('topic', 'unreads'));
    }

    public function unreadTopics(): array
    {
        $topics = ChatTopic::where(function ($query) {
            $query
                ->where('creator_id', Auth::id())
                ->orWhere('receiver_id', Auth::id());
        })
            ->with('messages')
            ->orderBy('created_at', 'DESC')
            ->get();

        $inboxUnreadCount  = 0;
        $outboxUnreadCount = 0;

        foreach ($topics as $topic) {
            foreach ($topic->messages as $message) {
                if (
                    $message->sender_id !== Auth::id()
                    && $message->read_at === null
                ) {
                    if ($topic->creator_id !== Auth::id()) {
                        ++$inboxUnreadCount;
                    } else {
                        ++$outboxUnreadCount;
                    }
                }
            }
        }

        return [
            'inbox'  => $inboxUnreadCount,
            'outbox' => $outboxUnreadCount,
        ];
    }

    private function checkAccessRights(ChatTopic $topic)
    {
        $user = Auth::user();

        if ($topic->creator_id !== $user->id && $topic->receiver_id !== $user->id) {
            abort(401);
        }
    }
}
