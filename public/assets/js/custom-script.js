$(document).ready(function(){
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  $('#gembaDatePickker').attr('min',today);
  $('#responsibleImplementingImprovementDate').attr('min',today);
  $('#gembaStartDate').attr('max',today);

  $(document).on('change', '#gembaStartDate', function(){
    $('#gembaEndDate').attr('min', $(this).val());
  });
});

$("#loginForm").validate({
  rules: {        
      email: {
         required: true,
      },
      password: {
         required: true,
      },        
   },
   messages: {
      email: "Please enter your email",
      password: "Please enter your password",                     
   },
  submitHandler: function(form) {
   var serializedData = new FormData(form);
   $("#err_mess").html('');
   $('#loginFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
   $.ajax({
      headers: {
         'X-CSRF-Token': $('input[name="_token"]').val()
      },
      type: 'post',
      url: _baseURL + "/user-login",
      data: serializedData,
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
        toastr.options.timeOut = 4000;
        if (data.status == true) {
          $('#loginFormBtn').html('Save Changes');
          window.location.href = _baseURL+'/';
          toastr.success(data.message);
        } else {
          toastr.error(data.message);
          $('#loginFormBtn').html('Login');
        }        
      }
   });
   return false;
  }
});


function cloneEmailField(index)
{
  var advertMembers = $('#advertMembers'+index).val();
  var teamEmailFields = $('.addEmailFieldMain'+ index +' > .teamEmail').length;
  // console.log(advertMembers);
  // console.log(teamEmailFields);
  if (teamEmailFields >= advertMembers) {
    $('.clone-email-field').prop('disabled', true);
    $('.clone-email-field').css("cursor", "no-drop");
  } else {
    $('.clone-email-field').prop("disabled", false);
    $('.clone-email-field').css("cursor", "pointer");
  }
}

$(document).on('click', '.remove-email-field', function(){
    $('.clone-email-field').prop("disabled", false);
    $('.clone-email-field').css("cursor", "pointer");
});

jQuery.validator.addMethod("advertMembers", function(value, element) {

  var currInc = $(element).data('inc');
  if (value > 5 || value <= 0 || value > '5' || value <= '0') {
    $('#advertMembers'+currInc).val('');
    return false;
  } else {
    var teamEmailFields = $('.removeablee'+currInc).length;

    if (value <= teamEmailFields) {

      const diff = (teamEmailFields - value);
      if (diff == 0) {
        $('.addEmailFieldMain'+currInc+' > .removeablee'+currInc).slice(-1).remove();
      } else {
        $('.addEmailFieldMain'+currInc+' > .removeablee'+currInc).slice(-(diff)).remove();
      }
      console.log(diff);
    }
    return true;
  }
});

$('form#registerForm').on('submit', function(event) {
    $('.teams_name').each(function() {
      $(this).rules("add", 
        {
          required: true,
          messages: {
              required: "Team's Name is required",
        }
      });
    });
    $('.teams_logo').each(function() {
      $(this).rules("add", 
        {
          required: true,
          messages: {
              required: "Team's logo is required",
        }
      });
    });
    $('.advert_members').each(function() {
        $(this).rules("add", 
          {
            required: true,
            number: true,
            advertMembers: true,
            messages: {
                required: "Please choose members",
                number: "Alphabetical value is not allowed",
                advertMembers: "You can enter a value less than or equal to 5",
          }
        });
    });

    $('.teams_email').each(function() {
        $(this).rules("add", 
          {
            required: true,
            messages: {
                required: "Enter team advert members email",                   
          }
        });
    });
});

