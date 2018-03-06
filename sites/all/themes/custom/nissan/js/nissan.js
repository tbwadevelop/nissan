(function ($) {
	Drupal.behaviors.nissan = {
		attach: function (context, settings) {
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

				jQuery('#block-nissan-galeria a').click(function(e){
					e.preventDefault();
					myFacebookLogin("Nissa",jQuery(this).attr("name"));
				});
			});	
			$(window).load(function(){
			    $('.loader').fadeOut(0);
			    $('.front #startodal').trigger('click');
			});	
		}
	};
}(jQuery));