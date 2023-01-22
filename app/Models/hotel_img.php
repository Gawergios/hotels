<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hotel_img extends Model
{
    use HasFactory;

    protected $fillable = [
        'hote_img',
        'hotel_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function hotels()
    {
        return $this->belongsTo(hotels::class,'hotel_id', 'id');
    }
}
