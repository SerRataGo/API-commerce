<?php


namespace App\Traits;

use Illuminate\Support\Facades\Mail;
use App\Models\SubCategory;

trait VerificationMailTrait {

    public function send_verification_mail($email){
        $data = array('email'=>$email);

        Mail::send('verifyemail',$data,function($message) use ($email) {
            $message->to($email)->subject('Verification Email');
            $message->from('nada.usama.ahmed@gmail.com','Furniture Store');
        });

    }

}