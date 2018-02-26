(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
			$(document ).ajaxSuccess(function( event, xhr, settings ) {
			   if ( $(".webform-client-form-1 .form-actions .webform-submit").length > 0 && $(".webform-client-form-1 .form-managed-file .file").length > 0) {
			   	      console.log(event);
			   	      console.log(xhr);
			   	      console.log(settings.url);


			   	      var pathname = window.location.pathname; // Returns path only
					  console.log(pathname);

					  var url      = window.location.href; 
					  console.log(url);
			   	   //   if (xhr.status == false) {
			   		  // //	window.location.href = 'gracias';
			   		  // }	
			   	}
			});			
		}
	};
}(jQuery));