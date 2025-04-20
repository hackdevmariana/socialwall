<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'is_category'];


    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }

    protected $casts = [
        'is_category' => 'boolean',
    ];
}
