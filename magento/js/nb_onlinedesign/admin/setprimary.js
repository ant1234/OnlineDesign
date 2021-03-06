function primaryBtn(_element, pid, template_folder){
	var _url = $(_element).readAttribute('data-rev');
	var arrayOfStrings = _url.split(";");
	new Ajax.Request(arrayOfStrings[0], {
		method: "get",
		parameters : {
			pid: arrayOfStrings[1],
			template_folder: arrayOfStrings[2]
		},
		onSuccess: function(response){},
		onComplete: function(response){
			if(response.responseText == "successfully") {
				location.reload();
			}
		}
	});
}

function delete_template(_element, pid, template_folder){
	var _url = $(_element).readAttribute('data-rev');
	var arrayOfStrings = _url.split(";");
	new Ajax.Request(arrayOfStrings[0], {
		method: "get",
		parameters : {
			pid: arrayOfStrings[1],
			template_folder: arrayOfStrings[2]
		},
		onSuccess: function(response){},
		onComplete: function(response){
			if(response.responseText == "successfully") {
				location.reload();
			}
		}
	});
}

function open_manage_template() {
	$('onlinedesign_tabs_template_section').click();
	return;
}

/* detect tab actived */
jQuery("document").ready(function() {
	if(jQuery( "#onlinedesign_tabs_form_section" ).hasClass("active")) {
		localStorage['onlinedesign_tabs_template_section'] = 0;
	}
	if(jQuery( "#onlinedesign_tabs_setting_section" ).hasClass("active")) {
		localStorage['onlinedesign_tabs_template_section'] = 0;
	}
	if(jQuery( "#onlinedesign_tabs_template_section" ).hasClass("active")) {
		localStorage['onlinedesign_tabs_template_section'] = 1;
	}


	jQuery("#onlinedesign_tabs_form_section").click(function() {
		localStorage['onlinedesign_tabs_template_section'] = 0;
	});

	jQuery("#onlinedesign_tabs_setting_section").click(function() {
		localStorage['onlinedesign_tabs_template_section'] = 0;
	});
	
	jQuery("#onlinedesign_tabs_template_section").click(function() {
		localStorage['onlinedesign_tabs_template_section'] = 1;
	});

    if(localStorage['onlinedesign_tabs_template_section'] == 1) {
		$('onlinedesign_tabs_template_section').click();
	}
});