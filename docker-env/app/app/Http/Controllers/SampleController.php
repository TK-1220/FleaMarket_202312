<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    //
    public function sample() {
        return view('sample');
    }

    public function registercomp() {
        return view('register_comp');
    }

    public function register_display() {
        return view('register_display');
    }

    public function register_complete() {
        return view('register_complete');
    }

}




