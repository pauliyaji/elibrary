<?php

namespace App\Http\Livewire\Resource;

use App\Models\BookCategory;
use App\Models\ContentTag;
use App\Models\Resource;
use App\Models\ResourceCategory;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public array $tag = [];

    public Resource $resource;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->resource->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function mount(Resource $resource)
    {
        $this->resource        = $resource;
        $this->resource->pages = '1';
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.resource.create');
    }

    public function submit()
    {
        $this->validate();

        $this->resource->save();
        $this->resource->tag()->sync($this->tag);
        $this->syncMedia();

        return redirect()->route('admin.resources.index');
    }

    protected function rules(): array
    {
        return [
            'resource.title' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
            'resource.slug' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
            'resource.authors' => [
                'string',
                'min:2',
                'max:255',
                'required',
            ],
            'resource.authors_affiliations' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'resource.publisher' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'resource.date_of_publication' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'resource.year_of_publication' => [
                'string',
                'min:2',
                'max:4',
                'required',
            ],
            'resource.issn_isbn' => [
                'string',
                'min:2',
                'max:191',
                'nullable',
            ],
            'resource.edition' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'resource.volume' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'resource.issue' => [
                'string',
                'min:2',
                'max:255',
                'nullable',
            ],
            'resource.abstract' => [
                'string',
                'nullable',
            ],
            'resource.references' => [
                'string',
                'nullable',
            ],
            'resource.pages' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'mediaCollections.resource_cover_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.resource_cover_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.resource_file' => [
                'array',
                'required',
            ],
            'mediaCollections.resource_file.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'tag' => [
                'required',
                'array',
            ],
            'tag.*.id' => [
                'integer',
                'exists:content_tags,id',
            ],
            'resource.book_category_id' => [
                'integer',
                'exists:book_categories,id',
                'nullable',
            ],
            'resource.resource_category_id' => [
                'integer',
                'exists:resource_categories,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['tag']               = ContentTag::pluck('name', 'id')->toArray();
        $this->listsForFields['book_category']     = BookCategory::pluck('name', 'id')->toArray();
        $this->listsForFields['resource_category'] = ResourceCategory::pluck('name', 'id')->toArray();
    }
}
