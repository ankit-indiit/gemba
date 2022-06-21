@extends('layout.master')
@section('content') 
@include('page.component.bread-crumb', [
  'title' => 'Sharing company´s vision, mission and direction',
  'previous_page' => route('gemba.index'),
  'page_title' => 'DevelopDevelop High performance teams'
])
<section class="add-gemba-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1 mb-4">
            <div class="section-intro text-center">
               <h2 class="section-title"><strong>Purpose:</strong> Employees are aware and value company´s direction </h2>
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
                        <input
                            type="date"
                            class="form-control"
                            name="date"
                            value="{{ $gemba->formMeta('date') }}"
                            id="gembaDatePickker"
                        >
                    </div>
                  </div>
                  <div class="col-md-4 offset-md-4">
                    <div class="form-group">  
                        <label for="" class="form-label">Time</label>
                        <input
                            type="time"
                            class="form-control"
                            name="time"
                            value="{{ $gemba->formMeta('time') }}"
                            id=""
                        >
                    </div>
                  </div>                  
                  <div class="col-md-6">
                     <div class="form-group">  
                        <label for="" class="form-label">Time at Gemba(minutes)</label>
                        <input
                            type="text"
                            class="form-control"
                            name="time_at_gemba"
                            id=""
                            value="{{ $gemba->formMeta('time_at_gemba') }}"
                        >
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="" class="form-label">Team visited</label>
                        <input
                            type="text"
                            class="form-control"
                            name="team_visited"
                            id=""
                            value="{{ $gemba->formMeta('team_visited') }}"
                        >
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label">Gemba located in</label>
                        <input
                            type="text"
                            class="form-control"
                            name="gemba_located_in"
                            id=""
                            value="{{ $gemba->formMeta('gemba_located_in') }}"
                        >
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Can the team share what the company´s vision, mission and values are?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="team_share_company_vission_mission"
                                    id="inlineRadio1"
                                    value="yes"
                                    {{ $gemba->formMeta('team_share_company_vission_mission') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio1">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="team_share_company_vission_mission"
                                    id="inlineRadio2"
                                    value="no"
                                    {{ $gemba->formMeta('team_share_company_vission_mission') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio2">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Does the team know what are the company´s annual objectives?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="team_know_company_scorecard"
                                    id="inlineRadio3"
                                    value="yes"
                                    {{ $gemba->formMeta('team_know_company_scorecard') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio3">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="team_know_company_scorecard"
                                    id="inlineRadio4"
                                    value="no"
                                    {{ $gemba->formMeta('team_know_company_scorecard') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio4">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Can the team translate the company´s objectives to the team´s indicators?<i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="team_translate_company_indicator"
                                    id="inlineRadio5"
                                    value="yes"
                                    {{ $gemba->formMeta('team_translate_company_indicator') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio5">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="team_translate_company_indicator"
                                    id="inlineRadio6"
                                    value="no"
                                    {{ $gemba->formMeta('team_translate_company_indicator') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio6">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group ">
                        <label for="" class="form-label mb-3">Are these indicators visible in their area and data is up-to-date?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="visible_their_area"
                                    id="inlineRadio8"
                                    value="yes"
                                    {{ $gemba->formMeta('visible_their_area') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio8">Yes</label>
                           </div>                           
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="visible_their_area"
                                    id="inlineRadio7"
                                    value="no"
                                    {{ $gemba->formMeta('visible_their_area') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio7">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group ">
                        <label for="" class="form-label mb-3">Can the team describe how their jobs impact these indicators?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="job_impect_these_indicators"
                                    id="jobImpectTheseIndicatorsYes"
                                    value="yes"
                                    {{ $gemba->formMeta('job_impect_these_indicators') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="jobImpectTheseIndicatorsYes">Yes</label>
                           </div>                           
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="job_impect_these_indicators"
                                    id="jobImpectTheseIndicatorsNo"
                                    value="no"
                                    {{ $gemba->formMeta('job_impect_these_indicators') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="jobImpectTheseIndicatorsNo">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label">How does my job´s output impact these indicators?</label>
                        <input
                            type="text"
                            class="form-control"
                            name="job_output_impact_indicators"
                            id=""
                            value="{{ $gemba->formMeta('job_output_impact_indicators') }}"
                        >
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
                            <textarea class="form-control" name="observation_training_need" id="">{{ $gemba->formMeta('observation_training_need') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">   
                            <label for="" class="form-label">Improvements agreed with the team:</label>
                            <textarea type="text" class="form-control" name="improvements_agreed_with_team" id="">{{ $gemba->formMeta('improvements_agreed_with_team') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Responsible for implementing the improvements and date to make them</label>
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
                        <input type="hidden" name="type" value="vision-and-mission">
                        <input type="hidden" name="formMetaId" id="formMetaId" value="{{ Request::segment(2) }}">
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
