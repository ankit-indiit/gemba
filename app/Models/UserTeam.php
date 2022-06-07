<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTeam extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'name',
    	'image',
    	'adverts_count',
    ];

    public function getImageAttribute()
    {
        if (isset($this->attributes['image'])) {
            return @asset('team/').'/'.$this->attributes['image'];
        } else {
            return @asset('user/dummy-user-profile.png');
        }
    }
}
