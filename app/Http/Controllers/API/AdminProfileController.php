<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{

    public function AdminProfile()
    {
  // return "view"
    }
    public function AdminCreateProfile(Request $request)
    {  $validator = Validator::make($request->all(),[
        'name'=>'required',
         'email'=>'required',
        'password'=>'required',
        'current_team_id'=>'current_team_id',

    ]);
    if($validator->fails()){
        return response()->json([
            'status'=>422,
            'errors'=>$validator->messages()
        ]);
        }
        else {
   $admin = new Admin ;
   $admin->name=$request->input('name');
   $admin->email=$request->input('email');
   $admin->password=$request->input('password');
   $admin->current_team_id=$request->input('current_team_id');
   $admin->save();
   return response()->json([
    'status'=>200,
    'message'=>'Admin added succesfully'
]);}

       
    }

    public function EditAdminProfile($id)
    {
        $admin = Admin::find($id);
        if($admin){
            return response()->json([
               'status'=>200,
               'admin'=>$admin
    
            ]);
        }
        else {
           return response()->json([
               'status'=>404,
               'message'=>'No Admin id found'
    
            ]);
        }

    }

    public function UpdateAdminProfile(Request $request, $id)
    { 
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
           'password'=>'required',
           'last_seen'=>'required',
           

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
            }
else{
        $admin = Admin::find($id);
        if($id){
            $admin->name=$request->input('name');
            $admin->email=$request->input('email');
            $admin->email_verified_at=$request->input('email_verified_at');
            $admin->password=$request->input('password');
            $admin->current_team_id=$request->input('current_team_id');
            $admin->save();
           
        return response()->json([
            'status'=>200,
            'message'=>'Admin updated succesfully'
        ]);
    }
    else {
        return response()->json([
            'status'=>404,
            'message'=>'No Admin id found'
        ]);
    }
    }

    }

    public function AdminChangePassword()
    {

    }

    public function AdminUpdatePassword(Request $request)
    {
        //code logic
    }

    public function destoryAdminProfile($id)
    {
        $admin = Admin::find($id);
        if($admin){
            $admin->delete();

            return response()->json([
                'status'=>200,
                'message'=>'Admin deleted succesfully'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'Admin ID not found'
            ]);
        }
    }
}
