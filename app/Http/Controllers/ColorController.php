<?php

namespace App\Http\Controllers;

use App\Http\Requests\Color\ColorStoreRequest;
use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = color::all();
        return view('color.index',compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('color.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColorStoreRequest $request)
    {
        try{
            Color::create([
                'name'=>$request->name
            ]);
            return redirect()->route('color.index')->with('success','Color Create Successful');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(color $color)
    {
        return view('color.show',compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit(color $color)
    {
        return view('color.edit',compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, color $color)
    {
        try{
            $color->update($request->all());
            return redirect()->route('color.index')->with('success','Color Update Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy(color $color)
    {
        try{
            $color->delete();
            return redirect()->route('color.index')->with('success','Color Delete Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
