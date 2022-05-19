<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\ProductCreateRequest;
use App\Http\Requests\Product\ProductEditRequest;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->get();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = SubCategory::all();
        return view('product.create',compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_name);

        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image=$file_path;
        $product->save();

        $subCategoryId = SubCategory::find($request->subCategoryId);
        $product->SubCategory()->attach($subCategoryId);

        return redirect()->route('product.index')->with('success','Product Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditRequest $request, Product $product)
    {
        if($request->file('image')){
            $image_arr=explode('/',$product->image);
            Storage::disk('image')->delete($image_arr[1]);

            $file=$request->file('image');
            $file_name=uniqid(time()).$file->getClientOriginalName();
            $file_path='image/'.$file_name;
            $file->storeAs('image',$file_name);
        }
        else{
            $file_path=$product->image;
        }

            Product::where('id',$product->id)->update([
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'image'=>$file_path
        ]);
        return redirect()->route('product.index')->with('success','Update Success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $image_arr=explode('/',$product->image);
        Storage::disk('image')->delete($image_arr[1]);

        return redirect()->route('product.index')->with('success','Delete Success!');
    }
}
