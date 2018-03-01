(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
			$( document ).ready(function() {

    			$( "#modalContent" ).addClass($("#modal-content .webform-client-form").attr('id'));
				$("#block-block-1").appendTo("#skip-link"); 
				if ($(".webform-component--paso-1").length > 0) {
					$(".webform-component--paso-1").appendTo(".modal-content .modal-header "); 
				}
				if ($(".webform-component--paso-2").length > 0) {
					$(".webform-component--paso-2").appendTo(".modal-content .modal-header ");  
					$(".webform-component--paso-1").remove();
				}
				$(".webform-component--terminos").appendTo("#skip-link"); 
				
				jQuery('.webform-component--terminos p button').appendTo('.form-item-submitted-he-leido-y-acepto-los-terminos-y-condiciones label');
			});	
			$(window).load(function(){
			    $('.loader').fadeOut(500);
			    $('.front #startodal').trigger('click');
			});		

		}
	};
}(jQuery));

