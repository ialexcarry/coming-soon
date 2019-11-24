(function( $ ) {
	'use strict';

	/**
	 * All of the code for your admin-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */
	$( document ).ready(
		function(){

				$( ".wcsp_vm_btn" ).click(
					function(){
						var imgurl = $( this ).attr( 'data' );
						var id = $( this ).attr( 'id' );
						$( document ).find( '.wcsp_vm-image-wrap' ).removeClass( 'wcsp_border' );
						$( document ).find( '.wcsp_vm_btn' ).val( wcsp_Ajax.activate );

						$.ajax(
							{     // ajax request
								type: "POST",
								url : wcsp_Ajax.ajaxurl,
								data: {action: "wcsp_image",imgurl:imgurl,security:wcsp_Ajax.security},

							}
						).done(
							function( data ) {
								console.log( data );
								$( "#" + id ).html( wcsp_Ajax.activated );// Activate the Selected theme
								$( "#" + id ).parents( '.wcsp_vm-image-wrap' ).addClass( 'wcsp_border' );
								if (data == 'bg1') {
									$( '#demo' ).html( "<div class='notice notice-success is-dismissible'><p>" + wcsp_Ajax.template1 + "</p><button type='button' id='btn' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>" );
								}
								if (data == 'bg2') {
									$( '#demo' ).html( "<div class='notice notice-success is-dismissible'><p>" + wcsp_Ajax.template2 + "</p><button type='button' id='btn' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>" );
								}
								if (data == 'bg3') {
									$( '#demo' ).html( "<div class='notice notice-success is-dismissible'><p>" + wcsp_Ajax.template3 + "</p><button type='button' id='btn' class='notice-dismiss'><span class='screen-reader-text'>Dismiss this notice.</span></button></div>" );
								}
							}
						);
					}
				);
				var dateToday = new Date();
				$( "body" ).on(
					"focus",
					"#timer",
					function() {
						if ( ! $( this ).data( 'xdsoft_datetimepicker' )) {
							$( this ).datetimepicker(
								{
									onGenerate: function() {
										if ( ! $( this ).hasClass( 'initial' )) {
											$( this ).addClass( 'initial' ).triggerHandler( 'open.xdsoft' );
										}
									},minDate: dateToday
								}
							);
						}
					}
				);

				$( document ).find( "#upload" ).click(
					function(){
						var formfieldID = $( this ).prev().attr( 'id' );
						var formfieldID2 = $( this ).next().attr( 'id' );
						var  upload_image_button = true;
						tb_show( '', 'media-upload.php?type=image&TB_iframe=true' );

						if (upload_image_button == true) {
							window.send_to_editor = function(html) {
								console.log( html );
								var imgurl = jQuery( html ).attr( 'src' );
								var html = jQuery( html ).attr( 'height','100px' );
								html = jQuery( html ).attr( 'width','100px' );
								$( '#' + formfieldID2 ).html( html );
								jQuery( "#" + formfieldID ).val( imgurl );
								tb_remove();
							}
						}
						upload_image_button = false;
					}
				);

				$( '#demo' ).on(
					'click',
					'.notice-dismiss',
					function(){
						$( this ).parents( '.notice-success' ).hide();
					}
				);
		}
	);

})( jQuery );
