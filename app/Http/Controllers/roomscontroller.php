<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rooms;
use App\Models\hotels;
use App\Models\room_img;
use Illuminate\Support\Facades\DB;
use App\Traits\imagestraits;
use LaravelLocalization;

class roomscontroller extends Controller
{
    use imagestraits;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addroom()
    {
        return view("dashboard.addrooms");
    }
    public function postroom(Request $request)
    {
        $validated = $request->validate([
            'code'      => 'required|unique:rooms',
            'net_price' => 'required',
            'taxes'     => 'required',
            'taxes_type'=> 'required',
            'currency'  => 'required',
            'image'     => 'required',
            'hotel_id'  => 'required',
        ]);

        $room = new rooms();
        if ($request->file('image')) {
            $filename = $this->saveimage($request->file('image'), 'image');
        }
        $room->code = $request->code;
        $p=$room->net_price = $request->net_price;
        $t=$room->taxes = $request->taxes;
        $room->taxes_type = $request->taxes_type;
        $room->total = $p+$t ;
        $room->currency = $request->currency;
        $room->hotel_id = $request->hotel_id;
        $room->image = $filename;
        $save = $room->save();
        if ($save) {
            Session()->flash('message', 'data saved successfully');
            return Redirect('addroom');
        } else {
            Session()->flash('message', 'Something is wrong');
            return Redirect('addroom');
        }
    }
    public function addimg()
    {
        return view("dashboard.roomimg");
    }
    public function postimg(Request $request)
    {
        $validated = $request->validate([
            'room_id'       => 'required',
            'room_img'      => 'required|unique:room_imgs',
        ]);
        $img = new room_img();
        if ($request->file('room_img')) {
            $filename = $this->saveimage($request->file('room_img'), 'image');

        }
            $img->room_id = $request->room_id;
            $img->room_img = $filename;
            $save = $img->save();

        if ($save) {
            Session()->flash('message', 'The image has been saved');
            return Redirect('addroomimg');
        } else {
            Session()->flash('message', 'Something is wrong');
            return Redirect('addroomimg');
        }

    }
    public function allrooms($id)
    {
        $hotel = hotels::find($id);
        $rooms=$hotel->rooms;
        return view("dashboard.allrooms", ['rooms' => $rooms , 'hotelname'=>$hotel->name_en]);
    }


    public function updateroom($id)
    {
        $room = rooms::find($id);
        if ($room) {
            return view('dashboard.updaterooms', ['room' => $room]);
        } else {
            return Redirect()->back();
        }
    }
    public function editroom(Request $request,$id)
    {
        $validated = $request->validate([
            'code'      => 'required',
            'net_price' => 'required',
            'taxes'     => 'required',
            'taxes_type' => 'required',
            'currency'  => 'required',
            'hotel_id'  => 'required',
        ]);
        $room = rooms::with('hotels')->find($id);
        if ($request->file('image')) {
            $filename = $this->saveimage($request->file('image'), 'image');
            $room->image = $filename;
        }
        $room->code = $request->code;
        $p = $room->net_price = $request->net_price;
        $t = $room->taxes = $request->taxes;
        $room->taxes_type = $request->taxes_type;
        $room->total = $p + $t;
        $room->currency = $request->currency;
        $room->hotel_id = $request->hotel_id;
        $save = $room->save();
        if ($save) {
            Session()->flash('updated', 'The data has been updated successfully');
            return Redirect('allrooms/'.$room->hotels->id);
        }
    }

    public function deleteroom($id)
    {
        $room = rooms::find($id);
        $room->roomimg()->delete();
        $room->delete();
        Session()->flash('delete', 'room deleted successfully');
        return Redirect()->back();
        
    }
}
