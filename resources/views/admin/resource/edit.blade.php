@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.resource.title_singular') }}:
                    {{ trans('cruds.resource.fields.id') }}
                    {{ $resource->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('resource.edit', [$resource])
        </div>
    </div>
</div>
@endsection