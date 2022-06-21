<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GembaForm;
use App\Models\GembaUserMeta;
use App\Models\GembaUserFormMeta;
use App\Models\Hazard;
use App\Models\GembaPoint;
use DB;
use Auth;
use Session;

class GembaController extends Controller
{    
    public function index()
    {
        return view('page.gemba.develop-employee');
    }

    public function show(Request $request, $slug)
    {
        $hazards = Hazard::get();
        return view('page.gemba.'.$slug.'.create', compact('hazards'));        
    }

    public function store(Request $request)
    {      
        DB::beginTransaction();
        
        try {
           
            $gembaFormId = GembaForm::where('slug', $request->type)->pluck('id')->first();
            
            $gembaUserMeta = GembaUserMeta::create([
                'user_id' => Auth::user()->id,
                'gemba_form_id' => $gembaFormId,
                'points' => 10,
            ]);

            Auth::user()->gemba_submission;

            foreach (GembaFormFields($request->all(), $gembaUserMeta->id) as $formData) {
                GembaUserFormMeta::create($formData);                        
            }                                                     

            Session::forget('reflection_as_a_leader');
            Session::forget('reflect_on_employee');

            DB::commit();

            $messags['message'] = str_replace("-"," ", ucfirst($request->type)).' created successfully!';
            $messags['status'] = true;
            return response()->json($messags, 200);

        } catch (\Exception $e) {
            $message['message'] = $e->getMessage();
            DB::rollback();
            $message['status'] = false;
            return response()->json($message, 200);
        }
    }

    public function edit(Request $request, $id)
    {
        $hazards = Hazard::get();
        $gemba = GembaUserMeta::where('id', $id)->first();
        return view('page.gemba.'.$gemba->form_slug.'.edit', compact('gemba', 'hazards'));
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        
        try {
           
            $gembaFormId = GembaForm::where('slug', $request->type)->pluck('id')->first();
            
            GembaUserFormMeta::where('gemba_user_meta_id', $id)->delete();

            GembaUserMeta::where('id', $id)->update([
                'updated_at' => now(),
            ]);

            foreach (GembaFormFields($request->all(), $id) as $formData) {
                GembaUserFormMeta::create($formData);                        
            }                                                     

            Session::forget('reflection_as_a_leader');
            Session::forget('reflect_on_employee');

            DB::commit();

            $messags['message'] = str_replace("-"," ", ucfirst($request->type)).' updated successfully!';
            $messags['status'] = true;
            return response()->json($messags, 200);

        } catch (\Exception $e) {
            $message['message'] = $e->getMessage();
            DB::rollback();
            $message['status'] = false;
            return response()->json($message, 200);
        }   
    }

    public function leaderReflection(Request $request)
    {       
        Session::put('reflection_as_a_leader', [
            'star_rating' => $request->star_rating,
            'leader_approach_tag' => serialize($request->leader_approach_tag),
            'leader_today_better_thing' => $request->leader_today_better_thing,
            'further_reflection' => $request->further_reflection,
        ]);

        $messags['message'] = 'Reflection as a leader has been Submited!';
        $messags['status'] = true;
        return response()->json($messags, 200);
    }

    public function reflectOnEmployee(Request $request)
    {       
        Session::put('reflect_on_employee', [
            'attitude_star_rating' => $request->attitude_star_rating,
            'aptitude_star_rating' => $request->aptitude_star_rating,
            'employee_behavior_tags' => serialize($request->employee_behavior_tags),
            'employee_improving_thing' => $request->employee_improving_thing,
            'employee_further_reflection' => $request->employee_further_reflection,
        ]);

        $messags['message'] = 'Reflection on employee has been Submited!';
        $messags['status'] = true;
        return response()->json($messags, 200);
    }

    public function howToGemba()
    {
        return view('page.how-to-gemba');
    }

    public function leaderAtGemba()
    {
        return view('page.gemba.leader-at-gemba');
    } 
}
