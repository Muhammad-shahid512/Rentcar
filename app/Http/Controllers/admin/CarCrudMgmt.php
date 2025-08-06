<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CarFeatures;
use App\Models\Category;
use App\Models\Vehical;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CarCrudMgmt extends Controller
{
    public function index(){
        $data=Vehical::all();
        // return $data;
        return view('frontend.CarMgmt.Cars',compact('data'));
    }
      public function viewsingle($id){
        
        // $value=  Vehical::where("id",$id)->with("getcategory")->first();
$value = Vehical::where("id", $id)->with(["getcategory", "getfeature.getfeaturename"])->first();
        // return $value;
        return response()->json(["data"=>$value]);
      }
    public function showform(){
        $data['category']=DB::table("category")->get();
        $data['feature']=DB::table("features")->get();
        return view('frontend.CarMgmt.AddCar',$data);
    }
    public function carcategory(){
           $categories = DB::table('category')->get();
    return response()->json($categories);
    }

    public function store(Request $request){
    // return $request;
 $request->validate([
        'brand' => 'required',
        'model' => 'required',
        'year' => 'required',
        'price' => 'required',
        'location' => 'required',
        'seating_capacity' => 'required',
    ]);
 
    $file = $request->file('image');
        $format = $file->getClientOriginalExtension();
        $fileName = time() . rand(1, 999999) . '.' . $format;
        $file->storeAs('public/images', $fileName);
        $path = 'storage/images/' . $fileName;

        $cars=new Vehical();
        $cars->brand=$request->brand;
        $cars->model=$request->model;
        $cars->year=$request->year;
        $cars->price=$request->price;
        $cars->seating_capacity=$request->seating_capacity;
        $cars->category_id=$request->category;
        $cars->location=$request->location;
        $cars->image=$path;
        $cars->slug=generateSlug();
        $cars->description=$request->description;
        $cars->save();
            // return $cars->id;
   if ($request->has('features')) {
    foreach ($request->features as $feature) {
        CarFeatures::create([
            'feature_id' => $feature,
            'car_id' => $cars->id
        ]);
    }
}

    }


    public function toggle($id)
{
    $item = Vehical::findOrFail($id);
    $item->status = !$item->status;
    $item->save();
    return response()->json(['status' => $item->status]);
}
}
