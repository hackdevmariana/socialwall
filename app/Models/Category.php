<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description']; // Campos que se pueden asignar masivamente

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
