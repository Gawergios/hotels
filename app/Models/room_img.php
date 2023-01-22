<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_img extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_img',
        'room_id',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function rooms()
    {
        return $this->belongsTo(rooms::class, 'room_id','id');
    }
}
