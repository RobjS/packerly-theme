$(document).ready(function() {
	$(".next").click(function() {
		var thisQuestion = $(".current").attr('id');
		var validationResult = validateQuestionById(thisQuestion);
		if (validationResult == true) {
			$(".current .alert").hide();
			$(".current").removeClass("current").hide()
			.next().show().addClass("current");
		}
		else {
			$(".current .alert").show().html(validationResult);
			return false;
		}
	})
	$(".prev").click(function() {
		$(".current").removeClass("current").hide()
			.prev().show().addClass("current");
	})
	
	if($("#tempRange").length) {
	
		var tempSlider = $("#tempRange").slider({ id:"tempSlider"});
		changeTempInputFields(tempSlider);
		
		$('#tempRange').on('change', function() {
			changeTempInputFields(tempSlider);
		});
	
	}
});

function changeTempInputFields(tempSlider) {
	var currentRange = (tempSlider.slider('getValue'));
	$('#mintemp').val(currentRange[0]);
	$('#maxtemp').val(currentRange[1]);
}

function validateQuestionById(thisQuestion) {
	
	switch(thisQuestion) {
		
		case "q1":
			return validateCheckboxes(thisQuestion, "<p>Please select at least one gender</p>");
			break;
		
		case "q2":
			return true;
			break;
			
		case "q3":
			return validateRadiobuttons(thisQuestion, "<p>Please select an activity level</p>");
			break;
			
		case "q4":
			return validateRadiobuttons(thisQuestion, "<p>Please select a budget<p>");
			break;
		
	}
	
}

function validateCheckboxes(question, errorMessage) {
	if($("#" + question + " input:checkbox:checked").length>0) {
		return true;
	}
	else {
		return errorMessage;
	}
}

function validateRadiobuttons(question, errorMessage) {
	if($("#" + question + " input:radio:checked").length>0) {
		return true;
	}
	else {
		return errorMessage;
	}
}



