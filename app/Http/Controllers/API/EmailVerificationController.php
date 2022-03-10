<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\VerificationMailTrait;
use App\Models\User;

class EmailVerificationController extends Controller
{
    
    use VerificationMailTrait;
    public function SendVerificationEmail(Request $request){
        $this->send_verification_mail($request->email);
    }

    public function verifyEmail(Request $request){
        $matchQuery=['email'=>$request->email];
        $user= User::where($matchQuery)->first();
        //get current time
        $user->email_verified_at=\Carbon\Carbon::now();
        $user->save();
        return "done";
    }

}
