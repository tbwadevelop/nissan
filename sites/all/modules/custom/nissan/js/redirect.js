(function ($) {
	Drupal.behaviors.request = {
	    attach: function (context, settings) {
			$(document ).ajaxSuccess(function( event, xhr, settings ) {
			   $(".front .vjs-control-text").text("PLAY");
			   if ( $(".webform-client-form-1 .form-actions .webform-submit").length > 0 && $(".webform-client-form-1 .form-managed-file .file").length > 0) {
  			   	   var search = settings.url.search("modal_forms/ajax/webform/1");
		   	         if (xhr.status == false && search > 1) {
			   		   	window.location.href = 'gracias';
			   		  }	
			   	}
			});	
		}
  	};
}(jQuery));