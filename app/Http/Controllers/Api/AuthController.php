<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Post;
use Hash;
use App\Like;
use Auth;
use App\Profile;
use App\Follower;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }
    public function login(Request $request)
    {
    	$this->validate($request, [
    	'email' => 'required|email',
    	'password' => 'required|between: 6,25'
    	]);
    $user = User::where('email', $request->email)->first();
    if($user && Hash::check($request->password, $user->password)) {
    	$user->api_token = str_random(60);
    	$user->save();
    	return response()->json([
    		'authenticated' => true,
    		'api_token' => $user->api_token,
    		'user_id' => $user->id,
    		'expiration' => 6853685647
    		]);
    }
    return response()->json([
    	'email' => ['Provided email and password do not match']
    	], 422);
    }
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string|min:3|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            ]);
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json(['success' => true]);
    }
    public function logout(Request $request)
    {
        $user = $request->user();
        $user->api_token = null;
        $user->save();
        return response()->json(['done' => true]);
    }
    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();
        $total = Post::where('user_id', '=', $user->id)->count();
        $totalFollowing = Follower::where('follower', '=', $user->id)->where('status', '1')->count();
        $totalFollower = Follower::where('following', '=', $user->id)->where('status', '1')->count();
        $followers = Follower::where('following', '=', $user->id)->where('status', '1')->get();
        $data = compact(['user','total','totalFollowing','totalFollower', 'followers']);
        return response()->json($data);
    }
    public function getUserPost($username)
    {
        $user = User::where('username', $username)->first();
        $posts = Post::where('user_id', '=', $user->id)->with(['likes','user'])->paginate(10);
        
        return response()->json($posts);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'email' => 'required'
            ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->about = $request->about;
        $user->update();
        
        return response()->json(['success' => true]);
    }
    public function update_password(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|min:6',
            'new_password' => 'required|min:6'
            ]);
        $id_session = Auth::user()->id;
        $user = User::find($id_session);
        if($user && Hash::check($request->old_password, $user->password)){
          $user->password =  Hash::make($request->new_password);
          $user->update();
          return response()->json(['success' => true]);
        }
        return response()->json(['old_password' => ['Incorrect Password']], 422);
    }
}
