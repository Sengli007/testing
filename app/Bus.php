<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable=[
        'bus_no',
        'bus_type_id',
        'tt_seat_row',
        'bus_layout_id',
        'last_seat'
    ];

    public function bus_layout() {
        return $this->hasOne('App\BusLayout');
    }
}
