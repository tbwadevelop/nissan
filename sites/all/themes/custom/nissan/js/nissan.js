(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
		    // Loader Animation.	
			$(window).load(function(){
			    $('.loader').fadeOut(500);
			});
			$("#block-block-1").appendTo("#skip-link"); 
		}
	};
}(jQuery));
