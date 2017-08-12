<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use App\User;
use App\Post;
use Auth;

class JsController extends Controller
{
    public function postLike(Request $request)
    {
       $this->validate($request, ['id' => 'required']);
    	$idLike = $request->get('id');
    	$like = new Like();
 
        /*$post = Post::where('id', $idLike)->where('status', '1')->first();*/

       /* if(!isset($post)) {
        	return response()->json(['success' => false]);
        	exit;
        }*/
        // Verified if exist LIKE 
       $data = Like::where('post_id', $idLike)->where('user_id', Auth::user()->id)->first();
        //Exist Like
        if(!empty($data)) {
        	// Set Status Off
            if($data->status == 1 ) {
            	Like::where('post_id', $idLike)->where('user_id', Auth::user()->id)->update(['status' => '0']);
            	return response()->json(['status' => false]);
            } // Set Status On
            else if($data->status == 0){
            	Like::where('post_id', $idLike)->where('user_id', Auth::user()->id)->update(['status' => '1']);
            	return response()->json(['status' => true]);
            }
        }else{
        	//If there is no insert new Like
        	$like->post_id = $idLike;
        	$like->user_id = Auth::user()->id;
        	$like->status = '1';
        	$like->save();
        	return response()->json(['success' => true]);
        }
    }
    public function getLike()
    {
    	$posts = Post::all();
    	foreach($posts as $post):
    	$like = Like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        endforeach;
    	return response()->json($like);
    }
}
