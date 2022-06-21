$(document).on('change', '.questionType', function(){
   if ($(this).val() == 'Text') {
      $(this).parent().parent().find('div.list-of-ptions').addClass('d-none');
   } else {
      $(this).parent().parent().find('div.list-of-ptions').removeClass('d-none');
   }
});

$("#leaderReflectionForm").validate({
   rules: {
      leader_reflection: {
         required: true,
      },
      leader_approach_tag: {
         required: true
      },
      leader_today_better_thing: {
         required: true
      },          
   },
   messages: {
      leader_reflection: "Please enter reflection message",
      leader_approach_tag: "Please choose leadership approach",
      leader_today_better_thing: "Please enter one better thing for today",       
   },
   submitHandler: function(form) {
      var serializedData = $(form).serialize();
      $("#err_mess").html('');
      $("#leaderReflectionBtn").attr("disabled", true);
      $('#leaderReflectionBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
         },
         type: 'post',
         url: _baseURL + "/leader-reflection",
         data: serializedData,
         dataType: 'json',
         success: function(data) {
            toastr.options.timeOut = 3000;
            if (data.status == true) {
              $('#leaderReflectionBtn').html('Save Changes');
              $('.leaderReflectionSuccess').html('<h3>Great Hansei!<br> You just improved yourself </h3>');
              $('.leaderReflectionFormSec').addClass('d-none');
              $('#reflectionAsaLeaderOld').val('');
              // window.location.href = _baseURL+'/account-info';
              toastr.success(data.message);
              setTimeout(function() {
                $('#ReflectionAsaLeader').modal('toggle');
              }, 2000);
              $('#leaderReflectionForm').trigger("reset");
            } else {
               toastr.error(data.message);
            }
         }
      });
      return false;

   }
});

$("#ReflectOnEmployeeForm").validate({
   rules: {
      refelection_on_employee: {
         required: true,
      },
      employee_behavior_tags: {
         required: true
      },
      employee_further_reflection: {
         required: true
      },
      employee_improving_thing: {
         required: true
      },          
   },
   messages: {
      refelection_on_employee: "Please enter reflection message",
      employee_behavior_tags: "Please choose employee behaviour tag",
      employee_further_reflection: "Please enter employee further reflection",       
      employee_improving_thing: "Please enter employee improving thing",       
   },
   submitHandler: function(form) {           
      var serializedData = $(form).serialize();
      $("#err_mess").html('');
      $("#ReflectOnEmployeeFormBtn").attr("disabled", true);
      $('#ReflectOnEmployeeFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
         },
         type: 'post',
         url: _baseURL + "/reflect-on-employee",
         data: serializedData,
         dataType: 'json',
         success: function(data) {
            $('#ReflectOnEmployeeFormBtn').html('Save Changes');
            toastr.options.timeOut = 4000;
            if (data.status == true) {
               $('.employeeReflectSuccess').html('<h3>Great Hansei!</h3>');
               $('.employeeReflectFormSec').addClass('d-none');
               $('#reflectOnEmployeeOld').val('');
               // window.location.href = _baseURL+'/account-info';
               toastr.success(data.message);
               setTimeout(function() {
                  $('#ReflectOnEmployee').modal('toggle');               
               }, 2000);
               $('#ReflectOnEmployeeForm').trigger("reset");
            } else {
               toastr.error(data.message);
            }
         }
      });
      return false;

   }
});

$('form#GembaForm').on('submit', function(event) {
  $('.chosen-select').each(function() {
    $(this).rules("add", 
      {
        required: true,
        messages: {
            required: "This field is required!",
      }
    });
  });
});

$("#GembaForm").validate({
  ignore: [],
  rules: {
    date: {
       required: true,
    },
    time: {
       required: true
    },
    team_name: {
       required: true
    },   
    time_at_gemba: {
       number: true,
       digits: true,
    },    
    gemba_located_in: {
       required: true
    },
    // team_job_risk: {
    //    required: true,
    // },
    team_identified_hazards: {
       required: true,
    },          
    observation_training_need: {
       required: true,
    },       
    job_name: {
       required: true,
    },
    team_share_company_vission_mission: {
       required: true,
    },
    team_know_company_scorecard: {
       required: true,
    },
    team_translate_company_indicator: {
       required: true,
    },
    visible_their_area: {
       required: true,
    },
    job_impect_these_indicators: {
       required: true,
    },
    job_output_impact_indicators: {
       required: true,
    },
    function_of_area_visited: {
       required: true,
    },
    document_available: {
       required: true,
    },
    update_document: {
       required: true,
    },
    have_skill_matrix_associated: {
       required: true,
    },
    all_steps_procedure: {
       required: true,
    },
    hour: {
       required: true,
    },
    participating_team: {
       required: true,
    },
    duration_at_gemba: {
       required: true,
    },
    function_visited: {
       required: true,
    },
    employee_engagemant_survey: {
       required: true,
    },
   },
   errorPlacement:
    function( error, element ){
      if(element.is( ":radio" )){
      // error append here
      error.appendTo('#radio');
      }
      else {
      error.insertAfter(element);
      }
    },
   messages: {
    date: "Please choose date",
    time: "Please choose time",
    team_name: "Please enter team name",
    time_at_gemba: {
      number: "Only numeric values are allowed",
      digits: "Decimail are not allowed",
    },
    gemba_located_in: "Please enter gemba located in",
    // team_job_risk: "Please choose job risks option",
    team_identified_hazards: "This field is required!",      
    observation_training_need: "Please enter observation training need",          
    job_name: "Please enter job name",
    team_share_company_vission_mission: "This field is required",
    team_know_company_scorecard: "This field is required",
    team_translate_company_indicator: "This field is required",
    visible_their_area: "This field is required",
    job_impect_these_indicators: "This field is required",
    job_output_impact_indicators: "This field is required",
    function_of_area_visited: "This field is required",
    document_available: "This field is required",
    update_document: "This field is required",
    have_skill_matrix_associated: "This field is required",
    all_steps_procedure: "This field is required",
    hour: "This field is required",
    participating_team: "This field is required",
    duration_at_gemba: "This field is required",
    function_visited: "This field is required",
    employee_engagemant_survey: "This field is required",
   },
   submitHandler: function(form) {
      var serializedData = $(form).serialize();
      $("#err_mess").html('');
      $("#GembaFormBtn").attr("disabled", true);
      $('#GembaFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
         },
         type: 'post',
         url: _baseURL + "/gemba",
         data: serializedData,
         dataType: 'json',
         success: function(data) {
            $('#GembaFormBtn').html('Save Changes');
            toastr.options.timeOut = 4000;
            if (data.status == true) {
               // window.location.reload();
               window.location.href = _baseURL+'/gemba';
               toastr.success(data.message);
               $('#GembaForm').trigger("reset")
            } else {
               toastr.error(data.message);
            }
         }
      });
      return false;
   }
});

