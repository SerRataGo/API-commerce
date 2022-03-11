<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    //Admin view all contact us submissions
    public function viewAllContactUs()
    {
        return ContactUs::all();
    }

    //Admin view specific contact us submission
    public function showSubmission($id)
    {
        return ContactUs::find($id);
    }

    //Admin delete specific contact us submission
    public function deleteSubmission($id)
    {
        ContactUs::destroy($id);
        return "deleted successfully";
    }

    //User add contact us submission
    public function addContactSubmission(Request $request)
    {
        $request->validate([
            'fname'=>'required|min:3',
            'lname'=>'required|min:3',
            'email'=>'required|email',
            'message'=>'required'
        ]);
        
        $contactus_msg=new ContactUS;
        $contactus_msg->fname=$request->fname;
        $contactus_msg->lname=$request->lname;
        $contactus_msg->email=$request->email;
        $contactus_msg->message=$request->message;
        $contactus_msg->save();
        return "done";
    }
}
