<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spokesman extends Model
{
    //
    public function coquan()
    {

        return $this->belongsTo('App\Organ', 'coquan_id');
    }
}
