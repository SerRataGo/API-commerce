<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Slider;

class SliderController extends Controller
{
    public function ViewSlider()
    {

    }

    public function StoreSlider(Request $request)
    {

    }

    public function EditSlider($id)
    {

    }

    public function UpdateSlider(Request $request, $id)
    {

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
