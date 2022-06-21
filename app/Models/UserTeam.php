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

    protected $appends = [
        'team_members',        
    ];

    public function getTeamMembersAttribute()
    {
        $userTeamMemberId = UserTeamMember::where('team_id', $this->attributes['id'])
            ->pluck('team_member_id')
            ->toArray();
        return User::whereIn('id', $userTeamMemberId)->get();
    }

    public function getImageAttribute()
    {
        if (isset($this->attributes['image'])) {
            return @asset('team/').'/'.$this->attributes['image'];
        } else {
            return @asset('user/dummy-user-profile.png');
        }
    }
}
