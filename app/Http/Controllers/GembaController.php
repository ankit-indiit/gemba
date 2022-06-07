<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GembaForm;
use App\Models\GembaUserMeta;
use App\Models\GembaUserFormMeta;
use App\Models\Hazard;
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
        if ($slug == 'hsse-leader-led') {
            return view('page.gemba.hsse-leader-led.create', compact('hazards'));
        } elseif ($slug == 'vision-and-mission') {
            return view('page.gemba.vision-and-mission.create');
        } elseif ($slug == 'processes-are-standard') {
            return view('page.gemba.processes-are-standard.create');
        } elseif ($slug == 'employees-are-engaged') {
            return view('page.gemba.employees-are-engaged.create');
        }
    }

    public function store(Request $request)
    {       
        DB::beginTransaction();
        
        try {
           
            $gembaFormId = GembaForm::where('slug', $request->type)->pluck('id')->first();
            $gembaUserMeta = GembaUserMeta::create([
                'user_id' => Auth::user()->id,
                'gemba_form_id' => $gembaFormId,
                'gemba_form_id' => $gembaFormId,
            ]);               

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

    public function leaderReflection(Request $request)
    {       
        Session::put('reflection_as_a_leader', [
            'star_rating' => $request->star_rating,
            'leader_reflection' => $request->leader_reflection,
            'leader_approach_tag' => serialize($request->leader_approach_tag),
            'leader_today_better_thing' => $request->leader_today_better_thing,
        ]);

        $messags['message'] = 'Reflection as a leader has been Submited!';
        $messags['status'] = true;
        return response()->json($messags, 200);
    }

    public function reflectOnEmployee(Request $request)
    {       
        Session::put('reflect_on_employee', [
            'star_rating' => $request->star_rating,
            'refelection_on_employee' => $request->refelection_on_employee,
            'employee_behavior_tags' => serialize($request->employee_behavior_tags),
            'employee_further_reflection' => $request->employee_further_reflection,
            'employee_improving_thing' => $request->employee_improving_thing,
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
