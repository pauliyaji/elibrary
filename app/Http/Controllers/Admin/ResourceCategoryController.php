<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\ResourceCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResourceCategoryController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('resource_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resource-category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('resource_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resource-category.create');
    }

    public function edit(ResourceCategory $resourceCategory)
    {
        abort_if(Gate::denies('resource_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.resource-category.edit', compact('resourceCategory'));
    }

    public function show(ResourceCategory $resourceCategory)
    {
        abort_if(Gate::denies('resource_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resourceCategory->load('owner');

        return view('admin.resource-category.show', compact('resourceCategory'));
    }

    public function __construct()
    {
        $this->csvImportModel = ResourceCategory::class;
    }
}
