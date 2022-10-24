<?php

namespace Modules\Content\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Modules\Content\Http\Requests\MassDestroyContentTagRequest;
use Modules\Content\Http\Requests\StoreContentTagRequest;
use Modules\Content\Http\Requests\UpdateContentTagRequest;
use Modules\Content\Entities\ContentTag;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ContentTagController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('content_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentTags = ContentTag::all();

        return view('admin.contentTags.index', compact('contentTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('content_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contentTags.create');
    }

    public function store(StoreContentTagRequest $request)
    {
        $contentTag = ContentTag::create($request->all());

        return redirect()->route('admin.content-tags.index');
    }

    public function edit(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contentTags.edit', compact('contentTag'));
    }

    public function update(UpdateContentTagRequest $request, ContentTag $contentTag)
    {
        $contentTag->update($request->all());

        return redirect()->route('admin.content-tags.index');
    }

    public function show(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.contentTags.show', compact('contentTag'));
    }

    public function destroy(ContentTag $contentTag)
    {
        abort_if(Gate::denies('content_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $contentTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyContentTagRequest $request)
    {
        ContentTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
