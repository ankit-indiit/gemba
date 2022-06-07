@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', ['title' => 'HSSE Leader Led', 'previous_page' => route('gemba.index'), 'page_title' => 'Develop Employee/ Team'])
<section class="add-gemba-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 mb-4">
                <div class="section-intro text-center">
                    <h2 class="section-title"><strong>Purpose:</strong> Coach the importance of awareness of risks of accident in the workplace</h2>
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
                                <label for="" class="form-label">Time at Gemba (minutes)</label>
                                <input type="text" class="form-control" name="time_at_gemba" id="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">Function observed</label>
                                <input type="text" class="form-control" name="function_observed" id="">
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
                                <label for="" class="form-label w-100 mb-3">Can the team list their job risks?</label>
                                <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="team_job_risk" id="inlineRadio1" value="yes">
                                   <label class="form-check-label" for="inlineRadio1">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="team_job_risk" id="inlineRadio2" value="no">
                                   <label class="form-check-label" for="inlineRadio2">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="" class="form-label w-100 mb-3">Have you and the team identified any hazards in the workplace?</label>
                                <div class="form-check form-check-inline">
                                   <input class="form-check-input" type="radio" name="team_identified_hazards" id="inlineRadio3" value="yes">
                                   <label class="form-check-label" for="inlineRadio3">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="team_identified_hazards" id="inlineRadio4" value="no">
                                    <label class="form-check-label" for="inlineRadio4">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="" class="form-label">
                                    Select the hazards identified with the team in their workplace:
                                </label>
                                <select data-placeholder="Select...." name="hazards_identified_option[]" multiple class="chosen-select form-control">
                                    @foreach ($hazards as $hazard)
                                        <option value="{{ $hazard->name }}">{{ $hazard->name }}</option>
                                    @endforeach                               
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">   
                                <label for="" class="form-label">Type any other hazard found at their workplace:</label>
                                <input type="text" class="form-control" name="other_hazard_at_workplace" id="">
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
                            <input type="hidden" name="type" value="hsse-leader-led">
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