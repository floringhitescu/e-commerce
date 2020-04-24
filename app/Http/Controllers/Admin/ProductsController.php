<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
     * @return Response
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name'          => 'required|min:5|max:150',
            'slug'          => 'required|min:5|max:150|unique:products',
            'details'       => 'required|min:5|max:150',
            'description'   => 'required|min:50|max:1000',
            'category_id'   => 'required',
            'price'         => 'required|numeric',
            'image'         => 'required|image|sometimes|mimes:jpeg,bmp,png,jpg|max:2500',
        ]);

        $data['slug'] = str_replace(' ', '_', strtolower($data['slug']));
        $data['slug'] = preg_replace('/[^\w]/', '', $data['slug']);


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


        return redirect()->route('admin.products.index')->with('success', "New product has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return void
     */
    public function update(Request $request, Product $product)
    {


        $data = $request->validate([
            'name'          => 'min:5|max:150',
            'details'       => 'min:5|max:150',
            'description'   => 'min:50|max:1000',
            'category_id'   => 'sometimes',
            'price'         => 'numeric',
            'image'         => 'sometimes|image|sometimes|mimes:jpeg,bmp,png,jpg|max:2500',
        ]);

        $imagePath = $product->image;

        if ($request->has('image')){
            $imagePath = $request->image->store('uploads', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(450, 400);
            $image->save();

            //delete stored image if post image is not the default img
            if (Storage::exists( 'public/'. $product->image) and $imagePath != 'uploads/pngwave.png') {
                Storage::delete('public/' .$product->image);
            }
        }


        $product->update([
            'name'          => $data['name'],
            'details'       => $data['details'],
            'description'   => $data['description'],
            'price'         => $data['price'],
            'category_id'   => $data['category_id'],
            'image'         => $imagePath,
        ]);

        return redirect()->route('admin.products.index')->with('success', "Product updated successfully!");


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
