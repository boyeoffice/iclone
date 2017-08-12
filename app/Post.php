<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use Auth;
use DB;

class Post extends Model
{
    protected $fillable = ['image', 'user_id', 'video', 'content', 'slug', 'created_at'];
    public $paginate = [10];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function likes()
    {
    	return $this->hasMany(Like::class)->where('status', '1');
    }
}
