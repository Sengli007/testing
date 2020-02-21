<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusSeat extends Model
{
    protected $fillable = [
        'seat_no',
        'row',
        'col',
        'bus_id'
    ];
}
