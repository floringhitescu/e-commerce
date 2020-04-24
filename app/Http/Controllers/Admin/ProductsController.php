<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->validate([
            'name'          =>  'required|min:25',
            'description'   => 'required|min:150|max:1500',
            'body'          => 'required|min:150|max:1500',
            'image'         => 'image|sometimes|mimes:jpeg,bmp,png,jpg|max:2500',
        ]);

        if ($request->has('image')) {
            $imagePath = $request['image']->store('uploads', 'public');
        } else {
            $imagePath = 'uploads/banner.jpg';
        }

        if ($request->has('image')) {
            $imagePath = $request['image']->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(2200, 1000);
            $image->save();
        } else {
            $imagePath = 'uploads/banner.jpg';
        }


        $post = auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'body' => $data['body'],
            'image' => $imagePath,
        ]);

        if($post){
            $request->session('success')->flash('success', "New post has been created successfully!");
        }else{
            $request->session('error')->flash('error', 'There was an error!');
        }

        return redirect()->route('admin.posts.index');
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
     * @param Product $product
     * @return void
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', "Product deleted successfully");
    }
}
