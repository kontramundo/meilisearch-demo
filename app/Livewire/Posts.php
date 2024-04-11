<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

    public $categories;

    public $search = '';
    public $category;


    public function mount()
    {
        $this->categories = Category::orderBy('name')->pluck('name', 'id');
    }

    public function render()
    {
        $posts = Post::where('title', 'like', '%' . $this->search . '%')
            ->when($this->category, function ($query) {
                $query->whereCategoryId($this->category);
            })->paginate(10);


        return view('livewire.posts', compact('posts'));
    }
}
