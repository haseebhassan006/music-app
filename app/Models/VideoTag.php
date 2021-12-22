<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class VideoTag extends Model {

    protected $table = 'video_tags';

    public function songs() {
        return Song::leftJoin('video_tags', 'video_tags.video_id', '=', (new Video)->getTable() . '.id')
            ->select('videos.*', 'video_tags.id as host_id')
            ->where('video_tags.tag', $this->tag);
    }

    public function getPermalinkUrlAttribute($value)
    {
        return route('frontend.tag', ['tag' => str_slug($this->attributes['tag'])]);
    }
}
