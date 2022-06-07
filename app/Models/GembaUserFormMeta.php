<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GembaUserFormMeta extends Model
{
    use HasFactory;

    protected $fillable = [
    	'meta_key',
    	'meta_value',
    	'gemba_user_meta_id',
    ];
}