$("#registerForm").validate({
    rules: {
        name: {
           required: true,
        },
        email: {
           required: true,
        },
        password: {
           required: true,
        },
        password_confirmation: {
           required: true,
           equalTo: '[name="password"]'
        },
        image: {
           required: true,
        },       
     },
     messages: {
        name: "Please enter your name",
        email: "Please enter your email",
        password: "Please enter your password",
        password_confirmation: "Password and confirm password must be match",
        image: "Choose enter your profile picture",                             
     },
    submitHandler: function(form) {
     var serializedData = new FormData(form);
     console.log(serializedData);
     $("#err_mess").html('');
     $('#registerFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
     $.ajax({
        headers: {
           'X-CSRF-Token': $('input[name="_token"]').val()
        },
        type: 'post',
        url: _baseURL + "/signup",
        data: serializedData,
        dataType: 'json',
        processData: false,
        contentType: false,
        cache: false,
        success: function(data) {
          console.log(data);
          $('#registerFormBtn').html('Save Changes');
          toastr.options.timeOut = 4000;
          if (data.status == true) {
            window.location.href = _baseURL+'/account-info';
            toastr.success(data.message);
          } else {
            toastr.error(data.message);
          }        
        }
     });
     return false;
  }
});

$(document).ready(function(){
  $('#user-img').change(function(e) {
    var form = $('#uploadProfileImage')[0];
    var serializedData = new FormData(form);   
    $.ajax({
      headers: {
         'X-CSRF-Token': $('input[name="_token"]').val()
      },
      type: 'post',
      url: _baseURL + "/update-profile",
      data: serializedData,
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,   
      success: function(data) {
        console.log(data);
        toastr.options.timeOut = 4000;
        if (data.status == true) {
          $('.userProfile').attr('src', data.data);
          toastr.success(data.message);
        } else {
          toastr.error(data.message);
        }        
      }
    });
  });
})

$("#updateProfileForm").validate({
  rules: {        
      name: {
         required: true,
      },    
   },
   messages: {
      name: "Name can not be blank!",      
   },
  submitHandler: function(form) {
   var serializedData = new FormData(form);
   $("#err_mess").html('');
   $('#updateProfileFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
   $.ajax({
      headers: {
         'X-CSRF-Token': $('input[name="_token"]').val()
      },
      type: 'post',
      url: _baseURL + "/update-profile",
      data: serializedData,
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
        toastr.options.timeOut = 4000;
        if (data.status == true) {
          $('#updateProfileFormBtn').html('Save Changes');
          $('.user-name').val(data.data);
          toastr.success(data.message);
        } else {
          toastr.error(data.message);
          $('#updateProfileFormBtn').html('Submit');
        }        
      }
   });
   return false;
  }
});

$("#updatePasswordForm").validate({
  rules: {              
      current_password: {
         required: true,
      },
      new_password: {
         required: true,
         minlength : 5,
      },
      confirm_password: {
         required: true,
         minlength : 5,
         equalTo : "#newPassword"
      },       
   },
   messages: {
      current_password: "Please enter current password!",
      new_password: {
        required: "Please enter new password!",
        minlength: "Password length must be more then 5!",
      },
      confirm_password: {
        required: "Please enter confirm password!",
        equalTo: "New Password and confirm password must be match",
      }
   },
  submitHandler: function(form) {
   var serializedData = new FormData(form);
   $("#err_mess").html('');
   $('#updatePasswordFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
   $.ajax({
      headers: {
         'X-CSRF-Token': $('input[name="_token"]').val()
      },
      type: 'post',
      url: _baseURL + "/update-profile",
      data: serializedData,
      dataType: 'json',
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
        toastr.options.timeOut = 4000;
        if (data.status == true) {
          $('#updatePasswordFormBtn').html('Save Changes');
          $('.user-name').val(data.name);
          toastr.success(data.message);
        } else {
          toastr.error(data.message);
          $('#updatePasswordFormBtn').html('Submit');
        }        
      }
   });
   return false;
  }
});

$(document).on('click', '#deleteUserTeam', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          headers: {
             'X-CSRF-Token': $('input[name="_token"]').val()
          },
          type: 'post',
          url: _baseURL + "/delete-team",
          data: {
            id: id,
          },          
          success: function(data) {
            toastr.options.timeOut = 4000;
            if (data.status == true) {
              $('.teamColumn'+id).addClass('d-none');
              toastr.success(data.message);
            } else {
              toastr.error(data.message);
            }        
          }
        });
        // Swal.fire('Saved!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
      }
    })
});