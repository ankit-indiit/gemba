@extends('layout.master')
@section('content')  
@include('page.component.bread-crumb', [
    'title' => 'Sharing Company´s Vision, Mission and Direction Details',
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
                            {{ dateFormat($gemba->formMeta('date')) }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Time 
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('time') }}
                        </div>
                    </div>                   
                    <div class="gembas-details-item">
                        Time at Gemba 
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('time_at_gemba') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Team visited
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('team_visited') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Gemba located in 
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('gemba_located_in') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Can the team share what company´s vision, mission and/or values are?
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('team_share_company_vission_mission') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Does the team know what is the company´s scorecard?
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('team_know_company_scorecard') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Can the team translate the company´s objectives to their team´s leading indicators? 
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('team_translate_company_indicator') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Are they visible in their area and up-to-date?
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('visible_their_area') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        Can the team describe how their jobs impact these indicators?
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('job_impect_these_indicators') }}
                        </div>
                    </div>
                    <div class="gembas-details-item">
                        How does my job´s output impact these indicators?
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('job_output_impact_indicators') }}
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
                    <div class="gembas-details-item  w-100">
                        Improvements agreed with the team
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('improvements_agreed_with_team') }}
                        </div>
                    </div>
                    <div class="gembas-details-item w-100">
                        Responsible for implementing the improvements and date to make them
                        <div class="gemba-details-value">
                            {{ $gemba->formMeta('responsible_implementing_improvement') }}
                            <span>
                                {{ dateFormat($gemba->formMeta('responsible_implementing_improvement_date')) }}
                            </span>
                        </div>
                    </div>                    
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection