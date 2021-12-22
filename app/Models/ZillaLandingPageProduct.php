<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ZillaLandingPageProduct extends Model
{
    protected $table = 'zilla_landingpage_products';
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'name',
        'price',
        'currency',
        'description',
        'length',
        'wide',
        'height',
        'weight',
        'is_publish',
        'is_trash',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'is_publish' => 'boolean',
        'is_trash' => 'boolean',
    ];

    public function scopePublish($query)
    {
        return $query->where('is_publish', '=', 1);
    }
    public function scopeUnPublish($query)
    {
        return $query->where('is_publish', '=', 0);
    }
    public function scopeTrash($query)
    {
        return $query->where('is_trash', '=', 1);
    }
}
