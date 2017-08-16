<?php
//Administrator Login
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
    	$this->validate($request, [
    		'email' => 'required',
    		'password' => 'required'
    		]);
    	if(Auth::attempt([
    		'email' => $request['email'],
    		'password' => $request['password']
    		])){
    		return response()->json(['success' => true]);
    	}//attemp auth
    	return response()->json(['message' => ['Email or Password does not match']],422);
    }
    public function register(Request $request)
    {
        $this->validate($request,[
            'username' => 'required|string|min:3|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            ]);
        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->confirmation_code = str_random(64);
        $user->status = 1;
        $user->save();
        Auth::login($user);
        return response()->json(['success' => true]);
    }
    public function getLogin()
    {
        if(Auth::guest()) {
           return view('auth.auth'); 
       }else{
         return redirect('/');
       }   
    }
    public function postLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
