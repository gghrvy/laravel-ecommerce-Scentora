<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    /**
     * Allow mass-assignment for these columns.
     */
    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    /**
     * Basic validation guidance for service-layer consumers.
     */
    protected array $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getExcerpt(int $limit = 100): string
    {
        return Str::limit($this->content ?? '', $limit);
    }
}
