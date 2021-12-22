<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ZillaBlockCategory extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'color',
        'created_at',
        'updated_at',
    ];

    public function blocks()
    {
        // return $this->hasMany('\ZillaBlock');
      return  $this->hasMany(ZillaBlock::class);
    }

    protected static function boot() {
        parent::boot();
        static::deleting(function($category) {
             if ($category->blocks()->count() > 0) {
                return false;
            }
        });

    }
   
 
}
