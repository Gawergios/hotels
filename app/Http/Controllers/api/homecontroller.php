<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function index(){
        $data=["name"=>"mina","age"=>25];
        return response()->json($data);
    }
}
