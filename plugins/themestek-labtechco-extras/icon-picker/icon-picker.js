
/**
 *  ThemeStek icon picker
 */
function tste_inducstco_icon_picker(){
	
	if( jQuery('.themestek-iconpicker-wrapper').length > 0 ){
		
		jQuery('.themestek-iconpicker-wrapper').each(function(){
			
			var mainwrapper = jQuery(this);
			
			// checking if iconpicker already applied
			if( jQuery('.themestek-iconpicker-list', mainwrapper ).hasClass('iconpicker') == false ){
				
				// check if click applied
				if( !jQuery( '.ts-ipicker-selector-button', mainwrapper ).hasClass('ts_click_applied') ){
					
					jQuery( '.ts-ipicker-selector-button', mainwrapper ).on('click', function(){
						
						var $btn = jQuery(this);
						if( jQuery( '.themestek-iconpicker-list-w', mainwrapper ).css('display')=='none' ){
							
							
							// Apply iconpicker() on click so it will not load the page
							if( !jQuery('.themestek-iconpicker-list', mainwrapper ).hasClass('iconpicker') ){
								
								jQuery('.themestek-iconpicker-list', mainwrapper ).iconpicker({
									align: 'left', // Only in div tag
									arrowPrevIconClass: 'fa fa-chevron-left',
									arrowNextIconClass: 'fa fa-chevron-right',
									cols: 8,
									icon: jQuery('.themestek-iconpicker-list', mainwrapper ).data('icon'),
									iconset: jQuery('.themestek-iconpicker-list', mainwrapper ).data('iconset'),
									rows: 5
								});
								jQuery('.themestek-iconpicker-list', mainwrapper ).on('change', function(e) {
									jQuery('.ts-ipicker-selected-icon i',mainwrapper).removeClass().addClass( e.icon );
									jQuery('.themestek-iconpicker-input',mainwrapper).val(e.icon);
								});
								
								// Tooltip
								/*
								jQuery('table.table-icons button.btn.btn-icon').each( function(){
									if( jQuery('span.ts-icon-tooltip', jQuery(this)).length==0 ){
										var thisicon = jQuery( this ).html();
										jQuery( this ).append( jQuery( '<span class="ts-icon-tooltip">' + thisicon + '</span>' ) );
									}
								});
								
								
								jQuery( 'table.table-icons button.btn.btn-icon' ).on( "mouseenter mouseleave", function( event ) {
									jQuery( 'span.ts-icon-tooltip', this ).toggleClass( "ts-tooltip-active" );
								});
								*/
								
								
								
							}
							
							jQuery( '.themestek-iconpicker-list-w', mainwrapper ).slideDown();
							jQuery( '.ts-ipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-down').addClass('fa-arrow-up');
						} else {
							jQuery( '.themestek-iconpicker-list-w', mainwrapper ).slideUp();
							jQuery( '.ts-ipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-up').addClass('fa-arrow-down');
						}
						return false;
					});
					
					
					// adding class so no other click applied
					jQuery( '.ts-ipicker-selector-button', mainwrapper ).addClass('ts_click_applied');
					
				}
			
			
				
				// close when click outside
				jQuery(document).on('click', function(event) { 
					if(!jQuery(event.target).closest('.themestek-iconpicker-list-w', mainwrapper ).length) {
						if(jQuery('.themestek-iconpicker-list-w', mainwrapper).is(":visible")) {
							//jQuery('.themestek-iconpicker-list-w', mainwrapper).slideUp();
							jQuery( '.ts-ipicker-selector-button', mainwrapper ).trigger('click');
						}
					}
				});
				
			}
			
		});
		
		
		
		
		
		jQuery('.ts-ipicker-selector-w' ).each(function(){
			
			// specially for CodeStar element only
			if( jQuery('.themestek-iconpicker-element').length > 0 ){
				jQuery('.themestek-iconpicker-element').each(function(){
					var wrapper2 = jQuery(this);
					jQuery('.ts-iconpicker-library-selector', wrapper2 ).on('change', function(e){
						
						var curr_library = jQuery('.ts-iconpicker-library-selector', wrapper2).val();
						
						jQuery('.themestek-iconpicker-wrapper', wrapper2).each(function(){
							jQuery(this).hide();
							jQuery('.themestek-iconpicker-wrapper.ts-iconpicker-'+curr_library, wrapper2).show();
						});
						
					});
					
				});
			};
			
			
			
		});

	}
}







/**
 *  Document Ready Init
 */
jQuery(document).ready( function() {
	
	// Icon picker in CodeStar framework
	tste_inducstco_icon_picker();
	
	// When clicking on add group button and the group contains icon picker in it. Specially created for Portfolio List
	jQuery('.cs-field-group').each(function(){
		var groups = jQuery(this);
		jQuery( '.cs-add-group', groups ).on('click', function(){
			setTimeout(function(){
				jQuery('.cs-group:last-child .themestek-iconpicker-list', groups ).removeClass('iconpicker');
				jQuery('.cs-group:last-child .ts-ipicker-selector-button', groups ).removeClass('ts_click_applied');
				tste_inducstco_icon_picker();
			}, 10);
		});
	});
	
});
	