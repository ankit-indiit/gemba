@extends('layout.master')
@section('content')	
@include('page.component.bread-crumb', [
   'title' => 'Leader at Gemba. Balance your leadership roles'
])

<section class="develope-section section-gap leaderbox">
   <div class="container">
      <div class="row">
         <div class="col-lg-10 offset-lg-1 mt-3">
            <div class="row">
               <div class="col-md-6">
                  <div class="feature-box">
                     <div class="fbox-icon">
                        <div class="fbox-img">
                           <img src="{{ asset('assets/img/dev.png') }}" width="35" />
                        </div>
                     </div>
                     <div class="fbox-content">
                        <h3>Develop a high-performance team</h3>
                        <p>Develop the dream team capable to move beyond company goals</p>
                        <a href="{{ route('gemba.index') }}"  class="get-started-btn what-btn">Get Started</a>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="feature-box">
                     <div class="fbox-icon">
                        <div class="fbox-img">
                           <img src="{{ asset('assets/img/coach.png') }}" width="35" />
                        </div>
                     </div>
                     <div class="fbox-content">
                        <h3>Coach on Continuous improvement tools</h3>
                        <p>Coach on Lean tools</p>
                        <a href="javascript: void(0)"  class="get-started-btn what-btn">Get Started</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center mt-4">
         <div class="col-md-8">
           <div class="section-intro text-center">
             <h2 class="section-title">My leadership habit journey</h2>
           </div>
         </div>
      </div>
      <div class="row mt-4">
         <div class="col-md-4">
            <a href="{{ route('my-gemba.index') }}">
               <div class="what-box">
                  <div class="what-info m-0">
                     <h5 class="text-center">My Gembas</h5>
                  </div>
               </div>
            </a>

            <a href="javascript: void(0)">
               <div class="what-box">
                  <div class="what-info m-0">
                     <h5 class="text-center">My personal ideas +</h5>
                  </div>
               </div>
            </a>
         </div>

         <div class="col-md-8 leaderright">
            <div class="row">
               <div class="col-md-6">
                  <div class="what-box">
                     <div class="what-info m-0">
                        <h5 class="text-center">Planning my routine</h5>
                        <p>Quarterly</p>
                        <p>Monthly</p>
                     </div>
                  </div>
               </div>

               <div class="col-md-6">
                  <div class="what-box">
                     <div class="what-info m-0">
                        <h5 class="text-center">My leadership Self-reflection</h5>
                        <p>Me and my mission</p>
                        <p>My quarterly reflections</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
