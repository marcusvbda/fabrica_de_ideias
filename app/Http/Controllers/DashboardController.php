<?php

namespace App\Http\Controllers;

use Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Palestras;

class DashboardController  extends Controller
{

    public function index()
    {       
        return view('xpanel.dashboard.index');
    }



   
}
