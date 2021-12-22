<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ZillaCategory extends Model
{
    protected $table = 'zilla_categories';
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'name',
        'group_category_id',
        'thumb',
        'color',
        'created_at',
        'updated_at',
    ];
    public function groupcategory()

    {
         return $this->belongsTo('\app\Models\ZillaGroupCategory', 'group_category_id');
        //return $this->belongsTo(ZillaGroupCategory::class, 'group_category_id');
    }

    public function templates()
    {
        // return $this->hasMany('Modules\TemplateLandingPage\Entities\Template');
        return $this->hasMany(ZillaTemplate::class);
    }

    protected static function boot() {
        parent::boot();
        static::deleting(function($category) {
             if ($category->templates()->count() > 0) {
                return false;
            }
        });

    }
   
 
}
