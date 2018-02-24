(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
					
		 $(window).on('load',function(){
		     $('#myModal').modal('show');
		  });

		$(window).load(function(){
		    $('.loader').fadeOut(500);
		});
		
			$( document ).ready(function() {
			    //	launchWindow('#startodal');
						$("#block-block-1").appendTo("#skip-link"); 
					    // Loader Animation.	

			});		
		}
	};
}(jQuery));