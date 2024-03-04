<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'observation', 'author_id'];

    /*
         * Get the author that owns the Post
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'author_id');
    }

    public function getDescriptionAttribute()
    {
        return strtolower($this->attributes['description']);
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = strtolower($value);
    }
}
