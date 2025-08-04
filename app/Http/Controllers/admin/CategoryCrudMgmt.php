<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\JsonResponse;
// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryCrudMgmt extends Controller
{
    public function index(){
        return view('frontend.category.Category');
    }

public function postcategory(Request $request){
$validator = Validator::make($request->all(), [
        'name' => 'required|unique:category,name',
    ]);
   
    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ],422); // 422 Unprocessable Entity
    } else {
        DB::table('category')->insert([
            'name' => $request->name
        ]);

        return response()->json(['success' => 'Post created successfully.']);
}
}

public function getcategory(){
     $categories = DB::table('category')->get();
    return response()->json($categories);
}


public function destroy($id)
{
    $deleted = DB::table('category')->where('id', $id)->delete();

    if ($deleted) {
        return response()->json(['success' => 'Post deleted successfully.']);
    } else {
        return response()->json(['error' => 'Post not found.'], 404);
    }
}

public function updatecate($id){
       $updatedata = DB::table('category')->where('id', $id)->first();

    if ($updatedata) {
return response()->json(['success' => true, 'updatedata' => $updatedata]);
    } else {
        return response()->json(['error' => 'Post not found.'], 404);
    }
}


public function updatecategorydata(Request $request){
    $result = DB::table('category')
  ->where('id', $request->id)
  ->update([
    'name'=>$request->name
  ]);
            return response()->json(['data' => $request->id,"dataa2"=>$request->name]);

}

}
