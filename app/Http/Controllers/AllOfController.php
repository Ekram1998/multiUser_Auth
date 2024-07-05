<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AllOfController extends Controller
{
    public function index(){
        return view('all.info');
    }
}
