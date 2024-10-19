<?php

namespace App\Http\Livewire\ResourceCategory;

use App\Models\ResourceCategory;
use Livewire\Component;

class Create extends Component
{
    public ResourceCategory $resourceCategory;

    public function mount(ResourceCategory $resourceCategory)
    {
        $this->resourceCategory = $resourceCategory;
    }

    public function render()
    {
        return view('livewire.resource-category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->resourceCategory->save();

        return redirect()->route('admin.resource-categories.index');
    }

    protected function rules(): array
    {
        return [
            'resourceCategory.name' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:resource_categories,name',
            ],
            'resourceCategory.slug' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:resource_categories,slug',
            ],
        ];
    }
}
