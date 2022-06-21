@extends('layout.master')
@section('content')  
@include('page.component.bread-crumb', [
    'title' => 'Employees Are Engaged Details',
    'previous_page' => route('my-gemba.index'),
    'page_title' => 'My Gembas'
])
<section class="my-gembas-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="gembas-list-card">
                    <div class="gembas-list-profile">
                        {{-- Gemba Ponts --}} 
                        @include('page.gemba.component.gemba-points-bar')
                    </div>               
                    <div class="gembas-details">
                        <div class="gembas-details-item">
                            Date 
                            <div class="gemba-details-value">
                                {{ date("d F Y", strtotime($gemba->formMeta('date'))) }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Hour 
                            <div class="gemba-details-value">
                                {{ date("H:i", strtotime($gemba->formMeta('hour'))) }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Participating Team
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('participating_team') }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Duration at Gemba (minutes)
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('duration_at_gemba') }}
                            </div>
                        </div>                        
                        <div class="gembas-details-item">
                            Gemba located in
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('gemba_located_in') }}
                            </div>
                        </div>
                        <div class="gembas-details-item w-100">
                            What question from the “Employee Engagement Survey" questionnaire are you going to discuss with the team?
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('employee_engagemant_survey') }}
                            </div>
                        </div>
                        {{-- Question Section  --}}
                        @include('page.gemba.component.show-question-section', ['gemba' => $gemba])
                        <div class="gembas-details-item w-100">
                            Observations and/or Training Needs
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('observation_training_need') }}
                            </div>
                        </div>
                        <div class="gembas-details-item w-100">
                            Improvements agreed with the team: 
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('improvements_agreed_with_team') }}
                            </div>
                        </div>
                        <div class="gembas-details-item w-100">
                            Responsible for implementing the improvements and date to make them
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('responsible_implementing_improvement') }}
                                <span>
                                    {{ $gemba->formMeta('responsible_implementing_improvement_date') }}
                                </span>
                                <div class="improvement-upload">
                                    <i class="fa fa-file" aria-hidden="true"></i> <a href="#">voluptate-velit</a>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection