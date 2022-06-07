@extends('layout.master')
@section('content') 
@include('page.component.bread-crumb', ['title' => 'Employees are engaged', 'previous_page' => route('gemba.index'), 'page_title' => 'Develop Employee/ Team'])
<section class="add-gemba-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-4">
                <div class="section-intro text-center">
                    <h2 class="section-title"><strong>Purpose:</strong> Create plans of action to increase your employee engagement</h2>
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
                            <input type="time" class="form-control" name="hour" value="{{ date("H:i") }}" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="" class="form-label">Participating team</label>
                            <input type="text" class="form-control" name="participating_team" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">  
                            <label for="" class="form-label">Duration at Gemba (minutes)</label>
                            <input type="text" class="form-control" name="time_at_gemba" id="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="" class="form-label">Function visited</label>
                            <input type="text" class="form-control" name="function_visited" id="">
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
                            <label for="" class="form-label">What question from the “Employee Engagement Survey" questionnaire are you going to discuss with the team?</label>
                            <input type="text" class="form-control" name="employee_engagemant_survey" id="">
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
                        <input type="hidden" name="type" value="employees-are-engaged">
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