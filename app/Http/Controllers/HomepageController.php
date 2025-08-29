<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function whoWeare()
    {
        return view('whoweare');
    }

    public function nestChat(){
        return view('nestchat');
    }

    public function ourVision(){
    return view('ourvision');
    }

}
