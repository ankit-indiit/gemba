@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', [
  'title' => 'HSSE Leader Details',
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
                     <div class="gemba-details-value">{{ dateFormat($gemba->formMeta('date')) }}</div>
                  </div>
                  <div class="gembas-details-item">
                     Hour 
                     <div class="gemba-details-value">{{ $gemba->formMeta('time') }}</div>
                  </div>
                  <div class="gembas-details-item">
                     Team Name 
                     <div class="gemba-details-value">{{ $gemba->formMeta('team_name') }}</div>
                  </div>
                  <div class="gembas-details-item">
                     Time at Gemba 
                     <div class="gemba-details-value">{{ $gemba->formMeta('time_at_gemba') }} min</div>
                  </div>
                  <div class="gembas-details-item">
                     Function observed 
                     <div class="gemba-details-value">{{ $gemba->formMeta('function_observed') }}</div>
                  </div>
                  <div class="gembas-details-item">
                     Gemba located in 
                     <div class="gemba-details-value">{{ $gemba->formMeta('gemba_located_in') }}</div>
                  </div>
                  <div class="gembas-details-item">
                     Can the team list their job risks? 
                     <div class="gemba-details-value">{{ $gemba->formMeta('team_job_risk') }}</div>
                  </div>
                  <div class="gembas-details-item">
                     Have you and the team identified any hazards in the workplace?  
                     <div class="gemba-details-value">{{ $gemba->formMeta('team_identified_hazards') }}</div>
                  </div>
                   <div class="gembas-details-item gembas-question-details  w-100">
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
                  <div class="gembas-details-item" >
                    Hazards identified with the team in their workplace: 
                    <div class="gemba-details-value">
                      @foreach (unserialize($gemba->formMeta('hazards_identified_option')) as $option)
                        <span>{{ $option }}</span>
                      @endforeach
                    </div>
                  </div>
                    <div class="gembas-details-item">
                     Type any other hazard found at their workplace: 
                     <div class="gemba-details-value">{{ $gemba->formMeta('other_hazard_at_workplace') }}</div>
                  </div>
                    <div class="gembas-details-item w-100">
                    Observations and/or Training Needs
                     <div class="gemba-details-value">{{ $gemba->formMeta('observation_training_need') }}</div>
                  </div>
                    <div class="gembas-details-item w-100">
                    Improvements agreed with the team: 
                     <div class="gemba-details-value">{{ $gemba->formMeta('improvements_agreed_with_team') }}</div>
                  </div>
                    <div class="gembas-details-item w-100">
                     Responsible for implementing the improvements and date to make them
                     <div class="gemba-details-value">
                        {{ $gemba->formMeta('responsible_implementing_improvement') }} 
                        <span>{{ dateFormat($gemba->formMeta('responsible_implementing_improvement_date')) }}</span>
                      </div>
                  </div>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection