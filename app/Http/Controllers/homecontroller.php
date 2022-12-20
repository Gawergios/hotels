<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\hotels;
use App\Models\rooms;
use Session;


class homecontroller extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function index(){
        return view("layout");
    }
    public function addhotelview()
    {
        return view("dashboard.addhotels");
    }

    public function addhotels(Request $request)
    {
        $hotel = $request->validate([
            'name' => 'required',
            'stars' => 'required',
            'description' => 'required',
        ]);
        DB::table('hotels')->insert($hotel);

        return Redirect("/addhotel");
    }


    public function addroomview()
    {
        return view("dashboard.addrooms");
    }
    public function addrooms(Request $request)
    {

        $room = $request -> validate([
            'hotel_id' => 'required',
            'code' => 'required',
            'net_price' => 'required',
            'taxes' => 'required',
            'taxes_type' => 'required',
            'total' => 'required',
            'currency' => 'required',
            'description' => 'required',

        ]);
        DB::table('rooms')->insert($room);

        return Redirect("/addroom");
   }


    public function allhotels()
    {

        $hotels = DB::table('hotels')->get();

        return view("dashboard.allhotels",['hotels'=>$hotels]);
    }


    public function allrooms()
    {
        $rooms = DB::table('hotels')
            ->join('rooms', 'hotels.id', '=', 'rooms.hotel_id')
            ->select('rooms.*', 'hotels.*','rooms.id')
            ->get();
        return view("dashboard.allrooms", ['rooms' => $rooms]);
    
    }
}
