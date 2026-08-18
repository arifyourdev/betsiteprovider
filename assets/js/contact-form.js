jQuery(document).ready(function () {
	// Custom "phone" validation rule (10-15 digits, optional +/-/space/() )
	if (jQuery.validator && !jQuery.validator.methods.phone) {
		jQuery.validator.addMethod("phone", function (value, element) {
			return this.optional(element) || /^[0-9+\-\s()]{7,15}$/.test(value);
		}, "Please enter a valid phone number.");
	}
});

jQuery(document).ready(function () {
	jQuery(document).on('click', '#submit', function () {
		if (jQuery('#captcha_val').length && jQuery('#captcha_val').val() != jQuery('#captcha_text').val()) {
			jQuery('#captcha_text').parent('div').append('<span class="error">Captcha does not match</span>');
			return false;
		}

		jQuery("#contactpage").validate({
			rules: {
				fname: {
					required: true
				},
				lname: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					phone: true
				},
				msg: {
					required: true
				}
			},
			messages: {
				fname: "Please enter your first name",
				lname: "Please enter your last name",
				email: {
					required: "Please enter your email address",
					email: "Please enter a valid email address"
				},
				phone: {
					required: "Please enter your phone number",
					phone: "Please enter a valid phone number"
				},
				msg: "Please enter your message"
			},
			errorElement: "span",
			errorPlacement: function (error, element) {
				error.appendTo(element.parent());
			},
			submitHandler: function (form) {
				submitSignupFormNow(jQuery(form));
				return false;
			}
		});
	});

	function submitSignupFormNow(form) {
		jQuery("#form_result").hide().removeClass('form-success form-error');
		var data = form.serialize();
		jQuery.ajax({
			url: "contact-form",
			type: "POST",
			dataType: "json",
			data: data,
			success: function (response) {
				if (response.status === "Success") {
					jQuery("#form_result").html('<span class="form-success alert alert-success d-block">' + response.msg + "</span>");
					form.trigger("reset");
				} else {
					jQuery("#form_result").html('<span class="form-error alert alert-danger d-block">' + response.msg + "</span>");
				}
				jQuery("#form_result").show();
			},
			error: function () {
				jQuery("#form_result").html('<span class="form-error alert alert-danger d-block">Something went wrong. Please try again.</span>').show();
			}
		});
		return false;
	}
});

// second form in contact page

jQuery(document).ready(function () {
	jQuery(document).on('click', '#submit2', function () {
		if (jQuery('#captcha_val').length && jQuery('#captcha_val').val() != jQuery('#captcha_text').val()) {
			jQuery('#captcha_text').parent('div').append('<span class="error">Captcha does not match</span>');
			return false;
		}

		jQuery("#contactpage2").validate({
			rules: {
				fname: {
					required: true
				},
				lname: {
					required: true
				},
				email: {
					required: true,
					email: true
				},
				phone: {
					required: true,
					phone: true
				},
				msg: {
					required: true
				}
			},
			messages: {
				fname: "Please enter your first name",
				lname: "Please enter your last name",
				email: {
					required: "Please enter your email address",
					email: "Please enter a valid email address"
				},
				phone: {
					required: "Please enter your phone number",
					phone: "Please enter a valid phone number"
				},
				msg: "Please enter your message"
			},
			errorElement: "span",
			errorPlacement: function (error, element) {
				error.appendTo(element.parent());
			},
			submitHandler: function (form) {
				submitSignupFormNow2(jQuery(form));
				return false;
			}
		});
	});

	function submitSignupFormNow2(form) {
		jQuery("#form_result").hide().removeClass('form-success form-error');
		var data = form.serialize();
		jQuery.ajax({
			url: "contact-form",
			type: "POST",
			dataType: "json",
			data: data,
			success: function (response) {
				if (response.status === "Success") {
					jQuery("#form_result").html('<span class="form-success alert alert-success d-block">' + response.msg + "</span>");
					form.trigger("reset");
				} else {
					jQuery("#form_result").html('<span class="form-error alert alert-danger d-block">' + response.msg + "</span>");
				}
				jQuery("#form_result").show();
			},
			error: function () {
				jQuery("#form_result").html('<span class="form-error alert alert-danger d-block">Something went wrong. Please try again.</span>').show();
			}
		});
		return false;
	}
});
