<?php

namespace App\Http\Controllers;

use App\Http\Requests\Processor\PorcessorStoreRequest;
use App\Models\Operation_System;
use App\Models\Processor;
use Illuminate\Http\Request;
use Symfony\Component\Process\Process;

class ProcessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $processors = Processor::all();
        return view('processor.index',compact('processors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('processor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PorcessorStoreRequest $request)
    {
        try{
            Processor::create([
                'name'=>$request->name
            ]);
            return redirect()->route('processor.index')->with('success','Processor Create Successful');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\processor  $processor
     * @return \Illuminate\Http\Response
     */
    public function show(processor $processor)
    {
        return view('processor.show',compact('processor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\processor  $processor
     * @return \Illuminate\Http\Response
     */
    public function edit(processor $processor)
    {
        return view('processor.edit',compact('processor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\processor  $processor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, processor $processor)
    {
        try{
            $processor->update($request->all());
            return redirect()->route('processor.index')->with('success','processor Update Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\processor  $processor
     * @return \Illuminate\Http\Response
     */
    public function destroy(processor $processor)
    {
        try{
            $processor->delete();
            return redirect()->route('processor.index')->with('success','Processor Delete Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
