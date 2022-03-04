<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{

    public function AllAdminRole()
    {
        //
    }

    public function AddAdminUser()
    {
        //
    }

    public function StoreAdminUser(Request $request)
    {
        //
    }

    public function EditAdminUser($id)
    {
        //
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
