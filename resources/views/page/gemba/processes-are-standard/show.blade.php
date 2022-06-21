@extends('layout.master')
@section('content')  
@include('page.component.bread-crumb', [
    'title' => 'Processes Are Standard Details',
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
                            Time 
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('time') }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Team Name
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('team_name') }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Time spent in Gemba(minutes)
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('time_at_gemba') }}
                            </div>
                        </div>                       
                        <div class="gembas-details-item">
                            Gemba located in
                            <div class="gemba-details-value">
                                {{ $gemba->formMeta('gemba_located_in') }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Documents available?
                            <div class="gemba-details-value">
                                @foreach (unserialize($gemba->formMeta('document_available')) as $option)
                                    <span>{{ $option }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Updated documents in less than 1 year?
                            <div class="gemba-details-value">
                                {{ ucfirst($gemba->formMeta('update_document')) }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Does the procedure have a skill matrix associated? 
                            <div class="gemba-details-value">
                                {{ ucfirst($gemba->formMeta('have_skill_matrix_associated')) }}
                            </div>
                        </div>
                        <div class="gembas-details-item">
                            Are all the steps of the procedure followed?
                            <div class="gemba-details-value">
                                {{ ucfirst($gemba->formMeta('all_steps_procedure')) }}
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
                                    {{ date("d F Y", strtotime($gemba->formMeta('responsible_implementing_improvement_date'))) }}
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