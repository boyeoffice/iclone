<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
use Image;
use File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('created_at', 'desc')->with('user')->get();
        return response()->json($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $exploded = explode(',', $request->image);
        $decoded = base64_decode($exploded[1]);
        if(str_contains($exploded[0], 'jpg'))
            $extention = 'jpg';
        else
            $extention = 'png';
        $filename = str_random().'.'.$extention;
        $path = public_path().'/content/'. date("Ym", time()) .'/'.date("d", time()) .'/'. Auth::user()->id;
        File::makeDirectory($path, $mode = 0777, true, true);
        $location = $path . '/' . $filename;
        Image::make($request->get('image'))->save($location);
         //Save file in database
        $savePath = '/content/'. date("Ym", time()) .'/'.date("d", time()) .'/'. Auth::user()->id . '/' . $filename;

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->image = $savePath;
        $post->content = $request->content;
        $post->slug = str_random(10);
        $post->save();
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
