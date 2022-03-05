<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Rules\UserPasswordRule;
use DB;

class IndexController extends Controller
{
    public function index()
    {

    }

    public function UserLogout()
    {

    }

    public function UserProfile(Request $request)
    {
        $user=User::find($request->id);
        return new UserResource($user);
    }

    public function UserProfileUpdate(Request $request)
    {
        $user=User::find($request->id);
        $validate=$this->profileUpdateValidation($user->email,$request);
        if($validate !=null){
            return $validate;
        }else{
            $user->name=$request->name;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->city=$request->city;
            $user->region=$request->region;
            $user->save();
            return response()->json("Profile Updated");
        }
    }

    public function profileUpdateValidation($email,$request){
        if($email==$request->email){
            $request->validate([
                'name'=>'min:3|required',
                'email'=>'email|required',
                'phone'=>'numeric|required',
                'address'=>'min:5|required',
                'city'=>'min:3|required',
                'region'=>'min:3|required'
            ]);
        }else{
            
            $request->validate([
                'name'=>'min:3|required',
                'email'=>'email|required|unique:users',
                'phone'=>'numeric|required',
                'address'=>'min:5|required',
                'city'=>'min:3|required',
                'region'=>'min:3|required'
            ]);
            
        }
    }

    public function UserPassword()
    {

    }

    public function UserPasswordUpdate(Request $request)
    {
        $request->validate([
            'new_pass'=>['required','min:3','max:8',new UserPasswordRule],
            'old_pass'=>['required']
        ]);
        $user=User::find($request->id);
        if($user->password==$request->old_pass){
            $user->password=$request->new_pass;
            $user->save();
            return response()->json("Password Updated");
        }
        return response()->json("Your password is not correct");
    }

    public function DetailsProduct($id, $slug)
    {

    }

    public function TagWiseProduct($tag)
    {

    }

    // subcategory wise data
    public function SubCatWiseProduct(Request $request, $subcat_id, $slug)
    {

    }

    public function SubsubCatProduct($subsubcat_id, $slug)
    {

    }


    // Product View With Ajax
    public function ProductViewAjax($id)
    {

    }

    public function ProductSearch(Request $request)
    {


    }

}
