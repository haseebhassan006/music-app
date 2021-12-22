<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlaylistVideo extends Model
{
    protected $table = 'playlist_videos';

    protected $fillable = [
        'video_id', 'videoplaylist_id'
    ];
}