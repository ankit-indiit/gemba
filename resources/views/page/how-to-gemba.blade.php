@extends('layout.master')
@section('content')	
@include('page.component.bread-crumb', ['title' => 'How to do a Gemba?'])
<section class="how-to-section">
   <div class="container">
      <div class="row">
         <div class="col-lg-12">
             <div class="section-intro text-left">
                  <h2 class="section-title">How to do a Gemba?</h2>
                   <p>The Gemba Walks have to take place where the work is being
                     done. The primary purpose is to observe behaviors. Focus
                     on process -adoption, utilization and proficiency. The right
                     questions are imperative, as welL. It is important to ask them
                     following this format - what, why, what if, and why not.</p>
                     <ul>
                        <li><i class="fa fa-check-circle"></i> Inform the person/department before your visit.</li>
                        <li><i class="fa fa-check-circle"></i> Go see, introduce yourself, show respect.</li>
                        <li><i class="fa fa-check-circle"></i> Do not make an accent on what to change or what
                           to improve - just make a note and take action</li>
                        <li><i class="fa fa-check-circle"></i> If chance, walk-in pairs/teams. It can be more effective if the
                           walk involves persons from different departments.</li>
                        <li><i class="fa fa-check-circle"></i> Follow-up your learnings and needed actions with employees.</li>
                        <li><i class="fa fa-check-circle"></i> Return to Gemba and observe the changes and achieved results.</li>
                        <li><i class="fa fa-check-circle"></i> Any Kaizen ideas? Just plan and accomplish.</li>
                     </ul>
                </div>
          
         </div>
         <div class="how-to-image-section text-center mt-4">
            <img src="{{ asset('assets/img/info-img.png') }}" class="img-fluid" >
         </div>
      </div>
   </div>
</section>

@endsection
