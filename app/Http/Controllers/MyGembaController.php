<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GembaForm;
use App\Models\GembaUserMeta;
use App\Models\GembaUserFormMeta;
use DB;
use Auth;
use Session;

class MyGembaController extends Controller
{    
    public function index(Request $request)
    {       
        $gembas = GembaUserMeta::filter($request->all())
            ->where('user_id', Auth::user()->id)
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
        // switch($gemba->gemba_form_id)
        // {      
        //     case 1:                 
        //         return view('page.gemba.hsse-leader-led.show', compact('gemba'));
        //     break;
        //     case 2:                 
        //         return view('page.gemba.vision-and-mission.show', compact('gemba'));
        //     break;
        //     case 3:                 
        //         return view('page.gemba.processes-are-standard.show', compact('gemba'));
        //     break;
        //     case 4:                 
        //         return view('page.gemba.employees-are-engaged.show', compact('gemba'));
        //     break;
        //     default:      
        //     return redirect()->back()->with('error', 'Something went worng!');            
        // }
    }     
}
