<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        //
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
        //
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
