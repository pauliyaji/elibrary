<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\Resource;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResourceController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('resource_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resource.index');
    }

    public function create()
    {
        abort_if(Gate::denies('resource_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resource.create');
    }

    public function edit(Resource $resource)
    {
        abort_if(Gate::denies('resource_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resource.edit', compact('resource'));
    }

    public function show(Resource $resource)
    {
        abort_if(Gate::denies('resource_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource->load('tag', 'bookCategory', 'resourceCategory', 'owner');

        return view('admin.resource.show', compact('resource'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['resource_create', 'resource_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }

        $model                     = new Resource();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    public function __construct()
    {
        $this->csvImportModel = Resource::class;
    }
}
