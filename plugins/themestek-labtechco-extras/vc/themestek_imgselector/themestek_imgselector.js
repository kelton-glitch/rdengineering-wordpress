/*
function themestek_imgselector_callback(){
	jQuery('.themestek_imgselector').change(function() {      // When arrow is clicked
		var currval = jQuery(this).val();
		var wrapper = jQuery(this).parent();
		jQuery( '.ts-imgselector-thumb', wrapper).removeClass('ts-imgselector-thumb-selected');
		jQuery( '.ts-imgselector-thumb-'+currval, wrapper).addClass('ts-imgselector-thumb-selected');
	});
};
themestek_imgselector_callback();
*/	


function themestek_imgselector_click(){
	jQuery('.ts-imgselector-thumb').each(function(){
		var $this = jQuery(this);
		
		jQuery($this).on( 'click', function(){
			
			var currval = jQuery(this).data('value');
			var wrapper = jQuery(this).closest('.ts-imgselector-main-wrapper');
			
			jQuery( '.ts-imgselector-thumb', wrapper).removeClass('ts-imgselector-thumb-selected');
			jQuery( '.ts-imgselector-thumb-'+currval, wrapper).addClass('ts-imgselector-thumb-selected');
			
			jQuery( 'select', wrapper).val(currval).trigger('change');
			
			
		});
		
	});
	
	
};
themestek_imgselector_click();