<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategory\SubCategoryEditRequest;
use App\Http\Requests\SubCategory\SubCategoryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_categories=SubCategory::orderBy('id','desc')->get();
        return view('subcategory.index',compact('sub_categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('subcategory.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoryRequest $request)
    {
        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_name);

        SubCategory::create([
            'sub_category_name'=>$request->sub_category_name,
            'image'=>$file_path,
            'category_id'=>$request->category_id,
        ]);

        return redirect()->route('sub-category.index')->with('success','SubCategory Create Successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        return view('subcategory.show',compact('subCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('subcategory.edit',compact('subCategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubCategoryEditRequest $request, SubCategory $subCategory)
    {
        if($request->file('image')){
            $image_arr=explode('/',$subCategory->image);
            Storage::disk('image')->delete($image_arr[1]);

            $file=$request->file('image');
            $file_name=uniqid(time()).$file->getClientOriginalName();
            $file_path='image/'.$file_name;
            $file->storeAs('image',$file_name);
        }
        else{
            $file_path=$subCategory->image;
        }

            SubCategory::where('id',$subCategory->id)->update([
            'sub_category_name'=>$request->sub_category_name,
            'image'=>$file_path,
            'category_id'=>$request->category_id,
        ]);
        return redirect()->route('sub-category.index')->with('success','Update Success!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $image_arr=explode('/',$subCategory->image);
        Storage::disk('image')->delete($image_arr[1]);



        return redirect()->route('sub-category.index')->with('success','Delete Success!');
    }
}
