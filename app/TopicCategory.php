<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TopicCategory extends Model
{
    //Relation to Sections
    public function section()
    {
        return $this->belongsTo('App\Section', 'section_id');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic', 'topic_id');
    }

}
