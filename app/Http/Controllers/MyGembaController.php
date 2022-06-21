<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GembaForm;
use App\Models\GembaUserMeta;
use App\Models\GembaUserFormMeta;
use App\Models\GembaPoint;
use App\Models\Hazard;
use DB;
use Auth;
use Session;

class MyGembaController extends Controller
{    
    public function index(Request $request)
    {       
        $gembas = GembaUserMeta::filter($request->all())
            ->where('user_id', Auth::user()->id)
            ->where('gemba_form_id', '!=','7777')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);       
        return view('page.gemba.my-gemba', compact('gembas'));
    }

    public function show(Request $request, $id)
    {
        $gemba = GembaUserMeta::where('id', $id)->first();
        $gembaForm = GembaForm::get();

        foreach ($gembaForm as $form) {
            switch($gemba->gemba_form_id)
            {      
                case $form->id:                 
                    return view('page.gemba.'.$form->slug.'.show', compact('gemba'));
                break;                          
            }   
        }
    }    

    public function myReflection(Request $request)
    {
        return view('page.gemba.my-reflection.my-reflection');
    }

    public function myReflectionList(Request $request, $title)
    {
        $gembaIds = GembaUserMeta::where('user_id', Auth::user()->id)
            ->pluck('id')
            ->toArray();
        $reflections = GembaUserFormMeta::filter($request->all())
            ->where('meta_key', str_replace("-", "_", $title))
            ->where('meta_value', '!=', 'N;')
            ->where('meta_value', '!=', '')
            ->whereIn('gemba_user_meta_id', $gembaIds)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);
        return view('page.gemba.my-reflection.my-reflection-list', compact('reflections'));
    }

    public function myReflectionDetail(Request $request, $gembaUserMetaId, $title)
    {
        $gemba = GembaUserMeta::where('id', $gembaUserMetaId)->first();         
        return view('page.gemba.my-reflection.my-reflection-detail', compact('title', 'gemba'));
    }

    public function appInformation()
    {
        return view('page.app-information');
    }
}
