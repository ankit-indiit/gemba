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
                        <div class="row">
                            <div class="col-md-8">
                                <div class="update-profile d-flex">
                                    <img src="{{ Auth::user()->image }}" alt="">
                                <div class="ms-4 mt-lg-3">
                                    <h3 class="mb-0">{{ Auth::user()->name }}</h3>
                                    <span class="text-gray">Lorem Ipsum is simply dummy text </span>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-4 total-points-div">
                                <h3 class="mb-0">Total points this month</h3>
                                <div class="d-flex align-items-center">
                                   <a href="javascript:void(0);" class="btn-badge">63 </a> <i class="fa fa-info-circle ms-2" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                                </div>
                            </div>
                        </div>
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
                            Function visited
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('function_visited') }}
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
                       <div class="gembas-details-item gembas-question-details w-100">
                        Questions
                            @foreach (unserialize($gemba->formMeta('questions')) as $question)
                                @if (!empty($question['type']) && !empty($question['label']))
                                    <div class="Questions-lists">
                                        <ul>
                                            <li> <label>Type of question</label>
                                                <span>{{ $question['type'] }}</span>
                                            </li>
                                            <li> <label>Question label:</label>
                                                <span>{{ $question['label'] }}</span>
                                            </li>
                                            <li> <label>List of options</label>
                                                <span>{{ $question['list_option'] }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            @endforeach                           
                        </div>
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