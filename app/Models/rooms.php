<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;
    protected $fillable=[
            'code',
            'net_price',
            'taxes',
            'taxes_type',
            'total',
            'currency',
            'image',
            'hotel_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];



    /*
        room relations
    */
    public function hotels()
    {
        return $this->belongsTo(hotels::class,'hotel_id', 'id');
    }

    public function roomimg()
    {
        return $this->hasMany(room_img::class,'room_id', 'id');
    }
}
