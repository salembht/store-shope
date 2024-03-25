<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cateogry;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products =Product::get();
        return Inertia::render('Admin/Product/index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Product/add' );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'quantity' => 'required|integer',
            'description' => 'required',
            'published' => 'required|boolean',
            'inStock' => 'required|boolean',
            'price' => 'required|numeric',
            'categoryId' => 'required|exists:categories,id',
            'brandId' => 'required|exists:brands,id',
        ]);

        $product = Product::create($validatedData);
        if($request->hasFile('product_images'))
        {
            $productImages = $request->file('product_images');
            foreach ($productImages as $image){
                $uniqueName = time().'-'. Str::random(10).'.'. $image->getClientOriginalExtension();
                $image->move('product_images', $uniqueName);
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>'product_images/'.$uniqueName,
                ]);
            }   
        }
        return redirect()->route('product')->with('success','product added successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
