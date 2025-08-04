<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FeaturesCrudMgmt extends Controller
{
    public function index(){
        return view('frontend.features.featured');
    }

    public function postfeatured(Request $request){
        $validator = Validator::make($request->all(), [
        'name' => 'required|unique:category,name',
    ]);
   
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ],422); // 422 Unprocessable Entity
    } else {
        DB::table('features')->insert([
            'name' => $request->name
        ]);

        return response()->json(['success' => 'Post created successfully.']);
}
    }


    public function getfeatures(){
          $features = DB::table('features')->get();
    return response()->json($features);
    }

    public function destroyfeatured($id){

    $deleted = DB::table('features')->where('id', $id)->delete();

    if ($deleted) {
        return response()->json(['success' => 'Post deleted successfully.']);
    } else {
        return response()->json(['error' => 'Post not found.'], 404);
    }
        

    }


    public function updatefeatured($id){
           $updatedata = DB::table('features')->where('id', $id)->first();

    if ($updatedata) {
return response()->json(['success' => true, 'updatedata' => $updatedata]);
    } else {
        return response()->json(['error' => 'Post not found.'], 404);
    }
    }


    public function updateFeaturesdata(Request $request){
   $result = DB::table('features')
  ->where('id', $request->id)
  ->update([
    'name'=>$request->name
  ]);
            return response()->json(['data' => $request->id,"dataa2"=>$request->name]);
        

    }
}
