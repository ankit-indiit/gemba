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

// $(document).on('change', '#advertMembers', function(){
// 	var index = $(this).data('inc');
// 	var memberCount = $(this).val();
// 	var emailCount = $('.teamsEmail'+index).length;
// 	if (memberCount <= emailCount) {

//       	const diff = (emailCount - memberCount);
//       	console.log(diff);
//       	if (diff == 0) {
//         	$('.appendEmailField'+index+' > .removeablee'+index).slice(-1).remove();
//       	} else {
//         	$('.appendEmailField'+index+' > .removeablee'+index).slice(-(diff)).remove();
//       	}
//     }
// });

// $(document).on('change', '.membersCount', function(){
// 	var members = $(this).val();
// 	var emailLength = $('.emailSec').length;
// 	if (members <= emailLength) {

//       	const diff = (emailLength - members);
//       	console.log(diff);
//       	if (diff == 0) {
//         	$('.emailSec').slice(-1).remove();
//       	} else {
//         	$('.emailSec').slice(-(diff)).remove();
//       	}
//     } else {
//     	$('.appendMoreMemberBtn').prop("disabled", false);
// 	    $('.appendMoreMemberBtn').css("cursor", "pointer");
//     }
// });

// jQuery(document).on('click','.appendMoreMemberBtn',function(){
// 	var members = $('.membersCount').val();
// 	var emailLength = $('.emailSec').length;
// 	var div_html = '<div class="form-group emailSec"> <div class="row"> <div class="col-md-10"> <label class="frm_label">Email address</label> <div class="input-group"> <input class="form-control appendMoreMember" name="" value=""> </div> </div> <div class="col-md-2 mt-4 pt-2"> <a href="javascript:void(0)" class="email-repeat-btn removeEmailField"> <i class="fa fa-minus" aria-hidden="true"></i> </a> </div> </div> </div>';
// 	if (emailLength < members) {
// 		jQuery('.appendMoreMemberSec').slideDown('slow').append(div_html);		
// 	} else {
// 		$('.appendMoreMemberBtn').prop('disabled', true);
// 	    $('.appendMoreMemberBtn').css("cursor", "no-drop");
// 	}
// })

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
	var div_html = '<div class="form-question-btm"> <a href="javascript:void(0)" class="removeQuestions" type="button"> Remove </a> <div class="accordion-body"> <div class="row"> <div class="col-md-10"> <div class="form-group mb-4"> <label class="form-label">Type of question:</label> <select class="form-select questionType" id="qusType"> <option value="">Select 1</option> <option value="Text">Text</option> </select> </div> <div class="form-group mb-4"> <label class="form-label">Question label:</label> <input type="text" class="form-control" id="qusLabel"> </div><div class="form-group mb-4"> <label class="form-label">Comment</label> <textarea class="form-control" id="qusCmnt"></textarea> </div> </div> </div><a href="javascript:void(0)" class="submitQuestions" type="button"> Submit </a></div> </div>'; 
	jQuery(".add-qstn-append").slideDown('slow').append(div_html);
	$('#addQuesIndex').val( addQuesIndex + 1 );
})

$(document).on('click', '.submitQuestions', function(){
	var addQuesIndex = parseInt($('#addQuesIndex').val()-2);
	var qusLabel = $(this).parent().find('#qusLabel').val();
	var qusCmnt = $(this).parent().find('#qusCmnt').val();
	var qusHtml = '<div class="col-md-12 mt-4 qus'+addQuesIndex+'"> <div class="form-group"> <label for="" class="form-label">'+qusLabel+'</label><input type="hidden" name="question['+addQuesIndex+'][label]" value="'+qusLabel+'"><textarea class="form-control" name="question['+addQuesIndex+'][comment]" id="" rows="3">'+qusCmnt+'</textarea> </div> </div>';
	if (qusLabel == '' && qusCmnt == '') {
		if (qusLabel == '') {
			$(this).parent().find('#qusLabel').addClass('validate');
		}
		if (qusCmnt == '') {
			$(this).parent().find('#qusCmnt').addClass('validate');
		}
	} else {
		var addedQus = $('.qus'+addQuesIndex).length;
		if (addedQus < 1) {
			jQuery(".appendQus").slideDown('slow').append(qusHtml);		
		} else {
			$('.qus'+addQuesIndex+' .form-label').html(qusLabel);
			$('.qus'+addQuesIndex+' .form-control').val(qusCmnt);
		}
	}
});