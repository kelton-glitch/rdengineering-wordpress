// Tab click event
jQuery('.ts-css-editor-tab-w a').on('click', function(){
	var parentmain = jQuery(this).closest('.themestek-css-editor-w');
	var size = jQuery(this).data('ts-size');
	
	// change tab active
	jQuery('.ts-css-editor-tab-w li', parentmain ).removeClass('ts-css-editor-tab-active');
	jQuery('.ts-css-editor-tab-w a[data-ts-size="'+size+'"]', parentmain ).parent().addClass('ts-css-editor-tab-active');
	
	// change content active
	jQuery('.themestek-css-editor', parentmain).slideUp();
	jQuery('.themestek-css-editor-'+size, parentmain).slideDown();
});




jQuery( ".themestek-css-editor-w input[type='text']:not(.ts-main-value-input), .themestek-css-editor-w input[type='checkbox']" ).on( 'change', function() {
	var parentmain = jQuery(this).closest('.themestek-css-editor-w');
	var mainval    = '';
	
	
	jQuery( "input[type='text']:not(.ts-main-value-input), input[type='checkbox']", parentmain ).each(function() {
		if( jQuery(this).attr('type')=='checkbox' ){
			if( jQuery(this).is(':checked') ){
				mainval += 'colbreak_yes|';
			} else {
				mainval += 'colbreak_no|';
			}
		} else {
			mainval += jQuery(this).val() + '|';
		}
	});
	
	jQuery('input.ts-main-value-input', parentmain ).val( mainval );
	
});