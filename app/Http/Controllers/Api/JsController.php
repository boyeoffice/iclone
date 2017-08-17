<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Like;
use App\User;
use App\Post;
use Auth;
use App\Follower;

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
    public function postFollow(Request $request)
    {
        $this->validate($request,['id' => 'required|integer']);

        $user_id = $request->id;
        //verified if follow exist
        $followActive = Follower::where('follower', Auth::user()->id)->where('following', $user_id)->first();
        //find user in database
        $user = User::where('id', $user_id)->first();
        if($user){
            $follow = new Follower();
            if($followActive){
                //set status off
                if($followActive->status == 1){
                    Follower::where('follower', Auth::user()->id)->where('following', $user_id)->update(['status' => '0']);
                    return response()->json(['message' => 'Unfollow']);
                }
                //set status on
                elseif ($followActive->status == 0) {
                    Follower::where('follower', Auth::user()->id)->where('following', $user_id)->update(['status' => '1']);
                    return response()->json(['message' => 'Following']);

                }//followActive
            }else{
                    //if there is no follow
                    $follow->follower = Auth::user()->id;
                    $follow->following = $user_id;
                    $follow->status = '1';
                    $follow->save();
                    return response()->json(['message' => 'Following']);
                }
            }//end user
        }//postfollow
}
