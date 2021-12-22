<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ZillaGroupCategory extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'thumb',
        'color',
        'created_at',
        'updated_at',
    ];

    public function categories()
    {
        // echo"1"; die;
        return $this->hasMany('\app\Models\ZillaCategory');
        //return $this->hasMany(ZillaCategory::class);
    }

    protected static function boot() {
        parent::boot();
        static::deleting(function($groupCategory) {
             if ($groupCategory->categories()->count() > 0) {
                return false;
            }
        });

    }
   
 
}
