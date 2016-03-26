$(document).ready(function () {	
	
	$(".alert-danger").hide();

	$(".add-button").click(function() {
		var itemType = $(this).closest('div').attr('id');
		var itemTypeObject = new packilyItemsInterface(itemType);
		itemTypeObject.addItemInput();
	});
	
	$(".packily-list-group").on("click", ".remove-item", function() {
		$(this).parent('li').remove();
	});
	
	$(".convertAllToArrays").click(function() {
		prepareListsForSubmission();
	})
	
	$("#sendPackilyEmail").click(function() {		
		if (validateEmails()) {
			prepareListsForSubmission();
			event.preventDefault();
			//$('#packilyEmailForm').submit();
		}		
		else {
			$(".alert-danger").show();
			event.preventDefault();
		}			
	});	
});

function prepareListsForSubmission() {
	$('ul.packily-list-group').each(function() {
		var thisPackilyListType = $(this).attr("id");
		var thisPackilyList = new packilyListToArray($(this));
		var thisPackilyArray = thisPackilyList.convertListToArray();
		var thisPackilyObject = new packilyListObject(thisPackilyListType, thisPackilyArray);
		console.log(thisPackilyObject);
		$("input[name=" + thisPackilyObject.type + "]").val(JSON.stringify(thisPackilyObject));
	})
}

//Packily list Object
function packilyListObject(itemType, itemsArray) {
	this.type = itemType;
	this.items = itemsArray;
}

//List UI functions
function packilyItemsInterface(itemType) {
	
	this.type = itemType;
	
	this.newItemInputHtml = '<li class="list-group-item packilyUserItem editing"><div class="form-inline">'
	this.newItemInputHtml += '<input type="text" class="form-control" style="width:75%; margin-right:10px;"/><button type="button" class="btn btn-sml add-item-btn">Add</button></li>';
	
	this.newItemFinalHtml = '<button type="button" class="btn btn-default remove-item">';
	this.newItemFinalHtml += '<span class="glyphicon glyphicon-remove"></span>';
	this.newItemFinalHtml += '</button></li>';
	
	this.addItemInput = function() {
		$("ul." + this.type).prepend(this.newItemInputHtml);
		$("ul." + this.type + " .add-item-btn").click(this, this.addItemText);
	}
			
	this.addItemText = function(event) {
		//remove editing class from li item
		$(this).closest('li').removeClass('editing');		
		$(this).parent().replaceWith(function() {
			var itemName = $('.form-control').val();
			var returnHtml = itemName + event.data.newItemFinalHtml;
			return returnHtml;
		});
	}	
}

//List to array functions
function packilyListToArray(listObject) {
	
	this.packilyList = listObject;
	
	this.convertListToArray = function() {
		var packilyArray = []
		//only pick up items that user has finished editing
		this.packilyList.find('li').not('editing').each(function() {
			packilyArray.push($(this).text());
		});
		return packilyArray;
	}
	
	this.addItemToArray = function(event) {
		event.data.packilyArray.push($(this).text());
	}
	
}

//Email validation function
function validateEmails() {
	
	$(".alert-danger").hide();
	$(".alert-danger").empty();
	
	var emailAddress1 = $("#emailAddress1").val();
	var emailAddress2 = $("#emailAddress2").val();
	
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if (emailAddress1 != emailAddress2) {
		$(".alert-danger").append("<p>Email addresses do not match.</p>");
		return false;
	}

	else if (!regex.test(emailAddress1)) {
		$(".alert-danger").append("<p>Not a valid email address.</p>");
		return false;
	}
	
	else {
		return true;
	}
	
}

