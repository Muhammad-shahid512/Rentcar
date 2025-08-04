<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CarCrudMgmt extends Controller
{
    public function index(){
        return view('frontend.CarMgmt.Cars');
    }

    public function store(Request $request){
    return response()->json(["data"=>"value","value"=>$request]);
    }
}
