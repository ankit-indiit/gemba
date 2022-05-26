@extends('layout.master')
@section('content')	
<section class="banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-10 offset-lg-1">
        <div class="banner-text">
          <h3>Welcome User #1234568</h3>
          <h1>Go to Gemba with a purpose</h1>
          <p>This app nas been designed to be your main tool to assist you and your team in an inspiring development journey to develop fully engaged, high performance employees and teams.</p>
        </div>
      </div>
    </div>
    
  </div>
</section>
<!-- Banner End -->
<!-- What We Do Start -->
<div class="what-we-area">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-intro text-center">
          <h2 class="section-title">What We Do</h2>
          <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque.</p>
        </div>
      </div>
    </div>
    <div class="what-wpr row">
      <div class="col-lg-6">
        <div class="what-box">
          <div class="what-icon">
            <img src="{{ asset('assets/img/what1.png') }}"  alt="Feature">
          </div>
          <div class="what-info">
            <h5>Leader at Gemba</h5>
            <p>
              Balance Your Leadership Roles
            </p>
            <a href="{{ route('leader-at-gemba') }}" class="what-btn">Explore More</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="what-box">
          <div class="what-icon">
            <img src="{{ asset('assets/img/what2.png') }}"  alt="Feature">
          </div>
          <div class="what-info">
            <h5>Employee at Gemba</h5>
            <p>
              Develop and Improve Standards
            </p>
            <a href="#" class="what-btn">Explore More</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- What We Do End -->
<!-- Services Start -->
<div class="lbl-services">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="section-intro text-center">
          <h2 class="section-title">You are 30 points from your next reward!</h2>
        </div>
      </div>
    </div>
    <div class="lbl_cards row">
      <div class="col-lg-3 col-sm-6">
        <div class="card_single">
          <div class="card-icon">
            <div class="card-img">
              <img src="{{ asset('assets/img/s1.png') }}"  alt="Feature">
            </div>
          </div>
          <div class="card-text">
            <h3>My Statistics</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card_single">
          <div class="card-icon">
            <div class="card-img">
              <img src="{{ asset('assets/img/s2.png') }}"  alt="Feature">
            </div>
          </div>
          <div class="card-text">
            <h3>Global Ranking</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card_single">
          <div class="card-icon">
            <div class="card-img">
              <img src="{{ asset('assets/img/s3.png') }}"  alt="Feature">
            </div>
          </div>
          <div class="card-text">
            <h3>My Action List</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card_single">
          <div class="card-icon">
            <div class="card-img">
              <img src="{{ asset('assets/img/s4.png') }}"  alt="Feature">
            </div>
          </div>
          <div class="card-text">
            <h3>My Rewards</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
<!-- Services End -->
<!-- About Start -->
<div class="lbl-about">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 pe-xl-5">
        <div class="section-intro text-left pe-xl-5">
          <h5>About Us</h5>
          <h2 class="section-title">How To Do a Gemba ?</h2>
          <p>Genba (h, also romanized as gemba) is a Japanese
            term meaning "the actual place". Japanese detectives
            call the crime scene genba, and Japanese TV reporters
            may refer to themselves as reporting from genba. In
            business, genba refers to the place where value is
          created; in manufacturing the genba is the factory floor.</p>
          <a class="btn-action" href="#">Know More</a>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="f-image">
          <img src="{{ asset('assets/img/about-img.jpeg') }}">
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
