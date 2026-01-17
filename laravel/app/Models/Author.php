<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable=['user_id','name'];

    public function user(){
        return $this->belongsto(User::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
    public function comments(){
        return $this->morphMany(Comment:class,'commentable');
    }

    public function audiences(){
        return $this->hasManyThrough(
            Audience::class,Article::class,
            'author_id','id','id','id'
        )->distinct();
    }

    
}
