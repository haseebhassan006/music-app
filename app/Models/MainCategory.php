<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

Class MainCategory extends Model
{
    protected $table = 'maincat';
    protected $fillable =[
        'parent_id', 'name', 'description', 'created_at', 'updated_at',
    ];
    protected $primaryKey = 'id';

    $data = MainCategory::find($id);
}