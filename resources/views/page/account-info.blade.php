@extends('layout.master')
@section('content')	
@include('page.component.bread-crumb', [
    'title' => 'Account Information',
])
<section class="develope-section section-gap leaderbox">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <div class=" profile_user">
               <div class="card">
                  <div class="text-center card-body">
                     <div class="user-image ">
                        <img class="rounded-circle img-thumbnail userProfile" src="{{ Auth::user()->image }}">
                        <label for="user-img">Upload Image</label>
                        <form id="uploadProfileImage">
                           <input type="hidden" name="type" value="profile_image">
                           <input id="user-img" name="user_profile_image" style="display:none" type="file">
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-md-8">
            <div class="accbox">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Profile</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Teams</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Change Password</button>
                  </li>
               </ul>
               <div class="tab-content mt-4" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                     <div class="profile_form">
                        <h4 class="mt-0 mb-4">Basic Info</h4>
                     </div>
                     <form action="{{ route('update-profile') }}" method="POST" id="updateProfileForm">
                        @csrf
                        <div class="row profile_form">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="frm_label">Name</label>
                                 <div class="input-group">
                                    <input class="form-control user-name" name="name" placeholder="Enter Name" value="{{ Auth::user()->name }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label class="frm_label">Email</label>
                                 <div class="input-group">
                                    <input class="form-control" placeholder="Enter Email" value="{{ Auth::user()->email }}" disabled="">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <input type="hidden" name="type" value="name">
                              <div class="form-group justify-content-end d-flex">
                                 <button type="submit" class="submit-button w-25" id="updateProfileFormBtn">Submit</button>
                              </div>
                           </div>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <div class="profile_form mt-4 d-flex align-items-center justify-content-between">
                        <h4 class="mt-0 mb-4">My Teams </h4>
                        <a href="javascript:void(0)" class="addTeam" type="button">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Add Team
                        </a>
                     </div>
                     <div class="row mb-3">
                        @foreach ($teams as $team)
                           <div class="col-md-3 text-center teamColumn{{ $team->id }}">
                              <div class="prbox">
                                 <img src="{{ $team->image }}" class="uimg" alt="" />
                                 <h6 class="mt-2">{{ $team->name }}</h6>
                                 <i class="fa fa-trash" id="deleteUserTeam" data-id="{{ $team->id }}"></i>
                              </div>
                           </div>
                        @endforeach
                     </div>
                     <div class="row profile_form">
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="frm_label">Team's Name</label>
                              <div class="input-group">
                                 <input class="form-control" placeholder="" value="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-6 mb-3">
                           <div class="form-group">
                              <label class="frm_label">New email address</label>
                              <div class="input-group">
                                 <input class="form-control" placeholder="" value="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12 mb-3">
                           <div class="form-group">
                              <label class="frm_label">How many people you want to give access? ( up to 5, for free, with adverts )</label>
                              <div class="input-group">
                                 <input class="form-control" placeholder="" value="">
                              </div>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div class="form-group">
                              <label class="frm_label">Upload Image</label>
                              <div class="upload__box">
                                 <div class="upload__btn-box">
                                    <label class="upload__btn">
                                       <i class="fa fa-upload" aria-hidden="true"></i>
                                       <p class="mb-0">Upload images</p>
                                       <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                                    </label>
                                 </div>
                                 <div class="upload__img-wrap"></div>
                              </div>
                            
                           </div>
                        </div>
                     </div>
                    
                     <div class="append_divs">
                        <div class="form-team-btm p-4">
                           <div class="row profile_form">
                              <div class="col-md-6 mb-3">
                                 <div class="form-group">
                                    <label class="frm_label">Team's Name</label>
                                    <div class="input-group">
                                       <input class="form-control" placeholder="" value="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 mb-3">
                                 <div class="form-group">
                                    <label class="frm_label">New email address</label>
                                    <div class="input-group">
                                       <input class="form-control" placeholder="" value="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12 mb-3">
                                 <div class="form-group">
                                    <label class="frm_label">How many people you want to give access? ( up to 5, for free, with adverts )</label>
                                    <div class="input-group">
                                       <input class="form-control" placeholder="" value="">
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <div class="upload__box">
                                       <div class="upload__btn-box">
                                          <label class="upload__btn">
                                             <i class="fa fa-upload" aria-hidden="true"></i>
                                             <p class="mb-0">Upload images</p>
                                             <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                                          </label>
                                       </div>
                                       <div class="upload__img-wrap"></div>
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

                     <div class="col-md-12 profile_form">
                        <div class="form-group justify-content-end d-flex">
                           <button type="submit" class="submit-button w-25" name="submit-btn">Submit</button>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                     <div class="profile_form">
                        <h4 class="mt-0 mb-4">Change Password</h4>
                     </div>
                     <form action="{{ route('update-profile') }}" method="POST" id="updatePasswordForm">
                        @csrf
                        <div class="row profile_form">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label class="frm_label">Current Password</label>
                                 <div class="input-group">
                                    <input class="form-control" type="password" name="current_password" placeholder="Enter Current Password" value="{{ Auth::user()->paddword }}">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <div class="form-group">
                                 <label class="frm_label">New Password</label>
                                 <div class="input-group">
                                    <input class="form-control" type="password" name="new_password" placeholder="New Current Password" id="newPassword">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label class="frm_label">Confirm New Password</label>
                                 <div class="input-group">
                                    <input class="form-control" type="password" name="confirm_password" placeholder="Enter Current Password">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <input type="hidden" name="type" value="password">
                              <div class="form-group justify-content-end d-flex">
                                 <button type="submit" class="submit-button w-25" id="updatePasswordFormBtn">Update</button>
                              </div>
                           </div>
                        </div>                        
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
