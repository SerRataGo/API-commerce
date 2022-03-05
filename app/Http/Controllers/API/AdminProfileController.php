<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class AdminProfileController extends Controller
{

    public function AdminProfile()
    {

    }

    public function EditAdminProfile($id)
    {

    }

    public function UpdateAdminProfile(Request $request, $id)
    {

    }

    public function AllUsers(Request $request, $id)
    {

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
