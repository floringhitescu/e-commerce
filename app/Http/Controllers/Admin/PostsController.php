<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'title'          => 'required|max:250|min:100',
            'description'    => 'required|min:150|max:1000' ,
            'body'           => 'required|min:250|max:6000',
            'image'         => 'required|image|mimes:jpeg,bmp,png,jpg|max:2500',
        ]);



        $imagePath = $data['image']->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(900, 400);
        $image->save();

        Post::create([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'body'          => $data['body'],
            'image'         => $imagePath,
            'user_id'       => auth()->user()->id,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return void
     */
    public function show(Post $post)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {


        $data = $request->validate([
            'title'          => 'required|max:250|min:100',
            'description'    => 'required|min:150|max:1000' ,
            'body'           => 'required||min:250|max:6000',
            'image'          => 'sometimes|image|mimes:jpeg,bmp,png,jpg|max:2500',
        ]);


        $imagePath = $post->image;

        if ($request->has('image')){
            $imagePath = $request->image->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 400);
            $image->save();

            //delete stored image if post image is not the default img
            if (Storage::exists( 'public/'. $post->image) and $imagePath != 'uploads/pngwave.png') {
                Storage::delete('public/' .$post->image);
            }
        }

        $post->update([
            'title'         => $data['title'],
            'description'   => $data['description'],
            'body'          => $data['body'],
            'image'         => $imagePath,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully');
    }
}
