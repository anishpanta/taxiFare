<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getIndex()
    {
        return view('welcome');
    }
    public function postIndex(){
    	dd(Input::all());
    }
}
