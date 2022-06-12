<?php

namespace App\Http\Controllers;

use App\Http\Requests\Os\OsCreateRequest;
use App\Http\Requests\Os\OsEditRequest;
use App\Models\Operation_System;
use Illuminate\Http\Request;

class OperationSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oses = Operation_System::all();
        return view('os.index', compact('oses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('os.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OsCreateRequest $request)
    {
        try{
            Operation_System::create([
                'name'=>$request->name
            ]);
            return redirect()->route('os.index')->with('success','Os Create Successful');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Operation_System::find($id);
        return view('os.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Operation_System::find($id);
        return view('os.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OsEditRequest $request, $id)
    {
        try{
            $Os = Operation_System::find($id);
            $Os->update($request->all());
            return redirect()->route('os.index')->with('success','OS Update Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $OS = Operation_System::find($id);
            $OS->delete();
            return redirect()->route('brand.index')->with('success','OS Delete Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
