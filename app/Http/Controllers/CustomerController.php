<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $phones = Phone::all();
        return view('customer.index',compact('phones'));
    }

    public function seeMore($id){
        $phone = Phone::find($id);
        return view('customer.detail',compact('phone'));
    }
}
