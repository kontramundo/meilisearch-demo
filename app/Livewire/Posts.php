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

    public $sortField = 'published';
    public $sortDirection = 'asc';


    public function mount()
    {
        $this->categories = Category::orderBy('name')->pluck('name', 'id');
    }

    public function render()
    {
        $posts = Post::search($this->search, function ($meilisearch, $query, $options) {

            if ($this->category) {
                $options['filter'] = 'category.id = "' . $this->category . '"';
            }

            $options['sort'] = [$this->sortField . ':' . $this->sortDirection];

            return $meilisearch->search($query, $options);
        })->paginate(10);


        return view('livewire.posts', compact('posts'));
    }
}
