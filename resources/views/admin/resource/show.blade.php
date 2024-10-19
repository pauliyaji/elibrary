@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.resource.title_singular') }}:
                    {{ trans('cruds.resource.fields.id') }}
                    {{ $resource->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.id') }}
                            </th>
                            <td>
                                {{ $resource->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.title') }}
                            </th>
                            <td>
                                {{ $resource->title }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.slug') }}
                            </th>
                            <td>
                                {{ $resource->slug }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.authors') }}
                            </th>
                            <td>
                                {{ $resource->authors }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.authors_affiliations') }}
                            </th>
                            <td>
                                {{ $resource->authors_affiliations }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.publisher') }}
                            </th>
                            <td>
                                {{ $resource->publisher }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.date_of_publication') }}
                            </th>
                            <td>
                                {{ $resource->date_of_publication }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.year_of_publication') }}
                            </th>
                            <td>
                                {{ $resource->year_of_publication }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.issn_isbn') }}
                            </th>
                            <td>
                                {{ $resource->issn_isbn }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.edition') }}
                            </th>
                            <td>
                                {{ $resource->edition }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.volume') }}
                            </th>
                            <td>
                                {{ $resource->volume }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.issue') }}
                            </th>
                            <td>
                                {{ $resource->issue }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.abstract') }}
                            </th>
                            <td>
                                {{ $resource->abstract }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.references') }}
                            </th>
                            <td>
                                {{ $resource->references }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.pages') }}
                            </th>
                            <td>
                                {{ $resource->pages }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.cover_image') }}
                            </th>
                            <td>
                                @foreach($resource->cover_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.file') }}
                            </th>
                            <td>
                                @foreach($resource->file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.tag') }}
                            </th>
                            <td>
                                @foreach($resource->tag as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.book_category') }}
                            </th>
                            <td>
                                @if($resource->bookCategory)
                                    <span class="badge badge-relationship">{{ $resource->bookCategory->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.resource.fields.resource_category') }}
                            </th>
                            <td>
                                @if($resource->resourceCategory)
                                    <span class="badge badge-relationship">{{ $resource->resourceCategory->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('resource_edit')
                    <a href="{{ route('admin.resources.edit', $resource) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.resources.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection