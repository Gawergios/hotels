<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotels extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'stars',
        'description_ar',
        'description_en',
        'image',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    /*
        hotel relations
    */
    public function rooms()
    {
        return $this->hasMany(rooms::class,'hotel_id','id');
    }

    public function hotelimgs()
    {
        return $this->hasMany(hotel_img::class, 'hotel_id','id');
    }

}
