<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            $blog->slugg = str_replace(' ', '-', $blog->title);
        });
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function total_comments()
    {
        return $this->comment()->count();
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
