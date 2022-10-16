<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'shopify_scripttag_id'
    ];
}
