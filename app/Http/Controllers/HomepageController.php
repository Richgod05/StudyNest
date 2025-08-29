<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function whoWeare()
    {
        return view('whoweare');
    }

    public function ourMission(){
        return view('ourmission');
    }

    public function ourVision(){
    return view('ourvision');
    }

}
