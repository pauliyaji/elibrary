<?php

namespace App\Http\Livewire\BookCategory;

use App\Models\BookCategory;
use Livewire\Component;

class Edit extends Component
{
    public BookCategory $bookCategory;

    public function mount(BookCategory $bookCategory)
    {
        $this->bookCategory = $bookCategory;
    }

    public function render()
    {
        return view('livewire.book-category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->bookCategory->save();

        return redirect()->route('admin.book-categories.index');
    }

    protected function rules(): array
    {
        return [
            'bookCategory.name' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:book_categories,name,' . $this->bookCategory->id,
            ],
            'bookCategory.slug' => [
                'string',
                'min:2',
                'max:255',
                'required',
                'unique:book_categories,slug,' . $this->bookCategory->id,
            ],
        ];
    }
}
