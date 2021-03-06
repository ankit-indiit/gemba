@extends('layout.master')
@section('content')
@include('page.component.bread-crumb', ['title' => 'Develop High performance teams'])
<section class="develope-section section-gap">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1 mb-5">
            <div class="section-intro text-center">
               <h2 class="section-title">Great leaders spend 5+ hours a week at Gemba</h2>
            </div>
         </div>
         <div class="col-lg-10 offset-lg-1 mt-3">
            <div class="row">
               <div class="col-md-6">
                  <div class="feature-box">
                     <div class="fbox-icon">
                        <div class="fbox-img">
                           <img src="{{ asset('assets/img/safty-icon.png') }}">
                        </div>
                        
                     </div>
                     <div class="fbox-content">
                        <h3>Employees are safe</h3>
                        <p>Focus: Safety observations</p>
                        <a href="{{ route('gemba.show', 'hsse-leader-led') }}"  class="get-started-btn what-btn">Get Started</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="feature-box">
                     <div class="fbox-icon">
                        <div class="fbox-img">
                           <img src="{{ asset('assets/img/vision-icon.png') }}">
                        </div>
                        
                     </div>
                     <div class="fbox-content">
                        <h3>Company vision, mission and direction</h3>
                        <p>Purpose: Employees are aware and value company´s direction</p>
                        <a href="{{ route('gemba.show', 'vision-and-mission') }}"  class="get-started-btn what-btn">Get Started</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="feature-box">
                     <div class="fbox-icon">
                        <div class="fbox-img">
                           <img src="{{ asset('assets/img/process-icon.png') }}">
                        </div>
                        
                     </div>
                     <div class="fbox-content">
                        <h3>Processes are standard</h3>
                        <p>Focus: Documented and standardized processes</p>
                        <a href="{{ route('gemba.show', 'processes-are-standard') }}"  class="get-started-btn what-btn">Get Started</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="feature-box">
                     <div class="fbox-icon">
                        <div class="fbox-img">
                           <img src="{{ asset('assets/img/happy-icon.png') }}">
                        </div>
                        
                     </div>
                     <div class="fbox-content">
                        <h3>Employees are engaged and happy at work</h3>
                        <p>Focus: People´s morale</p>
                        <a href="{{ route('gemba.show', 'employees-are-engaged') }}"  class="get-started-btn what-btn">Get Started</a>
                     </div>
                  </div>
               </div>
               
            </div>
         </div>
         
         
      </div>
   </div>
</section>
@endsection
