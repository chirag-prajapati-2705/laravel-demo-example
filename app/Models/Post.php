<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'post_category');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    protected static function booted(): void
    {
        static::saving(function (Post $post) {

            $post->slug = \Str::slug($post->slug, '-');
        });
    }

    public function image()
    {
        return $this->morphOne(Images::class, 'imageable')->orderBy('id','desc');
    }

    public function images()
    {
        return $this->morphMany(Images::class, 'parentable');
    }


    // public function getContentAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    protected function content(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => strtolower($value),
        );
    }
}