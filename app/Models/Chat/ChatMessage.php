<?php

namespace App\Models\Chat;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $fillable = [
        'topic_id',
        'sender_id',
        'content',
        'read_at',
    ];

    protected $dates = [
        'sent_at',
    ];

    public function topic()
    {
        return $this->belongsTo(ChatTopic::class);
    }

    public function sender()
    {
        return $this->hasOne(User::class, 'id', 'sender_id')->withTrashed();
    }
}
