<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class CloudController extends Controller
{
    public function __construct(){
        // $this->middleware('auth');
    }

    public function index($filename){
        $filepath = storage_path(). "/app/cloud/" . $filename;
        if(!file_exists($filepath)){
            return abort(404);
        }
        return response()->file($filepath);
    }
}
