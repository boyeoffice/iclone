<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['image', 'user_id', 'video', 'content', 'slug', 'created_at'];
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
