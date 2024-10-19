<?php

namespace App\Http\Livewire\Resource;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Resource;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination, WithSorting, WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new Resource())->orderable;
    }

    public function render()
    {
        $query = Resource::with(['tag', 'bookCategory', 'resourceCategory', 'owner'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $resources = $query->paginate($this->perPage);

        return view('livewire.resource.index', compact('query', 'resources'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Resource::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Resource $resource)
    {
        abort_if(Gate::denies('resource_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $resource->delete();
    }
}
