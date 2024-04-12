<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'published',
        'category_id',
        'user_id'
    ];

    protected $with = [
        'category'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function toSearchableArray(): array
    {
        $this->loadMissing('category');

        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,
            'published' => $this->published ? 'Active' : 'Inactive',
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
            ]
        ];
    }
}
