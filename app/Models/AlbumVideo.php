<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumVideo extends Model
{
    protected $table = 'album_videos';

    protected $fillable = [
        'video_id', 'album_id'
    ];
}