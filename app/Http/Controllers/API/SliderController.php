<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function ViewSlider()
    {
        $slider = Slider::all();
        return response()->json([
            'status'=>200,
            'slider'=>$slider
    
            ]);

    }

    public function StoreSlider(Request $request)
    {
        $request->validate([
            'slider_image' => 'required',

        ],[
            'slider_image.required' => '*Please Insert an Image*',
            
        ]);

        $image = $request->file('slider_image');
        $name_gen = time() .'.'.$image->getClientOriginalExtension();
        $image->move('uploads/slider/', $name_gen);
        $save_url = 'uploads/slider/'. $name_gen;

        Slider::insert([

            'slider_image' => $save_url,
            'slider_title' => $request->slider_title,
            'slider_description' => $request->slider_description,
            'created_at' => Carbon::now(),

        ]);

        return response()->json([
            'status'=>200,
            'message'=>'Slider added succesfully'
        ]);

    
    }

    public function EditSlider($id)
    {
        $slider = Slider::find($id);
        if($slider){
            return response()->json([
               'status'=>200,
               'slider'=>$slider
    
            ]);
        }
        else {
           return response()->json([
               'status'=>404,
               'message'=>'No slider id found'
    
            ]);
    
        }

    }

    public function UpdateSlider(Request $request, $id)
    {
        $slider = Slider::find($id);
 if($slider){
       $slider->update([
            'slider_image' => $request->old_image,
            'slider_title' => $request->slider_title,
            'slider_description' => $request->slider_description,
            'created_at' => Carbon::now(),

        ]);

        if($request->file('old_image')){

            unlink($request->old_image);
            $image = $request->file('slider_image');
            $name_gen = time().'.'.$image->getClientOriginalExtension();
            $image->move('uploads/slider/', $name_gen);
            $save_url = 'uploads/slider/'. $name_gen;

             $slider->update([
                'slider_image' => $save_url,
             ]);

        }
        return response()->json([
            'status'=>200,
            'slider'=>$slider
 
         ]);
    }
 else {
    return response()->json([
        'status'=>404,
        'message'=>'No slider id found'

     ]);
 }
       

    }

    public function DeleteSlider($id)
    {
        $slider = Slider::find($id);
        if($slider){
        unlink($slider->slider_image);
        $slider->delete();

        return response()->json([
            'status'=>200,
            'message'=>'slider deleted succesfully'
    
        ]);}
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Slider ID not found'
            ]);
        }

    }

}
