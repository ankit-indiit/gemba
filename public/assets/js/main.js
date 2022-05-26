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
	var div_html = jQuery(this).parent().clone();
	jQuery(".addEmailFieldMain").append(div_html);
	jQuery(".addEmailField").addClass('show-remove-btn');
})
jQuery(document).on('click','.remove-email-field',function(){
	jQuery(this).parent().remove();
})


$(".addTeam").click(function(){
  $(".form-team-btm").toggle(500);
   $(".addMoreTeamDiv").toggleClass('addMoreTeamShow');
});



jQuery(document).on('click','.addMoreTeam',function(){
	var div_html = jQuery('.form-team-btm').first().clone();
	jQuery(".append_divs").slideDown('slow').append(div_html);
})



$(".chosen-select").chosen();


$(".addQuestions").click(function(){
	if(jQuery(".form-question-btm:visible").length >= 1) {
  	jQuery(this).addClass("dfsdgf");
  } else{
  	jQuery(this).removeClass("dfsdgf");
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


jQuery(document).on('click','.dfsdgf',function(){
	var div_html = jQuery('.form-question-btm').first().clone();
	jQuery(".add-qstn-append").slideDown('slow').append(div_html);
})