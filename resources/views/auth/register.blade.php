@extends('layout.master')
@section('content') 
<section class="login-page">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="contact-form-box">
               <h3>Registration</h3>
               <form method="POST" action="{{ route('signup') }}" id="registerForm" class="axil-contact-form" enctype="multipart/form-data">
                    @csrf
                  <div class="form-group">
                     <label>Your Name</label>
                     <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                  </div>
                  <div class="form-group ">
                     <label>Your Email</label>
                     <div class="emailField">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                        <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>                       
                     </div>
                  </div>

                  <div class="form-group ">
                     <label>Your Password</label>
                     <div class="emailField">
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                        <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                         @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  </div>
                  <div class="form-group ">
                     <label>Your Confirm Password</label>
                     <div class="emailField">
                        <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                        <i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label>Your Profile Picture</label>
                     <input type="file" class="form-control" name="image">
                  </div>
                  <div class="form-group form-team-main">
                     <div class="form-team-tp">
                        <label>Setting up your team(s)</label>
                        <a href="javascript:void(0)" class="addTeam" type="button">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add Team
                        </a>
                     </div>
                     <div class="append_divs">
                      <input type="hidden" id="secNum" value="1">
                        <div class="form-team-btm frm-current-act-0" data-formNo='0'>
                           <div class="accordion-body">
                              <div class="form-group ">
                                 <label>Team's Name</label>
                                 <input type="text" class="form-control teams_name" name="item[0][teams_name]">
                              </div>
                              <div class="form-group ">
                                 <label>Team's Logo</label>
                                 <input type="file" class="form-control teams_logo" name="item[0][teams_logo]" value="">
                              </div>
                              <div class="form-group ">
                                 <label>How many people you want to give access? ( up to 5, for free, with adverts )</label>
                                 <input type="text" data-inc='0' class="form-control advert_members" id="advertMembers0" name="item[0][advert_members]">
                              </div>
                              <div class="form-group">
                                 <label>New email address</label>
                                 <div class="addEmailFieldMain addEmailFieldMain0">
                                    <div class="addEmailField teamEmail">
                                        <input type="hidden" id="teamMailIndex" value="0">
                                        <input type="email" class="form-control teams_email" name="item[0][teams_email][]">
                                        <a href="javascript:void(0)" class="email-repeat-btn clone-email-field" onclick="cloneEmailField(0);">
                                          <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>                     
                     <div class="addMoreTeamDiv">
                        <a href="javascript:void(0)" class="addMoreTeam" type="button" >
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add More Team
                        </a>
                     </div>
                  </div>
                  <div class="bottom-box mb-3">
                     <div class="text text-start">Premium license, please  <a href="#" class="signup">check here.</a></div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="submit-button" id="registerFormBtn" name="submit-btn">Submit</button>
                  </div>
                  <div class="bottom-box">
                    <div class="text">Already registed?
                      <a href="{{ route('login') }}" class="signup">login here</a>
                    </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('customGembaScripts')
  <script type="text/javascript">
    jQuery(document).on('click','.clone-email-field',function(){
      var teamMailIndex = parseInt($('#teamMailIndex').val());  
      var __currentActiveDiv = $(this).closest("div[data-formNo]").attr('data-formNo');
      var div_html = '<div class="addEmailField teamEmail removeablee'+__currentActiveDiv+'"><input type="email" class="form-control teams_email" name="item['+__currentActiveDiv+'][teams_email][]"> <a href="javascript:void(0)" class="email-repeat-btn remove-email-field"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </div>'; 
      jQuery(".addEmailFieldMain"+parseInt(__currentActiveDiv)).append(div_html);
      jQuery(".addEmailField").addClass('show-remove-btn');
    })

    jQuery(document).on('click','.remove-email-field',function(){
      jQuery(this).parent().remove();
    })

    jQuery(document).on('click','.addMoreTeam',function(){
      var secNum = parseInt($('#secNum').val());
      var teamMailIndex = parseInt($('#teamMailIndex').val());
      var div_html = '<div class="form-team-btm frm-current-act-'+secNum+'"  data-formNo="'+secNum+'" style="display: block;"> <div class="accordion-body"> <div class="form-group "> <label>Team Name</label> <input type="text" class="form-control teams_name" name="item['+secNum+'][teams_name]"> </div> <div class="form-group "> <label>Team Logo</label> <input type="file" class="form-control teams_logo" name="item['+secNum+'][teams_logo]"> </div> <div class="form-group "> <label>How many people you want to give access? ( up to 5, for free, with adverts )</label> <input type="text" data-inc="'+secNum+'" class="form-control advert_members" id="advertMembers'+secNum+'" name="item['+secNum+'][advert_members]" aria-invalid="false"> </div> <div class="form-group "> <label>New email address</label> <div class="addEmailFieldMain addEmailFieldMain'+secNum+'"> <div class="addEmailField teamEmail show-remove-btn"> <input type="email" class="form-control teams_email" name="item['+secNum+'][teams_email][]"> <a href="javascript:void(0)" class="email-repeat-btn clone-email-field" style="cursor: no-drop;" onclick="cloneEmailField('+secNum+');"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div></div> </div> </div> </div>'; 
      jQuery(".append_divs").slideDown('slow').append(div_html);
      $('#secNum').val( secNum + 1 );
      $('#teamMailIndex').val( teamMailIndex + 1 );
      $('#registerFormBtn').trigger('click');
    });

    $(".addTeam").click(function(){
      $(".form-team-btm").toggle(500);
       $(".addMoreTeamDiv").toggleClass('addMoreTeamShow');
       $('#registerFormBtn').trigger('click');
    });
  </script>
@endsection





{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
