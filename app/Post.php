<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use App\Comment;
use App\Tag;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'user_id'];

	public function getRouteKeyName()
	{
		
		return 'slug';  
	}

	public function category()
	{
        return $this->belongsTo(Category::class);

	}

	public function user()
	{
        return $this->belongsTo(User::class);

	}

	public function comments()
	{
		return $this->hasMany(Comment::class);
	}

	public function tags()
	{
		return $this->belongsToMany(Tag::class);
	}


    
}
