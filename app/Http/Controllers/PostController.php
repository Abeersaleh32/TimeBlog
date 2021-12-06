<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Posts $posts)
    {
       // dd('HI');
        $post= Posts::get();
        return View ('blog.Blogs', [$post=>'post']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post= new Posts;
        $post->user_id= Auth::user()->id;
        $post->pictrue= $request->picture;
        $post->description =$request->description;
        $post->save();
        return redirect('profile')->with('Post Created..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= Posts::find($id);
        return view('blog.profile', [$post=>'post']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts:: find($id);

            return view('blog.edite')->with('post',$post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post= Posts ::find($id);
        $post->pictrue= $request->picture;
        $post->description =$request->description;
        $post->save();
        $post->touch();
        return redirect('welcome')->with('Post Updated..');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Posts ::find(id);
        $post->delete();
        return redirect('welcome')->with('Post Deleted..');
    }
}
