$(document).ready(function ($) {
	// Declare the body variable
	var $body = $("body");

	// Function that shows and hides the sidebar cart
	$(document).on("click", ".drawer-button, #sidebar-drawer .close-button, #sidebar-drawer-curtain", function (e) {
		e.preventDefault();

		// Add the show-sidebar-drawer class to the body tag
		$body.toggleClass("show-sidebar-drawer");

		// Check if the sidebar curtain is visible
		if ($("#sidebar-drawer-curtain").is(":visible")) {
			// Hide the curtain
			$("#sidebar-drawer-curtain").fadeOut(500);
		} else {
			// Show the curtain
			$("#sidebar-drawer-curtain").fadeIn(500);
		}
	});

	// Function that adds or subtracts quantity when a 
	// plus or minus button is clicked
	$body.on('click', '.plus-button, .minus-button', function () {
		// Get quanitity input values
		var qty = $(this).closest('.qty').find('.qty-input');
		var val = parseFloat(qty.val());
		var max = parseFloat(qty.attr('max'));
		var min = parseFloat(qty.attr('min'));
		var step = parseFloat(qty.attr('step'));

		// Check which button is clicked
		if ($(this).is('.plus-button')) {
			// Increase the value
			qty.val(val + step);
		} else {
			// Check if minimum button is clicked and that value is 
			// >= to the minimum required
			if (min && min >= val) {
				// Do nothing because value is the minimum required
				qty.val(min);
			} else if (val > 0) {
				// Subtract the value
				qty.val(val - step);
			}
		}
	});
});