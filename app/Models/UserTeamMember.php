<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
    	'user_id',
    	'team_member_id',
    ];
}
