<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'birth_date'];

    protected $hidden = ['created_at','updated_at'];

    protected $table = "authors";

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getBirthDayAttribute()
    {
        return date('Y');
    }

}
