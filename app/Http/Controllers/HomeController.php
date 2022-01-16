<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Investment;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function catalogue()
    {
        return view('catalogue');
    }

     public function about()
    {
        return view('about');
    }
    
}
