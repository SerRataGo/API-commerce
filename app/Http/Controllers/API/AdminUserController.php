<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class AdminUserController extends Controller
{

    public function AllAdminRole()
    {
        $user = User::all();

        return response()->json([
            'status' => 200,
            'user' => $user,
        ]);
    }

    public function AddAdminUser()
    {
        //return view of addAdminUser 
    }

    public function StoreAdminUser(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required',
             'email'=>'required',
            'password'=>'required',
            'last_seen'=>'required',

        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>422,
                'errors'=>$validator->messages()
            ]);
            }
            else {
       $user = new User ;
       $user->name=$request->input('name');
       $user->email=$request->input('email');
       $user->phone=$request->input('phone');
       $user->last_seen=$request->input('last_seen');
       $user->email_verified_at=$request->input('email_verified_at');
       $user->password=$request->input('password');
       $user->current_team_id=$request->input('current_team_id');
       $user->save();
       return response()->json([
        'status'=>200,
        'message'=>'user added succesfully'
    ]);
            }
    }

    public function EditAdminUser($id)
    {
        $user = User::find($id);
    if($user){
        return response()->json([
           'status'=>200,
           'user'=>$user

        ]);
    }
    else {
       return response()->json([
           'status'=>404,
           'message'=>'No User id found'

        ]);
    }
}

    public function UpdateAdmin(Request $request, $id)
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
        $user = User::find($id);
        if($id){
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->phone=$request->input('phone');
            $user->last_seen=$request->input('last_seen');
            $user->email_verified_at=$request->input('email_verified_at');
            $user->password=$request->input('password');
            $user->current_team_id=$request->input('current_team_id');
            $user->save();
           
        return response()->json([
            'status'=>200,
            'message'=>'User updated succesfully'
        ]);
    }
    else {
        return response()->json([
            'status'=>404,
            'message'=>'No User id found'
        ]);
    }
    }
    }

    public function DeleteAdmin($id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();

            return response()->json([
                'status'=>200,
                'message'=>'User deleted succesfully'
            ]);
        }
        else{
            return response()->json([
                'status'=>404,
                'message'=>'User ID not found'
            ]);

        }
        
    }
}
