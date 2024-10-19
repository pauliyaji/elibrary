<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('resource_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="Resource" format="csv" />
                <livewire:excel-export model="Resource" format="xlsx" />
                <livewire:excel-export model="Resource" format="pdf" />
            @endif


            @can('resource_create')
                <x-csv-import route="{{ route('admin.resources.csv.store') }}" />
            @endcan

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.resource.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.slug') }}
                            @include('components.table.sort', ['field' => 'slug'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.authors') }}
                            @include('components.table.sort', ['field' => 'authors'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.authors_affiliations') }}
                            @include('components.table.sort', ['field' => 'authors_affiliations'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.publisher') }}
                            @include('components.table.sort', ['field' => 'publisher'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.date_of_publication') }}
                            @include('components.table.sort', ['field' => 'date_of_publication'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.year_of_publication') }}
                            @include('components.table.sort', ['field' => 'year_of_publication'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.issn_isbn') }}
                            @include('components.table.sort', ['field' => 'issn_isbn'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.edition') }}
                            @include('components.table.sort', ['field' => 'edition'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.volume') }}
                            @include('components.table.sort', ['field' => 'volume'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.issue') }}
                            @include('components.table.sort', ['field' => 'issue'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.abstract') }}
                            @include('components.table.sort', ['field' => 'abstract'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.references') }}
                            @include('components.table.sort', ['field' => 'references'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.pages') }}
                            @include('components.table.sort', ['field' => 'pages'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.cover_image') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.file') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.tag') }}
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.book_category') }}
                            @include('components.table.sort', ['field' => 'book_category.name'])
                        </th>
                        <th>
                            {{ trans('cruds.resource.fields.resource_category') }}
                            @include('components.table.sort', ['field' => 'resource_category.name'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($resources as $resource)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $resource->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $resource->id }}
                            </td>
                            <td>
                                {{ $resource->title }}
                            </td>
                            <td>
                                {{ $resource->slug }}
                            </td>
                            <td>
                                {{ $resource->authors }}
                            </td>
                            <td>
                                {{ $resource->authors_affiliations }}
                            </td>
                            <td>
                                {{ $resource->publisher }}
                            </td>
                            <td>
                                {{ $resource->date_of_publication }}
                            </td>
                            <td>
                                {{ $resource->year_of_publication }}
                            </td>
                            <td>
                                {{ $resource->issn_isbn }}
                            </td>
                            <td>
                                {{ $resource->edition }}
                            </td>
                            <td>
                                {{ $resource->volume }}
                            </td>
                            <td>
                                {{ $resource->issue }}
                            </td>
                            <td>
                                {{ $resource->abstract }}
                            </td>
                            <td>
                                {{ $resource->references }}
                            </td>
                            <td>
                                {{ $resource->pages }}
                            </td>
                            <td>
                                @foreach($resource->cover_image as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($resource->file as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($resource->tag as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if($resource->bookCategory)
                                    <span class="badge badge-relationship">{{ $resource->bookCategory->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                @if($resource->resourceCategory)
                                    <span class="badge badge-relationship">{{ $resource->resourceCategory->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('resource_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.resources.show', $resource) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('resource_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.resources.edit', $resource) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('resource_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $resource->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $resources->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush