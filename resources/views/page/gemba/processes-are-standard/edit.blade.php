@extends('layout.master')
@section('content')  
@include('page.component.bread-crumb', [
  'title' => 'Processes are standard',
  'previous_page' => route('gemba.index'),
  'page_title' => 'Develop High performance teams'
])
<section class="add-gemba-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1 mb-4">
            <div class="section-intro text-center">
               <h2 class="section-title"><strong>Gemba Purpose:</strong> Coach team the value of procedures documented with standard quality and stakeholders are following them step by step</h2>
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
                        <label for="" class="form-label">Team Name</label>
                        <input 
                            type="text"
                            class="form-control"
                            name="team_name"
                            id=""
                            value="{{ $gemba->formMeta('team_name') }}" 
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
                  <div class="col-md-12">
                     <div class="form-group">
                        @php
                            $document = unserialize($gemba->formMeta('document_available'));
                            print_r($document);
                        @endphp
                        
                        <label for="" class="form-label w-100 mb-3">Documents available?</label>
                        <div class="checkbox-group">
                           <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                id="inlineCheckbox1"
                                name="document_available[]"
                                value="sop"
                                {{ in_array("sop", $document) ? 'checked' : '' }}
                            >
                              <label class="form-check-label" for="inlineCheckbox1">SOP <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="An SOP is a procedure specific to your operation that describes the activities necessary to complete tasks in accordance with industry regulations, provincial laws or even just your own standards for running your business"></i></label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input
                                class="form-check-input"
                                type="checkbox"
                                id="inlineCheckbox2"
                                name="document_available[]"
                                value="checklist"
                                {{ in_array("checklist", $document) ? 'checked' : '' }}
                            >
                              <label class="form-check-label" for="inlineCheckbox2">Checklist <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Process checklists are an error proofing and process data collection device which guides operators and staff in monitoring the key plant components, settings, and quality of both work in progress and finish products."></i></label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="inlineCheckbox3"
                                    name="document_available[]"
                                    value="flowchart"
                                    {{ in_array("flowchart", $document) ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineCheckbox3">Flowchart <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="A flowchart is a picture of the separate steps of a process in sequential order. It is a generic tool that can be adapted for a wide variety of purposes, and can be used to describe various processes, such as a manufacturing process, an administrative or service process, or a project plan."></i></label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="inlineCheckbox4"
                                    name="document_available[]"
                                    value="working instruction"
                                    {{ in_array("working instruction", $document) ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineCheckbox4">Working instructions <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Work Instructions are documents that clearly and precisely describe the correct way to perform certain tasks that may cause inconvenience or damage if not done in the established manner. That is, describe, dictate or stipulate the steps that must be followed to correctly perform any specific activity or work."></i></label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Updated documents in less than 1 year?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="update_document"
                                    id="inlineRadio3"
                                    value="yes"
                                    {{ $gemba->formMeta('update_document') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio3">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="update_document"
                                    id="inlineRadio4"
                                    value="no"
                                    {{ $gemba->formMeta('update_document') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio4">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Does the procedure have a skill matrix associated? <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="A skills matrix is a framework used to map employees' skills and their levels. It's a grid that contains information about available skill and their evaluation. It is used to manage, plan, and monitor existing and desired skills for a role, team, department, project, or an entire company."></i></label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="have_skill_matrix_associated"
                                    id="inlineRadio5"
                                    value="yes"
                                    {{ $gemba->formMeta('have_skill_matrix_associated') == 'yes' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio5">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="have_skill_matrix_associated"
                                    id="inlineRadio6"
                                    value="no"
                                    {{ $gemba->formMeta('have_skill_matrix_associated') == 'no' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio6">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group ">
                        <h5 class="mb-3">Observe Process</h5>
                        <label for="" class="form-label mb-3">Are all the steps of the procedure followed?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="all_steps_procedure"
                                    id="inlineRadio7"
                                    value="No"
                                    {{ $gemba->formMeta('all_steps_procedure') == 'No' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio7">No</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="all_steps_procedure"
                                    id="inlineRadio8"
                                    value="Yes, in order"
                                    {{ $gemba->formMeta('all_steps_procedure') == 'Yes, in order' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio8">Yes, in order</label>
                           </div>
                           <div class="form-check form-check-inline">
                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="all_steps_procedure"
                                    id="inlineRadio9"
                                    value="Yes, but not in order"
                                    {{ $gemba->formMeta('all_steps_procedure') == 'Yes, but not in order' ? 'checked' : '' }}
                                >
                              <label class="form-check-label" for="inlineRadio9">Yes, but not in order</label>
                           </div>
                        </div>
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
                            <textarea rows="2" type="text" class="form-control" name="observation_training_need" id="">{{ $gemba->formMeta('observation_training_need') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">   
                            <label for="" class="form-label">Improvements agreed with the team:</label>
                            <textarea rows="2" type="text" class="form-control" name="improvements_agreed_with_team" id="">{{ $gemba->formMeta('improvements_agreed_with_team') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Responsible for implementing the improvements and date to make them</label>
                            <div class="row">
                                <div class="col-md-8">  
                                    <input type="text" class="form-control" name="responsible_implementing_improvement" id="" value="{{ $gemba->formMeta('responsible_implementing_improvement') }}">
                                </div>
                                <div class="col-md-4 mt-md-0 mt-3">
                                    <input type="date" class="form-control" name="responsible_implementing_improvement_date" id="responsibleImplementingImprovementDate" value="{{ $gemba->formMeta('responsible_implementing_improvement_date') }}">
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
                        <input type="hidden" name="type" value="processes-are-standard">
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