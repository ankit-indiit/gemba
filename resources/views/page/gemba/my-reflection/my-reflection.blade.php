@extends('layout.master')
@section('content')	
<!-- breadcrumb Start -->
@include('page.component.bread-crumb', [
    'title' => 'My Reflection',    
]);
<!-- What We Do Start -->
<div class="what-we-area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-intro text-center">
          <h2 class="section-title">My Reflection</h2>
        </div>
      </div>
    </div>
    <div class="what-wpr row">
      <div class="col-lg-6">
        <a href="{{ route('my-reflection-list', 'reflection-as-a-leader') }}">
          <div class="what-box">
            <div class="what-icon">
              <img src="{{ asset('assets/img/what1.png') }}"  alt="Feature">
            </div>
            <div class="what-info">
              <h5>My own reflection as a leader</h5>            
            </div>
          </div>          
        </a>
      </div>
      <div class="col-lg-6">
        <a href="{{ route('my-reflection-list', 'reflect-on-employee') }}">
          <div class="what-box">
            <div class="what-icon">
              <img src="{{ asset('assets/img/what2.png') }}"  alt="Feature">
            </div>
            <div class="what-info">
              <h5>Reflect on employee/team</h5>            
            </div>
          </div>          
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
