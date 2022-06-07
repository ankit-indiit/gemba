@extends('layout.master')
@section('content')	
<!-- Banner Start -->
<section class="login-page">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-6">
            <div class="contact-form-box">
               <h3>Registration</h3>
               <form method="POST" action="#" class="axil-contact-form">
                  <div class="form-group">
                     <label>Your Name</label>
                     <input type="text" class="form-control" name="contact-name">
                  </div>
                  <div class="form-group ">
                     <label>Your Email</label>
                     <div class="emailField">
                        <input type="email" class="form-control" name="contact-email"><i class="fa fa-info-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tooltip on bottom"></i>
                     </div>
                  </div>
                  <div class="form-group ">
                     <label>Your Profile Picture</label>
                     <input type="file" class="form-control" name="">
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
                        <div class="form-team-btm">
                           <div class="accordion-body">
                              <div class="form-group ">
                                 <label>Team's Name</label>
                                 <input type="text" class="form-control" name="">
                              </div>
                              <div class="form-group ">
                                 <label>Team's Logo</label>
                                 <input type="file" class="form-control" name="">
                              </div>
                              <div class="form-group ">
                                 <label>How many people you want to give access? ( up to 5, for free, with adverts )</label>
                                 <input type="number" class="form-control" name="">
                              </div>
                              <div class="form-group ">
                                 <label>New email address</label>
                                 <div class="addEmailFieldMain">
                                    <div class="addEmailField">
                                       <input type="email" class="form-control" name="contact-email">
                                       <a  href="javascript:void(0)"  class="email-repeat-btn clone-email-field"><i class="fa fa-plus" aria-hidden="true"></i></a>
                                       <a  href="javascript:void(0)" class="email-repeat-btn remove-email-field"><i class="fa fa-minus" aria-hidden="true"></i></a>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div>
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
                     <button type="submit" class="submit-button" name="submit-btn">Submit</button>
                  </div>
                  <div class="bottom-box">
                     <div class="text">Already registed? <a href="login.php" class="signup">login here</a></div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Banner End -->
@endsection
