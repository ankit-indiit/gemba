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
            $('#leaderReflectionBtn').html('Save Changes');
            toastr.options.timeOut = 3000;
            if (data.status == true) {
               $('.leaderReflectionSuccess').html('<h3>Great Hansei!<br> You just improved yourself </h3>');
               $('.leaderReflectionFormSec').addClass('d-none');
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

$("#GembaForm").validate({
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
      function_observed: {
         required: true
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
      hazards_identified_option: {
         required: true,
      },
      other_hazard_at_workplace: {
         required: true,
      },
      observation_training_need: {
         required: true,
      },
      improvements_agreed_with_team: {
         required: true,
      },
      responsible_implementing_improvement: {
         required: true,
      },
      responsible_implementing_improvement_date: {
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
      function_observed: "Please enter function observed",
      gemba_located_in: "Please enter gemba located in",
      team_job_risk: "Please choose job risks option",
      team_identified_hazards: "Please chose identified any hazards in the workplace",
      hazards_identified_option: "Please select hazards identified option",
      other_hazard_at_workplace: "Please enter other hazard at workplace",
      observation_training_need: "Please enter observation training need",
      improvements_agreed_with_team: "Please enter improvements agreed with team",
      responsible_implementing_improvement: "Please enter responsible implementing improvement",
      responsible_implementing_improvement_date: "Please enter responsible implementing improvement date",
      job_name: "Please enter job name",
      team_share_company_vission_mission: "This field is required",
      team_know_company_scorecard: "This field is required",
      team_translate_company_indicator: "This field is required",
      visible_their_area: "This field is required",
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
      // var $('#stars > .star .selected').length;
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
               window.location.reload();
               // window.location.href = _baseURL+'/account-info';
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
  $('#stars li.employee').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10);
    var stars = $(this).parent().children('li.star');
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    var starRating = $('.star.employee.selected').length; 
    $('.employeeStarRating').val(starRating);
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