	window.onscroll = function() {myFunction()};

		var header = document.getElementById("myHeader");
		var sticky = header.offsetTop;

		function myFunction() {
			  if ($(window).scrollTop() >= 100) {
	        $('#myHeader').addClass('sticky');
	    }
	    else {
	    	 $('#myHeader').removeClass('sticky');
	    }
		}


jQuery(document).on('click','.clone-email-field',function(){
	var teamMailIndex = parseInt($('#teamMailIndex').val());	
	var secNum = parseInt($('#secNum').val());

	var currentDivs = $('.append_divs > .form-team-btm').length;
	var activeSection = parseInt(currentDivs - 1); 
	var div_html = '<div class="addEmailField teamEmail removeablee'+teamMailIndex+'"><input type="email" class="form-control teams_email" name="item['+teamMailIndex+'][teams_email][]"> <a href="javascript:void(0)" class="email-repeat-btn remove-email-field"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </div>'; 
	console.log('sectionno => ',activeSection);
	jQuery(".addEmailFieldMain"+activeSection).append(div_html);
	// $('#teamMailIndex').val( teamMailIndex + 1 );
	jQuery(".addEmailField").addClass('show-remove-btn');
})
jQuery(document).on('click','.remove-email-field',function(){
	jQuery(this).parent().remove();
})


$(".addTeam").click(function(){
  $(".form-team-btm").toggle(500);
   $(".addMoreTeamDiv").toggleClass('addMoreTeamShow');
   $('#registerFormBtn').trigger('click');
});



jQuery(document).on('click','.addMoreTeam',function(){
	// var div_html = jQuery('.form-team-btm').first().clone();
	var secNum = parseInt($('#secNum').val());
	var teamMailIndex = parseInt($('#teamMailIndex').val());
	var div_html = '<div class="form-team-btm" style="display: block;"><input type="hidden" id="secNum" value="'+secNum+'"> <div class="accordion-body"> <div class="form-group "> <label>Teams Name</label> <input type="text" class="form-control teams_name" name="item['+secNum+'][teams_name]"> </div> <div class="form-group "> <label>Teams Logo</label> <input type="file" class="form-control teams_logo" name="item['+secNum+'][teams_logo]"> </div> <div class="form-group "> <label>How many people you want to give access? ( up to 5, for free, with adverts )</label> <input type="text" data-inc="'+secNum+'" class="form-control advert_members" id="advertMembers'+secNum+'" name="item['+secNum+'][advert_members]" aria-invalid="false"> </div> <div class="form-group "> <label>New email address</label> <div class="addEmailFieldMain addEmailFieldMain'+secNum+'"> <div class="addEmailField teamEmail show-remove-btn"> <input type="email" class="form-control teams_email" name="item['+teamMailIndex+'][teams_email][]"> <a href="javascript:void(0)" class="email-repeat-btn clone-email-field" style="cursor: no-drop;" onclick="cloneEmailField('+secNum+');"> <i class="fa fa-plus" aria-hidden="true"></i> </a> </div></div> </div> </div> </div>'; 
	jQuery(".append_divs").slideDown('slow').append(div_html);
	$('#secNum').val( secNum + 1 );
	$('#teamMailIndex').val( teamMailIndex + 1 );
	$('#registerFormBtn').trigger('click');
})



$(".chosen-select").chosen();


$(".addQuestions").click(function(){
	if(jQuery(".form-question-btm:visible").length >= 1) {
  	jQuery(this).addClass("appendQuesSec");
  } else{
  	jQuery(this).removeClass("appendQuesSec");
  }
  $(".form-question-btm").show();
});

	jQuery(document).on('click','.removeQuestions',function(){
	if(jQuery(".form-question-btm").length > 1) {
		jQuery(this).parent().remove();
	} else {
		jQuery(".form-question-btm").hide();		
	}
});


jQuery(document).on('click','.addQuestions',function(){
	var addQuesIndex = parseInt($('#addQuesIndex').val());
	// var div_html = jQuery('.form-question-btm').first().clone();
	var div_html = '<div class="form-question-btm"> <a href="javascript:void(0)" class="removeQuestions" type="button"> Remove </a> <div class="accordion-body"> <div class="row"> <div class="col-md-10"> <div class="form-group mb-4"> <label class="form-label">Type of question:</label> <select class="form-select questionType" name="question['+addQuesIndex+'][type]" > <option value="">Select</option> <option value="Text">Text</option> <option value="Dropdown">Dropdown</option> <option value="Checkbox">Checkbox</option> <option value="Radio">Radio</option> </select> </div> <div class="form-group mb-4"> <label class="form-label">Question label:</label> <input type="text" class="form-control" name="question['+addQuesIndex+'][label]"> </div> <div class="form-group mb-4 list-of-ptions"> <label class="form-label">List of options (Separated by commas)</label> <input type="text" class="form-control" name="question['+addQuesIndex+'][list_option]"> </div> </div> </div> </div> </div>'; 
	jQuery(".add-qstn-append").slideDown('slow').append(div_html);
	$('#addQuesIndex').val( addQuesIndex + 1 );
})