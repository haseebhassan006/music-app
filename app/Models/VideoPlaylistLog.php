<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class VideoPlaylistLog extends Model {

    protected $table = 'videoplaylist_spotify_logs';

    protected static function boot()
    {
        parent::boot();
    }

}
