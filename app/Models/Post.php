<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title', 'content', 'social_link', 'featured_image', 'status', 'publication_date'];
    protected $fillable = ['title', 'content', 'social_link', 'featured_image', 'status', 'publication_date', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
