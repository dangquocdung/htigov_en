<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RssFeed extends Model
{
    //
    public function webmasterSection()
    {

        return $this->belongsTo('App\WebmasterSection', 'webmaster_id');
    }
}
