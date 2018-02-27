(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
			$( document ).ready(function() {
				$("#block-block-1").appendTo("#skip-link"); 

				if ($(".webform-component--paso-1").length > 0) {
					$(".webform-component--paso-1").appendTo(".modal-content .modal-header "); 
				}

				if ($(".webform-component--paso-2").length > 0) {
					$(".webform-component--paso-2").appendTo(".modal-content .modal-header ");  
					$(".webform-component--paso-1").remove(); $(".webform-component--paso-2").remove(); 
				}

			});	
			$(window).load(function(){
			    $('.loader').fadeOut(500);
			});					
		}
	};
}(jQuery));