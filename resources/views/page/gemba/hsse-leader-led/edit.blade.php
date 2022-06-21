@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', [
    'title' => 'HSSE Leader Led',
    'previous_page' => route('gemba.index'),
    'page_title' => 'Develop High performance teams'
])
<section class="add-gemba-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-4">
                <div class="section-intro text-center">
                    <h2 class="section-title"><strong>Purpose:</strong>Coach the importance of risk awareness in the workplace</h2>
                </div>
            </div>
            <div class="col-lg-10 offset-lg-1">
                <div class="add-form-div">                        
                    <form class="row g-4" action="{{ route('gemba.update', Request::segment(2)) }}" method="PUT" id="updateGembaForm">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="" class="form-label">Date</label>
                              <input type="date" class="form-control" name="date" value="{{ $gemba->formMeta('date') }}" id="gembaDatePickker">
                            </div>
                        </div>
                        <div class="col-md-4 offset-md-4">
                            <div class="form-group">  
                              <label for="" class="form-label">Time</label>
                              <input type="time" class="form-control" name="time" value="{{ $gemba->formMeta('time') }}" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group"> 
                              <label for="" class="form-label">Team name involved</label>
                              <input type="text" class="form-control" name="team_name" value="{{ $gemba->formMeta('team_name') }}" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">  
                                <label for="" class="form-label">Time at Gemba (minutes)</label>
                                <input type="text" class="form-control" name="time_at_gemba" value="{{ $gemba->formMeta('time_at_gemba') }}" id="">
                            </div>
                        </div>                       
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Gemba located in</label>
                                <input type="text" class="form-control" name="gemba_located_in" value="{{ $gemba->formMeta('gemba_located_in') }}" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label w-100 mb-3">Can the team list their job risks?</label>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="team_job_risk"
                                        id="inlineRadio1"
                                        value="yes"
                                        {{ $gemba->formMeta('team_job_risk') == 'yes' ? 'checked' : '' }}
                                    >
                                   <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="team_job_risk"
                                        id="inlineRadio2"
                                        value="no"
                                        {{ $gemba->formMeta('team_job_risk') == 'no' ? 'checked' : '' }}
                                    >
                                   <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label w-100 mb-3">Have your team observed any hazards in the workplace?</label>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="team_identified_hazards"
                                        id="inlineRadio3"
                                        value="yes"
                                        {{ $gemba->formMeta('team_identified_hazards') == 'yes' ? 'checked' : '' }}
                                    >
                                   <label class="form-check-label" for="inlineRadio3">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input
                                        class="form-check-input"
                                        type="radio"
                                        name="team_identified_hazards"
                                        id="inlineRadio4"
                                        value="no"
                                        {{ $gemba->formMeta('team_identified_hazards') == 'no' ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="inlineRadio4">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                @php
                                    $unSerHazard = unserialize($gemba->formMeta('hazards_identified_option'));
                                @endphp
                                <label for="" class="form-label">
                                    Select the hazards identified with the team in their workplace:
                                </label>
                                <select data-placeholder="Select...." name="hazards_identified_option[]" multiple class="chosen-select form-control multi_select_mandatory">
                                    @foreach ($hazards as $hazard)
                                        <option {{ in_array($hazard->name, $unSerHazard) ? 'selected' : '' }} value="{{ $hazard->name }}">{{ $hazard->name }}</option>
                                    @endforeach                               
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">   
                                <label for="" class="form-label">Type any other hazard found at their workplace:</label>
                                <input type="text" class="form-control" name="other_hazard_at_workplace" value="{{ $gemba->formMeta('other_hazard_at_workplace') }}" id="">
                            </div>
                        </div>
                        @include('page.gemba.component.add-question-section')
                        <div class="appendQus"></div>
                        @foreach (unserialize($gemba->formMeta('questions')) as $question)
                            <div class="col-md-12">
                                <div class="form-group">   
                                    <label for="" class="form-label">{{ $question['label'] }}</label>
                                    <input type="hidden" name="question[{{$loop->iteration}}][label]" value="{{ $question['label'] }}">
                                    <textarea type="text" class="form-control" name="question[{{$loop->iteration}}][comment]" id="">{{ $question['comment'] }}</textarea>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="form-group">   
                                <label for="" class="form-label">Observations and/or Training Needs</label>
                                <textarea type="text" class="form-control" name="observation_training_need" id="">{{ $gemba->formMeta('observation_training_need') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">   
                                <label for="" class="form-label">Improvements/actions agreed with the team:</label>
                                <textarea type="text" class="form-control" name="improvements_agreed_with_team" id="">{{ $gemba->formMeta('improvements_agreed_with_team') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="form-label">Responsible for implementing the improvements and deadline date</label>
                                <div class="row">
                                    <div class="col-md-8">  
                                        <input type="text" class="form-control" name="responsible_implementing_improvement" value="{{ $gemba->formMeta('responsible_implementing_improvement') }}" id="">
                                    </div>
                                    <div class="col-md-4 mt-md-0 mt-3">
                                        <input type="date" class="form-control" name="responsible_implementing_improvement_date" value="{{ $gemba->formMeta('responsible_implementing_improvement_date') }}" id="responsibleImplementingImprovementDate">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="modal-btn-group">
                                <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#ReflectionAsaLeader">My own reflection as a leader</button>
                                <button type="button" class="modal-btn" data-bs-toggle="modal" data-bs-target="#ReflectOnEmployee">Reflect on employee/team behavior</button>
                            </div>
                        </div>
                        <div class="col-12">
                            <input type="hidden" name="type" value="hsse-leader-led">
                            <input type="hidden" name="formMetaId" id="formMetaId" value="{{ Request::segment(2) }}">
                            <input
                                type="hidden"
                                name="reflectOnEmployee"
                                id="reflectOnEmployeeOld"
                                value="{{ $gemba->formMeta('reflect_on_employee') }}"
                            >
                            <input
                                type="hidden"
                                name="reflectionAsaLeader"
                                id="reflectionAsaLeaderOld"
                                value="{{ $gemba->formMeta('reflection_as_a_leader') }}"
                            >
                            <div class="form-group form-submit-action text-center">
                                <button type="submit" class="submit-button" id="updateGembaFormBtn">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

   @include('page.gemba.component.reflection-as-a-leader', compact('gemba'))
   @include('page.gemba.component.reflect-on-employee', compact('gemba'))

</section>
@endsection
@section('customGembaScripts')
<script src="{{ asset('assets/js/custom-gemba.js') }}"></script>
@endsection