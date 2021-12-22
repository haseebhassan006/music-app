<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class FormData extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'landing_page_id',
        'user_id',
        'field_values',
        'browser',
        'os',
        'device',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'field_values' => 'array',
    ];

    public function landingpage()
    {
        return $this->belongsTo(ZillaLandingPage::class, 'landing_page_id');
    }

 
}
