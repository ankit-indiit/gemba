<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Model;

class GembaUserFormMeta extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
    	'meta_key',
    	'meta_value',
    	'gemba_user_meta_id',
    ];

    protected $appends = [
        'form_name',       
        'form_slug',       
    ];

    public function modelFilter()
    {
        return $this->provideFilter(\App\ModelFilters\MyReflectionFilter::class);
    }

    public function getFormNameAttribute()
    {
        $gembaFormId = GembaUserMeta::where('id', $this->attributes['gemba_user_meta_id'])
        	->pluck('gemba_form_id')
        	->first();
        return GembaForm::where('id', $gembaFormId)->pluck('name')->first();
    }

    public function getFormSlugAttribute()
    {
        $gembaFormId = GembaUserMeta::where('id', $this->attributes['gemba_user_meta_id'])
            ->pluck('gemba_form_id')
            ->first();
        return GembaForm::where('id', $gembaFormId)->pluck('slug')->first();
    }
}
