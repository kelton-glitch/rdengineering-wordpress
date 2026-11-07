jQuery( document ).ready(function($) {
	"use strict";
	
	jQuery( '#themestek_one_click_demo_import_btn, .ts-one-click-error-close' ).on('click', function() {
		
		if( !jQuery(this).hasClass('disabled') ){
			if( jQuery( '#import-demo-data-results-wrapper' ).css('display') == 'none' ){
				jQuery( '#import-demo-data-results-wrapper' ).slideDown();
				jQuery( '#themestek_one_click_demo_import_btn' ).addClass('disabled');
			} else {
				jQuery( '#import-demo-data-results-wrapper' ).slideUp();
				jQuery( '#themestek_one_click_demo_import_btn' ).removeClass('disabled');
			}
		}
		
		return false;
	});
	
	
});