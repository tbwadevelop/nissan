(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
			$('#startodal').trigger('click');
			$("#block-block-1").appendTo("#skip-link"); 
		    // Loader Animation.	
			$(window).load(function(){
			    $('.loader').fadeOut(500);
			});
		}
	};
}(jQuery));;
