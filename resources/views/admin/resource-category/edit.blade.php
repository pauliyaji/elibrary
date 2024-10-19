@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.resourceCategory.title_singular') }}:
                    {{ trans('cruds.resourceCategory.fields.id') }}
                    {{ $resourceCategory->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('resource-category.edit', [$resourceCategory])
        </div>
    </div>
</div>
@endsection