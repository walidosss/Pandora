(function($){
	$(document).ready(function(){
		$("#naissance").mask("99/99/9999",{placeholder:"mm/dd/yyyy"});
		
		$("#contact-form").validate({
			errorLabelContainer: $("#contact-form div.error-container")
		});
	});
})(jQuery);