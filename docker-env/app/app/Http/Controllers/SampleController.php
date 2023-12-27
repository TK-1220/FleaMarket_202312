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

    // public function register_display() {
    //     return view('register_display');
    // }

    public function register_complete() {
        return view('register_complete');
    }

    public function purchase() {
        return view('buy_handler');
    }

    public function buy_complete() {
        return view('buy_comp');
    }

    public function mypage_edit() {
        return view('mypage_edit');
    }

    public function reset() {
        return view('reset');
    }

    public function mypage() {
        return view('mypage');
    }

    public function detail() {
        return view('detail');
    }

    public function display() {
        return view('display');
    }


}




