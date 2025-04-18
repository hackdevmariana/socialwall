<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'social_link', 'featured_image', 'status', 'publication_date'];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