$("#updateGembaForm").validate({
  ignore: [],
  rules: {
    date: {
       required: true,
    },
    time: {
       required: true
    },
    team_name: {
       required: true
    },   
    time_at_gemba: {
       required: true,
       number: true
    },    
    gemba_located_in: {
       required: true
    },
    team_job_risk: {
       required: true,
    },
    team_identified_hazards: {
       required: true,
    },          
    observation_training_need: {
       required: true,
    },       
    job_name: {
       required: true,
    },
    team_share_company_vission_mission: {
       required: true,
    },
    team_know_company_scorecard: {
       required: true,
    },
    team_translate_company_indicator: {
       required: true,
    },
    visible_their_area: {
       required: true,
    },
    job_impect_these_indicators: {
       required: true,
    },
    job_output_impact_indicators: {
       required: true,
    },
    function_of_area_visited: {
       required: true,
    },
    document_available: {
       required: true,
    },
    update_document: {
       required: true,
    },
    have_skill_matrix_associated: {
       required: true,
    },
    all_steps_procedure: {
       required: true,
    },
    hour: {
       required: true,
    },
    participating_team: {
       required: true,
    },
    duration_at_gemba: {
       required: true,
    },
    function_visited: {
       required: true,
    },
    employee_engagemant_survey: {
       required: true,
    },
   },
   messages: {
    date: "Please choose date",
    time: "Please choose time",
    team_name: "Please enter team name",
    time_at_gemba: {
      required: "Please enter time at gemba",
      number: "Only numeric values are allowed" 
    },
    gemba_located_in: "Please enter gemba located in",
    team_job_risk: "Please choose job risks option",
    team_identified_hazards: "This field is required!",      
    observation_training_need: "Please enter observation training need",          
    job_name: "Please enter job name",
    team_share_company_vission_mission: "This field is required",
    team_know_company_scorecard: "This field is required",
    team_translate_company_indicator: "This field is required",
    visible_their_area: "This field is required",
    job_impect_these_indicators: "This field is required",
    job_output_impact_indicators: "This field is required",
    function_of_area_visited: "This field is required",
    document_available: "This field is required",
    update_document: "This field is required",
    have_skill_matrix_associated: "This field is required",
    all_steps_procedure: "This field is required",
    hour: "This field is required",
    participating_team: "This field is required",
    duration_at_gemba: "This field is required",
    function_visited: "This field is required",
    employee_engagemant_survey: "This field is required",
   },
   submitHandler: function(form) {
      var serializedData = $(form).serialize();
      var formMetaId = $('#formMetaId').val();      
      $("#err_mess").html('');
      $("#updateGembaFormBtn").attr("disabled", true);
      $('#updateGembaFormBtn').html('Processing <i class="fa fa-spinner fa-spin"></i>');
      $.ajax({
         headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
         },
         type: 'post',
         url: _baseURL + "/gemba/"+formMetaId,
         data: serializedData,
         dataType: 'json',
         success: function(data) {
            $('#updateGembaFormBtn').html('Save Changes');
            toastr.options.timeOut = 4000;
            if (data.status == true) {
               // window.location.reload();
               window.location.href = _baseURL+'/my-gemba';
               toastr.success(data.message);
            } else {
               toastr.error(data.message);
            }
         }
      });
      return false;
   }
});

  /* 1. Visualizing things on Hover - See next part for action on click */
$(document).ready(function(){  
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10);
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
   }).on('mouseout', function(){
      $(this).parent().children('li.star').each(function(e){
         $(this).removeClass('hover');
      });
   });
  $('#stars li.attitude').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var starRating = $('.star.attitude.selected').length; 
    $('.employeeAttitudeRating').val(starRating);
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);    
  });

  $('#stars li.aptitude').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var starRating = $('.star.aptitude.selected').length; 
    $('.employeeAptitudeRating').val(starRating);
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);    
  });

  $('#stars li.leader').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var starRating = $('.star.leader.selected').length; 
    $('.leaderStarRating').val(starRating);
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "Thanks! You rated this " + ratingValue + " stars.";
    }
    else {
        msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
    }
    responseMessage(msg);    
  });
});

function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}