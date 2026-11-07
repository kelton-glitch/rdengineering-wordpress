function themestek_imgselector_click(){
	
	jQuery('a.ts_gallery_widget_add_images').each(function(){
		var $this   = jQuery(this),
			$parent	= jQuery(this).closest('.ts_image_selector_w'),
			wp_media_frame;
		
		jQuery($this).on( 'click', function(e){
			e.preventDefault();
			
			
			
			// Check if the `wp.media.gallery` API exists.
			if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
			  return;
			}

			// If the media frame already exists, reopen it.
			if ( wp_media_frame ) {
			  wp_media_frame.open();
			  return;
			}
			
			// Create the media frame.
			wp_media_frame = wp.media({
			  library: {
				type: 'image'
			  }
			});

			// When an image is selected, run a callback.
			wp_media_frame.on( 'select', function() {
				
				var $img_w     = jQuery('div.gallery_widget_attached_images', $parent);
				var $img       = jQuery('div.gallery_widget_attached_images ul li img', $parent);
				var $input     = jQuery('.ts_gallery_widget_attached_image_val', $parent);
				
				var attachment = wp_media_frame.state().get('selection').first().attributes;
				var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
				var fullimg    = ( typeof attachment.sizes.full !== 'undefined' ) ? attachment.sizes.full.url : attachment.url;
				var img_id     = ( typeof attachment.id !== 'undefined' ) ? attachment.id : '' ;
				
				jQuery($img_w).show();  // show the image wrapper
				
				$img.removeClass('hidden');
				$img.attr('src', thumbnail);
				$newval = fullimg + '|' + thumbnail + '|' + img_id ;
				$input.val( $newval );
				
			});

			// Finally, open the modal.
			wp_media_frame.open();
			
		});
		
		// Remove image
		jQuery( '.ts_vc_icon-remove', $parent ).on( 'click', function(e){
			var $input     = jQuery('.ts_gallery_widget_attached_image_val', $parent);
			e.preventDefault();
			// Hide the image wrapper
			jQuery('.gallery_widget_attached_images', $parent).hide();
			jQuery($input).val('');
		});
		
		
		
		
	});
	
	
};
themestek_imgselector_click();