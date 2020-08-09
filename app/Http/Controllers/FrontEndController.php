<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){
        return view('frontend.views.index');
    }


    public function contact(){
        return view('frontend.views.contact');
    }
}
