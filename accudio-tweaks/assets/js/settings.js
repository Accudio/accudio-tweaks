jQuery(function() {

	accudio_tweaks_security_frame_whitelist();
	jQuery('#accudio_tweaks_security_frame').change(function() {accudio_tweaks_security_frame_whitelist()})

});

function accudio_tweaks_security_frame_whitelist() {
	if (jQuery('#accudio_tweaks_security_frame').val() == "ALLOW-FROM") {
		jQuery("#accudio_tweaks_security_frame_whitelist").show();
	} else {
		jQuery("#accudio_tweaks_security_frame_whitelist").hide();
	}

}