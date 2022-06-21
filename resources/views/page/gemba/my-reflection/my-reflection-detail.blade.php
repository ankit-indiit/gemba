@extends('layout.master')
@section('content')  
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', [
  'title' => $gemba->form_name,
  'previous_page' => route('my-reflection-list', $title),
    'page_title' => 'My Reflection List'
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
                              <span class="text-gray">{{ Auth::user()->description }}</span>
                           </div>
                        </div>
                     </div>                     
                  </div>
               </div>               
               <div class="gembas-details">                                                    
                  <div class="gembas-details-item w-100">
                     <div class="row pt-4">
                        <div class="col-md-12">
                          <h3>My own reflection as a leader</h3>
                          @include('page.gemba.component.view-'.$title.' ', compact('gemba'))
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