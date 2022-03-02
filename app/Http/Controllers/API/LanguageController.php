<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function arbic()
    {
        return "welcome to arbic language";
    }

    public function English()
    {
        return "welcome to english language";
    }
}
