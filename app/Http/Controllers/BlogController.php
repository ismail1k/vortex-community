<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function demandpassport(){
        return view('demandpassport');
    }

    public function rules(){
        return view('rules');
    }

}
