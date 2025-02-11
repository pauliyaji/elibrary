@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.bookCategory.title_singular') }}:
                    {{ trans('cruds.bookCategory.fields.id') }}
                    {{ $bookCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('book-category.edit', [$bookCategory])
        </div>
    </div>
</div>
@endsection