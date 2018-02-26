(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
			$( document ).ready(function() {
				$("#block-block-1").appendTo("#skip-link"); 
			});	
			$(window).load(function(){
			    $('.loader').fadeOut(500);
			});					
		}
	};
}(jQuery));