@extends('layout.master')
@section('content') 
@include('page.component.bread-crumb', [
    'title' => 'Employees are engaged',
    'previous_page' => route('gemba.index'),
    'page_title' => 'Develop High performance teams'
])
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
                                name="hour"
                                value="{{ $gemba->formMeta('hour') }}"
                                id=""
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group"> 
                            <label for="" class="form-label">Participating team</label>
                            <input
                                type="text"
                                class="form-control"
                                name="participating_team"
                                value="{{ $gemba->formMeta('participating_team') }}"
                                id=""
                            >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">  
                            <label for="" class="form-label">Duration at Gemba (minutes)</label>
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
                            <label for="" class="form-label">What question from the “Employee Engagement Survey" questionnaire are you going to discuss with the team? <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Employee engagement is the extent to which employees feel passionate about their jobs, are committed to the organization, and put discretionary effort into their work. ... Employee engagement goes beyond activities, games, and events. Employee engagement drives performance."></i></label>
                            <input
                                type="text"
                                class="form-control"
                                name="employee_engagemant_survey"
                                id=""
                                value="{{ $gemba->formMeta('employee_engagemant_survey') }}"
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
                            <textarea type="text" class="form-control" name="observation_training_need" id="">{{ $gemba->formMeta('observation_training_need') }}</textarea>
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
                        <input type="hidden" name="type" value="employees-are-engaged">
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