<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\hotels;
use Illuminate\Http\Request;

class mainhomecontroller extends Controller
{
    public function index()
    {
        $hotels = hotels::get();
        if(!$hotels){
            return response()->json(['status'=>false,'msg'=>"not found"]);
        }
        return response()->json(["status"=>"true","msg"=>"success","hotels"=>$hotels]);
    }
}
