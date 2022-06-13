<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phone\PhoneStoreRequest;
use App\Http\Requests\Phone\PhoneUpdateRequest;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Operation_System;
use App\Models\Phone;
use App\Models\Processor;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = Phone::with('brand')->with('processor')->with('color')->with('operation_system')->get();
        return view('phone.index',compact('phones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();
        $processors = Processor::all();
        $operation_systems = Operation_System::all();
        return view('phone.create',compact('brands','colors','processors','operation_systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneStoreRequest $request)
    {
        try{
            $phone = new phone();
            $phone = $phone->create($request->all());

            return redirect()->route('phone.index')->with('success','Phone Create Successful');
        }
        catch(\Exception $e){
            return $e->getMessage();
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(phone $phone)
    {
        return view('phone.show',compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(phone $phone)
    {
        $brands = Brand::all();
        $colors = Color::all();
        $processors = Processor::all();
        $operation_systems = Operation_System::all();
        return view('phone.edit',compact('phone','brands','colors','processors','operation_systems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneUpdateRequest $request, phone $phone)
    {
        try{
            $phone->update($request->all());
            return redirect()->route('phone.index')->with('success','phone Update Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(phone $phone)
    {
        try{
            $phone->delete();
            return redirect()->route('phone.index')->with('success','phone Delete Successful');
        }
        catch(\Exception $e){
            return redirect()->back()->with('error','Something went wrong');
        }
    }
}
