@extends('layout.master')
@section('content')  
@include('page.component.bread-crumb', ['title' => 'Processes are standard', 'previous_page' => route('gemba.index'), 'page_title' => 'Develop Employee/ Team'])
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
                <form class="row g-4" action="{{ route('gemba.store') }}" method="POST" id="GembaForm">
                  @csrf
                  <div class="col-md-4">
                      <div class="form-group">
                          <label for="" class="form-label">Date</label>
                          <input type="date" class="form-control" name="date" value="{{ date("Y-m-d") }}" id="gembaDatePickker">
                      </div>
                  </div>
                  <div class="col-md-4 offset-md-4">
                      <div class="form-group">  
                          <label for="" class="form-label">Time</label>
                          <input type="time" class="form-control" name="time" value="{{ date("H:i") }}" id="">
                      </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group"> 
                        <label for="" class="form-label">Team Name</label>
                        <input type="text" class="form-control" name="team_name" id="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">  
                        <label for="" class="form-label">Time at Gemba(minutes)</label>
                        <input type="text" class="form-control" name="time_at_gemba" id="">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label">Function of the area visited</label>
                        <select class="form-select form-control" name="function_of_area_visited" aria-label="Default select example">
                           <option selected>Select...</option>
                           <option value="1">One</option>
                           <option value="2">Two</option>
                           <option value="3">Three</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="" class="form-label">Gemba located in</label>
                        <input type="text" class="form-control" name="gemba_located_in" id="">
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Documents available?</label>
                        <div class="checkbox-group">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="document_available[]" value="sop">
                              <label class="form-check-label" for="inlineCheckbox1">SOP <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="document_available[]" value="checklist">
                              <label class="form-check-label" for="inlineCheckbox2">Checklist <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="document_available[]" value="flowchart">
                              <label class="form-check-label" for="inlineCheckbox3">Flowchart <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="document_available[]" value="working instruction">
                              <label class="form-check-label" for="inlineCheckbox4">Working instructions <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Updated documents in less than 1 year?</label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="update_document" id="inlineRadio3" value="yes">
                              <label class="form-check-label" for="inlineRadio3">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="update_document" id="inlineRadio4" value="no">
                              <label class="form-check-label" for="inlineRadio4">No</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12">
                     <div class="form-group">
                        <label for="" class="form-label w-100 mb-3">Does the procedure have a skill matrix associated? <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i></label>
                        <div class="from-radio-box">
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="have_skill_matrix_associated" id="inlineRadio5" value="yes">
                              <label class="form-check-label" for="inlineRadio5">Yes</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="have_skill_matrix_associated" id="inlineRadio6" value="no">
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
                              <input class="form-check-input" type="radio" name="all_steps_procedure" id="inlineRadio7" value="No">
                              <label class="form-check-label" for="inlineRadio7">No</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="all_steps_procedure" id="inlineRadio8" value="Yes, in order">
                              <label class="form-check-label" for="inlineRadio8">Yes, in order</label>
                           </div>
                           <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="all_steps_procedure" id="inlineRadio9" value="Yes, but not in order">
                              <label class="form-check-label" for="inlineRadio9">Yes, but not in order</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  @include('page.gemba.component.add-question-section')
                  <div class="col-md-12">
                        <div class="form-group">   
                            <label for="" class="form-label">Observations and/or Training Needs</label>
                            <input type="text" class="form-control" name="observation_training_need" id="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">   
                            <label for="" class="form-label">Improvements agreed with the team:</label>
                            <textarea type="text" class="form-control" name="improvements_agreed_with_team" id=""></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="" class="form-label">Responsible for implementing the improvements and date to make them</label>
                            <div class="row">
                                <div class="col-md-8">  
                                    <input type="text" class="form-control" name="responsible_implementing_improvement" id="">
                                </div>
                                <div class="col-md-4 mt-md-0 mt-3">
                                    <input type="date" class="form-control" name="responsible_implementing_improvement_date" id="responsibleImplementingImprovementDate">
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
                        <div class="form-group form-submit-action text-center">
                            <button type="submit" class="submit-button" id="GembaFormBtn">Submit</button>
                        </div>
                    </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   
   @include('page.gemba.component.reflection-as-a-leader')
   @include('page.gemba.component.reflect-on-employee')

</section>
@endsection
@section('customGembaScripts')
<script src="{{ asset('assets/js/custom-gemba.js') }}"></script>
@endsection