<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class GembaUserMeta extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
    	'user_id',
    	'gemba_form_id',
        'points',
    ];

    protected $appends = [
        'form_name',        
        'form_slug',        
        'formMeta',
    ];

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\MyGembaFilter::class);
    }

    public function formMeta($metaKey)
    {
        return GembaUserFormMeta::where('meta_key', $metaKey)
            ->where('gemba_user_meta_id', $this->attributes['id'])
            ->pluck('meta_value')
            ->first();
    }    

    public function getFormNameAttribute()
    {
        return GembaForm::where('id', $this->attributes['gemba_form_id'])->pluck('name')->first();
    }

    public function getFormSlugAttribute()
    {
        return GembaForm::where('id', $this->attributes['gemba_form_id'])->pluck('slug')->first();
    }  

    public function getCreatedAtAttribute()
    {
        return date('d F, Y', strtotime($this->attributes['created_at']));
    }
}
