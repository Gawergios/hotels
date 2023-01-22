<?php

namespace App\Http\Controllers;

use App\Models\hotel_img;
use Illuminate\Http\Request;
use App\Models\hotels;
use App\Traits\imagestraits;
use LaravelLocalization;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Session;

class hotelscontroller extends Controller
{
    use imagestraits;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addhotel()
    {
        return view("dashboard.addhotels");
    }

    public function posthotel(Request $request)
    {
        $validated = $request->validate([
            'name_ar'       => 'required|unique:hotels,name_ar',
            'name_en'       => 'required|unique:hotels,name_en',
            'stars'      => 'required|numeric',
            'description_ar' => 'required',
            'description_en' => 'required',
            'image'      => 'required',
        ]);

        $hotel = new hotels();
        if ($request->file('image')) {
            $filename =$this->saveimage($request->file('image'),'image');
        }

        $hotel->name_ar = $request->name_ar;
        $hotel->name_en = $request->name_en;
        $hotel->stars = $request->stars;
        $hotel->description_ar = $request->description_ar;
        $hotel->description_en = $request->description_en;
        $hotel->image = $filename;
        $save = $hotel->save();
        if ($save) {
            Session()->flash('message', 'data saved successfully');
            return Redirect('addhotel');
        } else {
            Session()->flash('message', 'Something is wrong');
            return Redirect('addhotel');
        }
    }

    public function addimg()
    {
        return view("dashboard.hotelimg");
    }



    public function postimg(Request $request)
    {
        $validated = $request->validate([
            'hotel_id'       => 'required',
            'hotel_img'      => 'required|unique:hotel_imgs',
        ]);

        $img = new hotel_img();
        if ($request->file('hotel_img')) {
            $filename = $this->saveimage($request->file('hotel_img'),'image');
        }
            $img->hotel_id = $request->hotel_id;
            $img->hotel_img = $filename;
            $save = $img->save();

            if ($save) {
                Session()->flash('message', 'The image has been saved');
                return Redirect('addhotelimg');
            } else {
                Session()->flash('message', 'Something is wrong');
                return Redirect('addhotelimg');
            }
    }

    public function allhotels()
    {
        $hotels = hotels::select('id',
            'name_'. LaravelLocalization::getCurrentLocale() .' as name',
            'stars',
            'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
            'image',
        )->paginate(10);
        //print_r($hotels);
        return view("dashboard.allhotels", ['hotels' => $hotels]);
    }

    public function updatehotel($id)
    {
        $hotel = hotels::find($id);
        if($hotel){
        return view('dashboard.updatehotels', ['hotel' => $hotel]);
        }else{
            return Redirect()->back();
        }
    }
    public function updateh(Request $request,$id)
    {
        $validated = $request->validate([
            'name_ar'       => 'required',
            'name_en'       => 'required',
            'stars'      => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
        ]);
        $hotel = hotels::find($id);
        if ($request->file('image')) {
            $filename=$this->saveimage($request->file('image'),'image');
            $hotel->image = $filename;
        }

        $hotel->name_ar = $request->name_ar;
        $hotel->name_en = $request->name_en;
        $hotel->stars = $request->stars;
        $hotel->description_ar = $request->description_ar;
        $hotel->description_en = $request->description_en;
        $save=$hotel->save();

        if($save){
            Session()->flash('message', 'The data has been updated successfully');
            return Redirect('allhotels');
        }
    }

    public function deletehotel($id)
    {

        $hotel = hotels::find($id);
        $hotel->rooms()->delete();
        $hotel->hotelimgs()->delete();
        $hotel->delete();
        Session()->flash('delete', 'hotel deleted successfully');
        return Redirect('allhotels');

    }
}
