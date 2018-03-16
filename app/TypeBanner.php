<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeBanner extends Model
{
    public function banners()
    {

        return $this->hasMany('App\Banner', 'type_id');
    }
}
