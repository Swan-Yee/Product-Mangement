<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryEditRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::orderBy('id','desc')->get())->response()->setStatusCode(200);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if(!$request->hasFile('image')) {
            return response()->json(['upload_file_not_found'], 400);
        }
        $file=$request->file('image');
        $file_name=uniqid(time()).$file->getClientOriginalName();
        $file_path='image/'.$file_name;
        $file->storeAs('image',$file_name);

        $category = new Category();
        $category->category_type = $request->category_type;
        $category->image=$file_path;
        $category->save();

        Category::create($request->all());
        return response()->json('Create Successfully',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        if($request->file('image')){
            $image_arr=explode('/',$category->image);
            Storage::disk('image')->delete($image_arr[1]);

            $file=$request->file('image');
            $file_name=uniqid(time()).$file->getClientOriginalName();
            $file_path='image/'.$file_name;
            $file->storeAs('image',$file_name);
        }
        else{
            $file_path=$category->image;
        }

        Product::where('id',$category->id)->update([
            'category_type'=>$request->category_type,
            'image'=>$file_path
        ]);
        return response()->json('Update Successfully',200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json('Delete Successfully',200);
    }
}
