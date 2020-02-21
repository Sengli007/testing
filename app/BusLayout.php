<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusLayout extends Model
{
    public function bus(){
        return $this->belongsToMany('App\Bus');
    }
}
