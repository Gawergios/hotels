<?php

namespace App\Http\Controllers;
use App\Models\hotels;
use App\Models\rooms;
use LaravelLocalization;
use Illuminate\Http\Request;

class homecontroller extends Controller
{
    public function home(){

        $hotels = hotels::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'stars',
            'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
            'image',
        )->get();
        return view('home.home',['hotels'=>$hotels]);

        //$hotels = hotels::with('rooms')->find();

        // return response()->json($hotel);
    }


    public function hoteldetails($id)
    {
        $hotel = hotels::with('rooms', 'hotelimgs')->find($id);
        return view('home.hotel', ['hotel' => $hotel]);
    }

    public function roomdetails($id)
    {
        $room = rooms::with('roomimg')->find($id);

        return view('home.room', ['room' => $room]);
    }
}
