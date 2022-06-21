<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'team_id',
        'role',
        'token',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'gemba_submission',        
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute()
    {
        if (isset($this->attributes['image'])) {
            return @asset('user/').'/'.$this->attributes['image'];
        } else {
            return @asset('assets/img/dummy-user-image.png');
        }
    }

    public function getGembaSubmissionAttribute()
    {
        $submited = GembaUserMeta::where('user_id', $this->attributes['id'])
            ->whereMonth('created_at', date("m"))
            ->groupBy('gemba_form_id')
            ->pluck('gemba_form_id')
            ->toArray();
        $formIds = GembaForm::pluck('id')->toArray();
        $submitedForm = array_intersect($submited, $formIds);
        $arr = array_diff($submited, $formIds);
        if (in_array(7777, $arr)) {    

            $getLastBonusArrayId = GembaUserMeta::where('user_id', $this->attributes['id'])
                ->whereMonth('created_at', date("m"))
                ->where('gemba_form_id', 7777)
                ->orderBy('id', 'DESC')
                ->pluck('id')
                ->first();
    
            $submited_inner = GembaUserMeta::where('user_id', $this->attributes['id'])
                ->whereMonth('created_at', date("m"))
                ->where('id', '>',  $getLastBonusArrayId)
                ->groupBy('gemba_form_id')
                ->pluck('gemba_form_id')
                ->toArray();

            $submitedForm = array_intersect($submited_inner, $formIds); 

            if (count($submitedForm) == count($formIds)) {
                // bonus added here
                return GembaUserMeta::create([
                    'user_id' => $this->attributes['id'],
                    'gemba_form_id' => 7777,
                    'points' => 50,
                ]);           
            } 
        } else {
            if (count($submitedForm) == count($formIds)) {
                // bonus added here
                return GembaUserMeta::create([
                    'user_id' => $this->attributes['id'],
                    'gemba_form_id' => 7777,
                    'points' => 50,
                ]);  
            }            
        }
        return '';
    }
}
