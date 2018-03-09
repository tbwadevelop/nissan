(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
			
			//analytics step 1
			$("#webform-client-form-1 .webform-next.button-primary.btn.btn-default.form-submit").attr('onclick', "ga('send', 'event', 'modal', 'click', 'Ir_registro');");
			
			//Global analytics full steps
			$(".close.ctools-close-modal.ctools-close-modal-processed").attr('onclick', "ga('send', 'event', 'modal', 'click', 'C_modal');");

			//analytics step 2
			$("#webform-client-form-1--2 .webform-next.button-primary.btn.btn-default.form-submit").attr('onclick', "ga('send', 'event', 'modal', 'click', 'R_ok');");
			
			$(window).load(function() {
			    $("#load_screen").fadeOut(600, function() {
			        $("body").fadeIn(10);  
			        $("body").remove("#load_screen");      
			    });
			});	
			
			$( document ).ready(function() {
    			$( "#modalContent" ).addClass($("#modal-content .webform-client-form").attr('id'));
    			if($("·modalContent").find('#webform-client-form-7'))
    				$(this).css('max-height',"none !important");
    			 if ($(".webform-previous").val() == '<none>') {
    			 	  $(".webform-previous").remove();
    			 }

    			 if ($("#edit-submitted-video-upload-button").val() == 'Subir al servidor') {
    			 	 $("#edit-submitted-video-upload-button").text('Adjuntar video');
    			 }

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
				jQuery( ".webform-client-form-7 .modal-header button" ).text("Skip");
			});	
			$(window).load(function(){
			    $('.loader').fadeOut(0);
			    $('.front #startodal').trigger('click');
			});	
		}
	};
}(jQuery));