$(document).ready(function() {
	$(".next").click(function() {
		$(".current").removeClass("current").hide()
			.next().show().addClass("current");
	})
	$(".prev").click(function() {
		$(".current").removeClass("current").hide()
			.prev().show().addClass("current");
	})
	
	var tempSlider = $("#tempRange").slider({});
	changeTempInputFields(tempSlider);
	
	$('#tempRange').on('change', function() {
		changeTempInputFields(tempSlider);
		//var currentRange = (tempSlider.slider('getValue'));
		//$('#mintemp').val(currentRange[0]);
		//$('#maxtemp').val(currentRange[1]);
	});
	
});

function changeTempInputFields(tempSlider) {
	var currentRange = (tempSlider.slider('getValue'));
	$('#mintemp').val(currentRange[0]);
	$('#maxtemp').val(currentRange[1]);
}

