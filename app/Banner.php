<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    //
    public function webmasterBanner()
    {

        return $this->belongsTo('App\WebmasterBanner', 'section_id');
    }

    public function typeBanner()
    {

        return $this->belongsTo('App\TypeBanner', 'type_id');
    }
}
