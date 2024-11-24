<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Post extends Model
{
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

    public function favorite_to_users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeApproved($query)
    {
        return $query->where('is_approved', 1);
    }
    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }


}
