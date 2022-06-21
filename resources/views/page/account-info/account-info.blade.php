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
                           <div class="col-md-12 mb-3">
                              <div class="form-group">
                                 <label class="frm_label">Description</label>
                                 <div class="input-group">
                                    <textarea class="form-control" name="description">{{ Auth::user()->description }}</textarea>
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
                        <a href="javascript:void(0)" class="cloneTeam" type="button">
                           <i class="fa fa-plus" aria-hidden="true"></i>Add Team</a>
                     </div>
                     <div class="row mb-3">
                        @foreach ($teams as $team)
                           <div class="col-md-3 text-center teamColumn{{ $team->id }}">
                              <div class="prbox">
                                 <img src="{{ $team->image }}" class="uimg" alt="" />
                                 <h6 class="mt-2">{{ $team->name }}</h6>
                                 <a href="javascript:void(0);" id="editUserTeam" data-bs-toggle="modal" data-bs-target="#editTeamModal" data-team-id="{{ $team->id }}">
                                    <i class="fa fa-edit"></i>
                                 </a>
                                 <i class="fa fa-trash" id="deleteUserTeam" data-id="{{ $team->id }}"></i>
                              </div>
                           </div>
                        @endforeach                        
                     </div>                     
                     <form action="{{ route('team.store') }}" method="POST" id="addTeamForm">
                        @csrf
                        <input type="hidden" id="teamFormIndex" value="1">
                        <div class="cloneTeamFormSection p-4 border">
                           <div class="" data-formNo='0'>
                              <div class="form-group ">
                                 <label>Team Name</label>
                                 <input type="text" class="form-control teams_name" name="item[0][teams_name]">
                              </div>
                              <div class="form-group ">
                                 <label>Team Logo</label>
                                 <input type="file" class="form-control teams_logo" name="item[0][teams_logo]">
                              </div>
                              <div class="form-group ">
                                 <label>How many people you want to give access? ( up to 5, for free, with adverts )</label>
                                 <input type="text" class="form-control advert_members membersCount0" id="advertMembers0" name="item[0][advert_members]" placeholder="" value="" data-inc='0'> 
                              </div>
                              <div class="form-group addEmailFieldMain0">
                                 <div class="emailFieldSec"> 
                                    <label>Email address</label>
                                    <div class="addEmailField teamEmail show-remove-btn"> 
                                       <input type="email" class="form-control teams_email teamsEmail0" name="item[0][teams_email][]">
                                       <a href="javascript:void(0)" class="email-repeat-btn cloneEmailField" onclick="cloneEmailFields(0);"> 
                                          <i class="fa fa-plus" aria-hidden="true"></i>
                                       </a>
                                    </div>
                                 </div>
                              </div>                                            
                              
                           </div>
                        </div>                                        
                        <div class="text-center pt-4">
                           <a href="javascript:void(0)" class="cloneTeam" type="button" >
                              <i class="fa fa-plus" aria-hidden="true"></i>Add More Team
                           </a>
                        </div>
                        <div class="col-md-12 profile_form">
                           <div class="form-group justify-content-end d-flex">
                              <button type="submit" class="submit-button w-25" id="addTeamFormBtn">Submit</button>
                           </div>
                        </div>                        
                     </form>
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

   <div class="modal fade" id="editTeamModal" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Team</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body border p-4">
            <form action="" method="post" id="updateTeamForm" enctype="multipart/form-data">
               @csrf
               <div class="edit-user-team">
                  
               </div>
               <div class="col-md-12 profile_form">
                  <div class="form-group justify-content-center d-flex">
                     <button type="submit" class="submit-button w-50" id="updateTeamFormBtn">Update</button>
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
   jQuery(document).on('click','.cloneEmailField',function(){
      // var teamFormIndex = parseInt($('#teamFormIndex').val() - 1);
      var __currentActiveDiv = $(this).closest("div[data-formNo]").attr('data-formNo');
      console.log('index----'+__currentActiveDiv);
      var div_html = '<div class="emailFieldSec removeablee'+__currentActiveDiv+'"> <label>Email address</label> <div class="addEmailField teamEmail show-remove-btn"> <input type="email" class="form-control teams_email teamsEmail'+__currentActiveDiv+'" name="item['+__currentActiveDiv+'][teams_email][]"> <a href="javascript:void(0)" class="email-repeat-btn removeEmailField"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </div> </div>'; 
      jQuery('.addEmailFieldMain'+__currentActiveDiv).slideDown('slow').append(div_html);
   });

   jQuery(document).on('click','.removeEmailField',function(){
      jQuery(this).parent().parent().remove();
   });

   jQuery(document).on('click','.cloneTeam',function(){
      var teamFormIndex = parseInt($('#teamFormIndex').val());
      var div_html = '<hr><div class="mt-4" data-formNo="'+teamFormIndex+'"><div class="form-group "> <label>Team Name</label> <input type="text" class="form-control teams_name" name="item['+teamFormIndex+'][teams_name]"> </div> <div class="form-group "> <label>Team Logo</label> <input type="file" class="form-control teams_logo" name="item['+teamFormIndex+'][teams_logo]"> </div> <div class="form-group "> <label>How many people you want to give access? ( up to 5, for free, with adverts )</label> <input type="text" class="form-control advert_members membersCount'+teamFormIndex+'" id="advertMembers'+teamFormIndex+'" name="item['+teamFormIndex+'][advert_members]" data-inc="'+teamFormIndex+'"> </div> <div class="form-group addEmailFieldMain'+teamFormIndex+'"> <label>New email address</label> <div class="addEmailFieldMain"> <div class="addEmailField teamEmail show-remove-btn"> <input type="email" class="form-control teams_email teamsEmail'+teamFormIndex+'" name="item['+teamFormIndex+'][teams_email][]"> <a href="javascript:void(0)" class="email-repeat-btn cloneEmailField" onclick="cloneEmailFields('+teamFormIndex+');"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div> </div> </div></div>'; 
      $('#teamFormIndex').val( teamFormIndex + 1 );
      jQuery(".cloneTeamFormSection").slideDown('slow').append(div_html);
   });

   // Edit Team 
   jQuery(document).on('click','.appendMemberEmail',function(){
      var members = $('#advertTeamMember').val();
      var emails = $('.memberEmail').length; 
      var div_html = '<div class="row memberEmail"> <div class="col-md-10"> <label class="team-form-label frm_label">Email address</label> <div class="input-group"> <input class="form-control teams_email teamsEmail0" name="team_member_email[]" placeholder="" value=""> </div> </div> <div class="col-md-2 mt-4 pt-2"> <a href="javascript:void(0)" class="email-repeat-btn removeMemberEmail"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </div> </div>';
      if (members <= emails) {
          $('.appendMemberEmail').prop('disabled', true);
          $('.appendMemberEmail').css("cursor", "no-drop");
      } else {
         jQuery(".addMoreMember").slideDown('slow').append(div_html);
          $('.appendMemberEmail').prop("disabled", false);
          $('.appendMemberEmail').css("cursor", "pointer");
      } 
   })

   jQuery(document).on('click','.removeMemberEmail',function(){
      jQuery(this).parent().parent().remove();
   })

   $(document).on('change', '#advertTeamMember', function(){
      var members = $(this).val();
      var emails = $('.memberEmail').length;
      if (members > 5) {
         $('.appendMemberEmail').prop('disabled', true);
         $('.appendMemberEmail').css("cursor", "no-drop");
      } else {
         if (members <= emails) {
            $('.appendMemberEmail').prop('disabled', true);
             $('.appendMemberEmail').css("cursor", "no-drop");
               const diff = (emails - members);
               if (diff == 0) {
               $('.addMoreMember > .row').slice(-1).remove();
               } else {
               $('.addMoreMember > .row').slice(-(diff)).remove();
               }
          } else {
             $('.appendMemberEmail').prop("disabled", false);
             $('.appendMemberEmail').css("cursor", "pointer");
         }         
      }
   });

   function cloneEmailFields(index)
   {
      var advertMembers = $('.membersCount'+index).val();
      var teamEmailFields = $('.teamsEmail'+index).length;
      if (teamEmailFields >= advertMembers) {
          $('.cloneEmailField').prop('disabled', true);
          $('.cloneEmailField').css("cursor", "no-drop");
      } else {
          $('.cloneEmailField').prop("disabled", false);
          $('.cloneEmailField').css("cursor", "pointer");
      }
   }
  </script>
@endsection