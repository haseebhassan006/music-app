<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ZillaBlock extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'block_category_id',
        'name',
        'thumb', // like type template
        'content',
        'style',
        'active',
        'created_at',
        'updated_at',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    public function getReplaceVarBlockContent() {
        
        return replaceVarContentStyles($this->content);
    }

    public function category()
    {
        // return $this->belongsTo('\ZillaBlockCategory', 'block_category_id');
        return $this->belongsTo(ZillaBlockCategory::class,'block_category_id' );
    }

 
}
