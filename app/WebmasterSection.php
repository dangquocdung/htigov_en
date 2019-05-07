<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebmasterSection extends Model
{
    //
    public function sections()
    {

        return $this->hasMany('App\Section' , 'webmaster_id')->orderby('row_no', 'asc');
    }

    public function topics()
    {

        return $this->hasMany('App\Topic' , 'webmaster_id')->select(['id','title_vi','title_en','photo_file','seo_url_slug_vi','seo_url_slug_en','status','date','webmaster_id'])->orderby('id', 'desc');
        
    }

    public function menus()
    {

        return $this->hasMany('App\Section' , 'cat_id')->orderby('row_no', 'asc');
    }

    public function customFields()
    {

        return $this->hasMany('App\WebmasterSectionField' , 'webmaster_id')->where('status', '!=', 0)->orderby('row_no', 'asc');
    }

    public function rssfeeds()
    {

        return $this->hasMany('App\RssFeed' , 'webmaster_id');
    }

}

