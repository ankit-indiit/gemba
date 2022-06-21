<?php
function GembaFormFields($request, $gembaUserMetaId)
{   
    if (Route::currentRouteName() == 'gemba.update') {
        $reflectionAsaLeader = $request['reflectionAsaLeader'] == '' ? serialize(Session::get('reflection_as_a_leader')) : $request['reflectionAsaLeader'];
        $reflectOnEmployee = $request['reflectOnEmployee'] == '' ? serialize(Session::get('reflect_on_employee')) : $request['reflectOnEmployee'];
    } else {
        $reflectionAsaLeader = serialize(Session::get('reflection_as_a_leader'));
        $reflectOnEmployee = serialize(Session::get('reflect_on_employee'));
    }
	switch($request['type']){      
		case 'hsse-leader-led':     			
            $gembaFormFields = [
                [
                    'meta_key' => 'date',
                    'meta_value' => $request['date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time',
                    'meta_value' => $request['time'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_name',
                    'meta_value' => $request['team_name'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time_at_gemba',
                    'meta_value' => $request['time_at_gemba'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'gemba_located_in',
                    'meta_value' => $request['gemba_located_in'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_job_risk',
                    'meta_value' => $request['team_job_risk'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_identified_hazards',
                    'meta_value' => $request['team_identified_hazards'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'hazards_identified_option',
                    'meta_value' => serialize($request['hazards_identified_option']),
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'other_hazard_at_workplace',
                    'meta_value' => @$request['other_hazard_at_workplace'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'questions',
                    'meta_value' => serialize($request['question']),
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'observation_training_need',
                    'meta_value' => $request['observation_training_need'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'improvements_agreed_with_team',
                    'meta_value' => $request['improvements_agreed_with_team'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement',
                    'meta_value' => $request['responsible_implementing_improvement'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement_date',
                    'meta_value' => $request['responsible_implementing_improvement_date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflection_as_a_leader',
                    'meta_value' => $reflectionAsaLeader,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflect_on_employee',
                    'meta_value' => $reflectOnEmployee,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],                               
            ];

            return $gembaFormFields;    
		break;      
		case 'vision-and-mission':      						
            $gembaFormFields = [
                [
                    'meta_key' => 'date',
                    'meta_value' => $request['date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time',
                    'meta_value' => $request['time'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time_at_gemba',
                    'meta_value' => $request['time_at_gemba'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_visited',
                    'meta_value' => $request['team_visited'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'gemba_located_in',
                    'meta_value' => $request['gemba_located_in'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_share_company_vission_mission',
                    'meta_value' => $request['team_share_company_vission_mission'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_know_company_scorecard',
                    'meta_value' => $request['team_know_company_scorecard'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_translate_company_indicator',
                    'meta_value' => $request['team_translate_company_indicator'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'job_impect_these_indicators',
                    'meta_value' => $request['job_impect_these_indicators'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'visible_their_area',
                    'meta_value' => $request['visible_their_area'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'job_output_impact_indicators',
                    'meta_value' => $request['job_output_impact_indicators'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'questions',
                    'meta_value' => serialize($request['question']),
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'observation_training_need',
                    'meta_value' => $request['observation_training_need'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'improvements_agreed_with_team',
                    'meta_value' => $request['improvements_agreed_with_team'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement',
                    'meta_value' => $request['responsible_implementing_improvement'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement_date',
                    'meta_value' => $request['responsible_implementing_improvement_date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflection_as_a_leader',
                    'meta_value' => $reflectionAsaLeader,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflect_on_employee',
                    'meta_value' => $reflectOnEmployee,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],                                    
            ];

            return $gembaFormFields;      
		break;      
		case 'processes-are-standard':      			
			$gembaFormFields = [
                [
                    'meta_key' => 'date',
                    'meta_value' => $request['date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time',
                    'meta_value' => $request['time'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'team_name',
                    'meta_value' => $request['team_name'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time_at_gemba',
                    'meta_value' => $request['time_at_gemba'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'gemba_located_in',
                    'meta_value' => $request['gemba_located_in'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'document_available',
                    'meta_value' => serialize($request['document_available']),
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'update_document',
                    'meta_value' => $request['update_document'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'have_skill_matrix_associated',
                    'meta_value' => $request['have_skill_matrix_associated'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'all_steps_procedure',
                    'meta_value' => $request['all_steps_procedure'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'questions',
                    'meta_value' => serialize($request['question']),
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'observation_training_need',
                    'meta_value' => $request['observation_training_need'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'improvements_agreed_with_team',
                    'meta_value' => $request['improvements_agreed_with_team'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement',
                    'meta_value' => $request['responsible_implementing_improvement'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement_date',
                    'meta_value' => $request['responsible_implementing_improvement_date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflection_as_a_leader',
                    'meta_value' => $reflectionAsaLeader,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflect_on_employee',
                    'meta_value' => $reflectOnEmployee,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],                                      
            ];

            return $gembaFormFields;   
		break;
		case 'employees-are-engaged':      			
			$gembaFormFields = [
                [
                    'meta_key' => 'date',
                    'meta_value' => $request['date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'hour',
                    'meta_value' => $request['hour'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'participating_team',
                    'meta_value' => $request['participating_team'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'time_at_gemba',
                    'meta_value' => $request['time_at_gemba'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'gemba_located_in',
                    'meta_value' => $request['gemba_located_in'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'employee_engagemant_survey',
                    'meta_value' => $request['employee_engagemant_survey'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'questions',
                    'meta_value' => serialize($request['question']),
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'observation_training_need',
                    'meta_value' => $request['observation_training_need'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'improvements_agreed_with_team',
                    'meta_value' => $request['improvements_agreed_with_team'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement',
                    'meta_value' => $request['responsible_implementing_improvement'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'responsible_implementing_improvement_date',
                    'meta_value' => $request['responsible_implementing_improvement_date'],
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflection_as_a_leader',
                    'meta_value' => $reflectionAsaLeader,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],[
                    'meta_key' => 'reflect_on_employee',
                    'meta_value' => $reflectOnEmployee,
                    'gemba_user_meta_id' =>$gembaUserMetaId,
                ],                                      
            ];

            return $gembaFormFields;     
		break;      
		default:      
			return 'default case';      
	}     
}

function dateFormat($date)
{
    return date("d F, Y", strtotime($date));
}

function gembaPoints()
{
    return App\Models\GembaUserMeta::where('user_id', Auth::id())
        ->sum('points');
}