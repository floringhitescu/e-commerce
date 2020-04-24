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

        $request->slug = str_replace(' ', '_', strtolower($request->slug));
        $request->slug = preg_replace('/[^\w]/', '', $request->slug);

        $data = $request->validate([
            'name'          => 'required|min:5|max:150',
            'slug'          => 'required|min:5|max:150|unique:products',
            'details'       => 'required|min:5|max:150',
            'description'   => 'required|min:50|max:1000',
            'category_id'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'required|image|sometimes|mimes:jpeg,bmp,png,jpg|max:2500',
        ]);

        $category = Category::where('id', $request->category_id)->first();
        if ($category == null){
            return redirect()->back()->with('error', 'wrong category selected');
        }



        $imagePath = $request->image->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 400);
        $image->save();



        $product = Product::create([
            'name'          => $data['name'],
            'slug'          => $data['slug'],
            'details'       => $data['details'],
            'description'   => $data['description'],
            'price'         => $data['price'],
            'category_id'   => $data['category_id'],
            'image'         => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', "New post has been created successfully!");
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
