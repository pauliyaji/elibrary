<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\WithCSVImport;
use App\Models\BookCategory;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookCategoryController extends Controller
{
    use WithCSVImport;

    public function index()
    {
        abort_if(Gate::denies('book_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.book-category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('book_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.book-category.create');
    }

    public function edit(BookCategory $bookCategory)
    {
        abort_if(Gate::denies('book_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.book-category.edit', compact('bookCategory'));
    }

    public function __construct()
    {
        $this->csvImportModel = BookCategory::class;
    }
}
