/**
 *  Admin custom JS file
 */

"use strict";
 
// Header Style - Change options based on selected header style on click 
function ts_header_style_change_triggers(){
	
	// Default value
	var mainmenufont_color					= '#031b4e';
	var mainmenu_active_link_color			= 'skin';
	var mainmenu_active_link_custom_color	= '#ffffff';
	var header_height						= '105';
	var titlebar_height						= '200';
	var header_menu_position				= 'right';
	var topbar_bg_color						= 'darkgrey';
	var topbar_text_color					= 'white';

	jQuery('input[name="labtechco_theme_options[headerstyle]"]').change(function() {
		if (this.value == '1') {
			
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6');  // 
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').val(mainmenu_active_link_custom_color).change();

			jQuery('input[name="labtechco_theme_options[header_height]"]').val(header_height);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val(titlebar_height);
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val(topbar_text_color).change();

			themestek_change_logo();
			themestek_change_sticky_logo();
			
		} else if (this.value == '2') {
			
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6'); 
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').val(mainmenu_active_link_custom_color).change();

			jQuery('input[name="labtechco_theme_options[header_height]"]').val('130');
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('250');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val(topbar_text_color).change();
			
			themestek_change_logo();
			themestek_change_sticky_logo();
			
		} else if (this.value == '3') {

			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6'); 
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').val(mainmenu_active_link_custom_color).change();

			jQuery('input[name="labtechco_theme_options[header_height]"]').val(header_height);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('700');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val('center').change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val(topbar_text_color).change();
			
			themestek_change_logo( 'logo-white.png' );
			themestek_change_sticky_logo( 'logo.png' );

		} else if (this.value == '4') {

			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6'); 
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').val(mainmenu_active_link_custom_color).change();

			jQuery('input[name="labtechco_theme_options[header_height]"]').val(header_height);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val(titlebar_height);
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', true);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('white').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('dark').change();

			themestek_change_logo();
			themestek_change_sticky_logo();

		} else if (this.value == '5') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6'); 
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', 'rgba(255,255,255,0.90)');  // 
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[header_height]"]').val(header_height);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('400');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', true);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo( 'logo-white.png' );
			themestek_change_sticky_logo( 'logo.png' );
		
		} else if (this.value == '6') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6'); 
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', 'rgba(255,255,255,0.90)');  // 
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('85');
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('200');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', true);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo();
			themestek_change_sticky_logo();
		
		} else if (this.value == '7') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#3368c6');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', '#fff');  // 
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('135');
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('400');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo( 'logo-white.png' );
			themestek_change_sticky_logo( 'logo.png' );
		
		} else if (this.value == '8') {
			
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#41a147');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', '#000014');  // 
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('135');
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('200');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);

			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val(topbar_bg_color).change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val(topbar_text_color).change();
			
			themestek_change_logo();
			themestek_change_sticky_logo();
			
		} else if (this.value == '9') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#ea130e');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', 'rgba(255,255,255,0.90)');  // 
			jQuery('input[name="labtechco_theme_options[infostack_left_text]"]').val('<ul class="top-contact"><li><i class="ts-labtechco-icon-phone"></i>+8 (123) 985 789</li><li><i class="ts-labtechco-icon-mail-alt"></i><a href="#">Info@Alphabet.com</a></li></ul>');
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('135');
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('200');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo();
			themestek_change_sticky_logo();
		
		} else if (this.value == '10') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#f26a62');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#031b4e');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', 'rgba(255,255,255,0.90)');  // 
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('105');
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('450');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo();
			themestek_change_sticky_logo();
		
		} else if (this.value == '11') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#2a65c1');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#ffffff');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val('custom').change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', '#ffffff');  // 
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('105');
			jQuery('input[name="labtechco_theme_options[sticky_header]"]').prop('checked', false);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('450');
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo( 'logo-white.png' );
			themestek_change_sticky_logo( 'logo.png' );
		
		} else if (this.value == '12') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#2a65c1');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#141570');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', '#ffffff');  // 
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('110');
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('').change();
			jQuery('input[name="labtechco_theme_options[sticky_header]"]').prop('checked', false);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('300');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo();
			themestek_change_sticky_logo();
		
		} else if (this.value == '13') {

			/*  NEW  */
			jQuery('input[name="labtechco_theme_options[skincolor]"]').iris('color', '#2a65c1');
			jQuery('input[name="labtechco_theme_options[mainmenufont][color]"').iris('color', '#141570');  // 
			jQuery('select[name="labtechco_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change();
			jQuery('input[name="labtechco_theme_options[mainmenu_active_link_custom_color]"]').iris('color', '#ffffff');  // 
			jQuery('input[name="labtechco_theme_options[header_height]"]').val('110');
			jQuery('select[name="labtechco_theme_options[header_bg_color]"]').val('white').change();
			jQuery('input[name="labtechco_theme_options[sticky_header]"]').prop('checked', false);
			jQuery('input[name="labtechco_theme_options[titlebar_height]"]').val('450');
			jQuery('input[name="labtechco_theme_options[header_search]"]').prop('checked', true);
			jQuery('select[name="labtechco_theme_options[header_menu_position]"]').val(header_menu_position).change();
			jQuery('input[name="labtechco_theme_options[show_topbar]"]').prop('checked', false);
			jQuery('select[name="labtechco_theme_options[topbar_bg_color]"]').val('skincolor').change();
			jQuery('select[name="labtechco_theme_options[topbar_text_color]"]').val('white').change();

			themestek_change_logo();
			themestek_change_sticky_logo();
		
		}

	});
}
 
function themestek_change_logo( logo='logo.png' ){
	var curr_url     = location.href;
	var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
	var inputele_val = jQuery('input[name="labtechco_theme_options[logoimg][full-url]"]').val();
	var parentele    = jQuery('input[name="labtechco_theme_options[logoimg][full-url]"]').closest('.cs-fieldset');
	var newimgsrc    = root_url + 'wp-content/themes/labtechco/images/' + logo;
	
	if( inputele_val == root_url + 'wp-content/themes/labtechco/images/logo.png' || inputele_val == root_url + 'wp-content/themes/labtechco/images/logo-white.png' ){
		// do change
		jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
		jQuery( 'input[name="labtechco_theme_options[logoimg][thumb-url]"]' ).attr( 'value', newimgsrc );
		jQuery( 'input[name="labtechco_theme_options[logoimg][full-url]"]' ).attr(  'value', newimgsrc );
	}
	
}

function themestek_change_sticky_logo( logo='' ){
	
	console.log('CHANGED HEADER');
	console.log( logo );
	
	var parentele    = jQuery('input[name="labtechco_theme_options[logoimg_sticky][full-url]"]').closest('.cs-fieldset');
	
	if( logo!='' ){
		
		var curr_url     = location.href;
		var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
		var inputele_val = jQuery('input[name="labtechco_theme_options[logoimg_sticky][full-url]"]').val();
		
		var newimgsrc    = root_url + 'wp-content/themes/labtechco/images/' + logo;
		
		if( inputele_val == root_url + 'wp-content/themes/labtechco/images/logo.png' || inputele_val == root_url + 'wp-content/themes/labtechco/images/logo-white.png' || inputele_val=='' ){
			// do change
			jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
			jQuery( 'input[name="labtechco_theme_options[logoimg_sticky][thumb-url]"]' ).attr( 'value', newimgsrc );
			jQuery( 'input[name="labtechco_theme_options[logoimg_sticky][full-url]"]' ).attr(  'value', newimgsrc );
		}
		
	} else {
		
		// do change
		jQuery( '.cs-remove', parentele ).trigger('click');
		
	}
	
}

function themestek_change_titlebar_bgimage( imagesrc='titlebar-bg.jpg' ){
	var curr_url     = location.href;
	var root_url     = curr_url.replace("wp-admin/admin.php?page=themestek-theme-options", "");
	var inputele_val = jQuery('input[name="labtechco_theme_options[titlebar_background][image]"]').val();
	var parentele    = jQuery('input[name="labtechco_theme_options[titlebar_background][image]"]').closest('.cs-fieldset');
	var newimgsrc    = root_url + 'wp-content/themes/labtechco/images/' + imagesrc;
	
	console.log(inputele_val);
	console.log(root_url + 'wp-content/themes/labtechco/images/titlebar-bg.jpg');
	
	if( inputele_val == root_url + 'wp-content/themes/labtechco/images/titlebar-bg.jpg' || inputele_val == root_url + 'wp-content/themes/labtechco/images/titlebar-overlay-bg.jpg' ){
		// do change
		
		console.log( jQuery( '.cs-preview img', parentele ).attr('src' ) );
		jQuery( '.cs-preview img', parentele ).attr('src', newimgsrc );
		console.log( jQuery( '.cs-preview img', parentele ).attr('src' ) );
		
		jQuery( 'input[name="labtechco_theme_options[titlebar_background][image]"]' ).attr( 'value', newimgsrc );
		//jQuery( 'input[name="labtechco_theme_options[logoimg][full-url]"]' ).attr(  'value', newimgsrc );
	}
	
}

/**
 *  Codestar Framework : themestek_background JS
 */
jQuery.fn.TS_CSFRAMEWORK_BG_IMAGE_UPLOADER = function($) {
    return this.each(function() {

	var $this      = jQuery(this),
		$add       = $this.find('.cs-add'),
		$preview   = $this.find('.cs-image-preview'),
		$noimgtext = $this.find('.ts-cs-background-heading-noimg'),
		$closeicon = $this.find('.ts-cs-remove'),
		$remove    = $this.find('.cs-remove'),
		$input     = $this.find('input.ts-background-image'),
		$inputid   = $this.find('input.ts-background-imageid'),
		$img       = $this.find('img'),
		$btntitleadd    = $this.find('.ts-cs-background-text-add-image').text(),
		$btntitlechange = $this.find('.ts-cs-background-text-change-image').text(),
		wp_media_frame;

      $add.on('click', function( e ) {

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

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;

          $img.removeClass('hidden');
		  $closeicon.removeClass('hidden');
		  $noimgtext.addClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.url ).trigger('change');
		  $inputid.val( attachment.id ).trigger('change');
			$add.text($btntitlechange);
        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$inputid.val('').trigger('change');
        $img.addClass('hidden');
		$closeicon.addClass('hidden');
		$noimgtext.removeClass('hidden');
		$add.text($btntitleadd);
      });

    });

  };

/**
 *  Codestar Framework : themestek_typography JS
 */
  jQuery.fn.TS_CSFRAMEWORK_TYPOGRAPHY = function() {
    return this.each( function() {

      var typography      = jQuery(this),
          family_select   = typography.find('.cs-typo-family'),
          variants_select = typography.find('.cs-typo-variant'),
          typography_type = typography.find('.cs-typo-font');

      family_select.on('change', function() {

        var _this     = jQuery(this),
            _type     = _this.find(':selected').data('type') || 'custom',
            _variants = _this.find(':selected').data('variants');

        if( variants_select.length ) {

          variants_select.find('option').remove();

          jQuery.each( _variants.split('|'), function( key, text ) {
            variants_select.append('<option value="'+ text +'">'+ text +'</option>');
          });

          variants_select.find('option[value="regular"]').attr('selected', 'selected').trigger('chosen:updated');

        }

        typography_type.val(_type);

      });

    });
  };
  
/**
 *  themestek_image 
 */
  jQuery.fn.TS_CSFRAMEWORK_IMAGE_UPLOADER = function() {
    return this.each(function() {

      var $this     = jQuery(this),
          $add      = $this.find('.cs-add'),
          $preview  = $this.find('.cs-image-preview'),
          $remove   = $this.find('.cs-remove'),
          $input    = $this.find('input.ts-cs-imgid'),
		  $thumbimg = $this.find('input.ts-cs-thumburl'),
		  $fullimg  = $this.find('input.ts-cs-fullurl'),
          $img      = $this.find('img'),
          wp_media_frame;

      $add.on('click', function( e ) {

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

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
		  var fullimg    = ( typeof attachment.sizes.full.url !== 'undefined' ) ? attachment.sizes.full.url : '';

          $preview.removeClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.id ).trigger('change');
		  $fullimg.val( fullimg ).trigger('change');
		  $thumbimg.val( thumbnail ).trigger('change');

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$fullimg.val('').trigger('change');
		$thumbimg.val('').trigger('change');
        $preview.addClass('hidden');
      });

    });

  };
  
/**
 *  Titlebar text custom color show/hide
 */ 
function ts_show_hide_titlebar_textcolor(){
	
	var $this      = jQuery( 'select[name="labtechco_theme_options[titlebar_text_color]"]' );
	var $page_this = jQuery( 'select[name="_themestek_metabox_group[titlebar_text_color]"]' );
	
	if( $this.length > 0 ){
		if( jQuery($this).val()=='custom' ){
			jQuery( 'input[name="labtechco_theme_options[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="labtechco_theme_options[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="labtechco_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').show();
		} else {
			jQuery( 'input[name="labtechco_theme_options[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="labtechco_theme_options[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="labtechco_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
		}
	}
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themestek_metabox_group[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').show();
			
		} else {
			jQuery( 'input[name="_themestek_metabox_group[titlebar_heading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_subheading_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
			jQuery( 'input[name="_themestek_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.ts-typography-font-color-w').hide();
		}
	}
	
}
  
/**
 *  Titlebar bg custom color show/hide
 */ 
function ts_show_hide_titlebar_bgcolor(){
	
	var $page_this = jQuery( 'select[name="_themestek_metabox_group[titlebar_bg_color]"]' );
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_themestek_metabox_group[titlebar_background][color]"]' ).closest('.ts-background-color-w').show();
		} else {
			jQuery( 'input[name="_themestek_metabox_group[titlebar_background][color]"]' ).closest('.ts-background-color-w').hide();
		}
	}
	
}

/**
 *  This is for background with custom color dropdown.. This will will show/hide color picker from the background options.
 */
function themestek_show_hide_color_picker_background(){
	
	var items = [
		/* ['dropdown_id',         'background_id'], */
		['fbar_bg_color',          'fbar_background'],
		['titlebar_bg_color',      'titlebar_background'],
		['full_footer_bg_color',   'full_footer_bg_all'],
		['first_footer_bg_color',  'first_footer_bg_all'],
		['second_footer_bg_color', 'second_footer_bg_all'],
		['bottom_footer_bg_color', 'bottom_footer_bg_all']
	];
	
	jQuery(items).each(function(n,val){
		
		var dropdown_name   = val[0];
		var background_name = val[1];
		
		var $dropdown_element   = jQuery( 'select[name="labtechco_theme_options['+dropdown_name+']"]' );
		
		// show/hide the color picker on load
		if( $dropdown_element.val()=='custom' ){
			jQuery( 'input[name="labtechco_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').show();
		} else {
			jQuery( 'input[name="labtechco_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').hide();
		}
		
		// on change of the dropdown
		$dropdown_element.change(function() {  // Theme Options
			
			if( jQuery(this).val()=='custom' ){
				jQuery( 'input[name="labtechco_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').show();
			} else {
				jQuery( 'input[name="labtechco_theme_options['+background_name+'][color]"]' ).closest('.ts-background-color-w').hide();
			}
		});
		
	});
	
}

/**
 *  Blog Post Format - Move the Gallery Meta Box to the Gallery Tab content so user can select images directly from Gallery tab.
 */
function themestek_gallery_post_format(){
	// moving the gallery meta box after the gallery box
	jQuery("#cfpf-format-gallery-preview").after( jQuery("#_themestek_metabox_gallery") );
	
	// hide all box by defualt
	jQuery("#_themestek_metabox_gallery").hide();
	
	jQuery("#cfpf-format-gallery-preview").hide();
	jQuery( '#cfpf-format-gallery-preview > label' ).hide();
	jQuery( '#cfpf-format-gallery-preview > .cfpf-gallery-options' ).hide();
	
	// show/hide if gallery post format
	if( jQuery('input[name="post_format"]:checked').val() == 'gallery' ){
		jQuery("#_themestek_metabox_gallery").show();
	}
	
	jQuery('input[name="post_format"]').change(function() {
		console.log( 'Changed: ' + this.value );
		
		if( this.value == 'gallery' ){
			jQuery("#_themestek_metabox_gallery").show();
		} else {
			jQuery("#_themestek_metabox_gallery").hide();
		}
		
	});

}


var tste_kirki_bg_color_show_hide = function(){
	jQuery('.accordion-section').on('click', function(){
		setTimeout(function(){
			jQuery('li.customize-control.customize-control-kirki-background' ).each(function(){
				var this_bg_ele = jQuery(this);
				var selected = '';
				if( jQuery(this).prev().hasClass('customize-control-kirki-radio-image') ){
					selected = jQuery('input.image-select:checked',  jQuery(this).prev() ).val() ; 
					if ( selected ) {
						if( selected == 'custom' ) {
							jQuery( '.background-color', this_bg_ele ).show();
						} else {
							jQuery( '.background-color', this_bg_ele ).hide();
						}
					}
				}
			});
		}, 100);
	});
}

function labtechco_tsw_redirect(){
	if( jQuery("#pbmit-redirecting-message").length > 0 && jQuery("#pbmit-redirecting-message").data('redirect') != '' ){
		window.location.href = jQuery("#pbmit-redirecting-message").data('redirect');
	}
}


/**
 *  Document Ready Init
 */
jQuery(document).ready( function() {

	tste_kirki_bg_color_show_hide();

	labtechco_tsw_redirect();
	
	// stickey header in theme options
	jQuery(".cs-header").stick_in_parent();
	
	// CS custom elements
	jQuery('.cs-field-themestek_background', this).TS_CSFRAMEWORK_BG_IMAGE_UPLOADER();
	jQuery('.cs-field-themestek_typography', this).TS_CSFRAMEWORK_TYPOGRAPHY();
	jQuery('.cs-field-themestek_image', this).TS_CSFRAMEWORK_IMAGE_UPLOADER();
	
	// Titlebar Text Color - Show / Hide color for Text color option
	ts_show_hide_titlebar_textcolor();
	jQuery( 'select[name="labtechco_theme_options[titlebar_text_color]"]' ).change(function() {  // Theme Options
		ts_show_hide_titlebar_textcolor();
	});
	jQuery( 'select[name="_themestek_metabox_group[titlebar_text_color]"]' ).change(function() {  // Page Meta Box Option
		ts_show_hide_titlebar_textcolor();
	});
	
	// Titlebar BG Color - Show / Hide color for bg color option
	ts_show_hide_titlebar_bgcolor()
	jQuery( 'select[name="_themestek_metabox_group[titlebar_bg_color]"]' ).change(function() {  // Page Meta Box Option
		ts_show_hide_titlebar_bgcolor();
	});
	
	/**
	 *  Codestar Framework : themestek_skin_color JS
	 */
	jQuery('.cs-field-themestek_skin_color').each(function(){
		var $this = jQuery(this);
		jQuery( '.themestek-skin-color-list a', $this ).on('click', function() {
			var color = jQuery(this).css('background-color');
			jQuery('.wp-color-picker', $this ).iris('color', color);
			return false;
		});
	});
	
	/**
	 *  Add class in page loading option
	 */
	 
	jQuery('*[data-depend-id="loaderimg_1"]').closest('.cs-field-image-select').addClass('ts-pre-loader-option-wrapper');
	jQuery('input[type=radio][name="labtechco_theme_options[loaderimg]"]:checked').closest('label').addClass('ts-pre-loader-option-selected');
	jQuery('input[type=radio][name="labtechco_theme_options[loaderimg]"]').change(function() {
		jQuery('input[type=radio][name="labtechco_theme_options[loaderimg]"]').closest('label').removeClass('ts-pre-loader-option-selected');
		jQuery(this).closest('label').addClass('ts-pre-loader-option-selected');
		return true;
	});
	
	// Post formats - Move Gallery meta box in Gallery tab 
	themestek_gallery_post_format();
	
	/**
	 *  Icon picker init on adding new group in TS Progress Bar
	 */
	if ( typeof vc != 'undefined' && typeof vc.atts != 'undefined' ) {
		vc.atts.themestek_iconpicker = {
			init: function ( param, $wrapper ) {
				if (typeof tste_inducstco_icon_picker != 'undefined') {
					tste_inducstco_icon_picker();
				}
			}
		};
	}
	
	// on ajax complete
	jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
		if (typeof tste_inducstco_icon_picker != 'undefined') {
			tste_inducstco_icon_picker();
		}
	});
	
	/* For all background options - linking dropdown with all color picker for CUSTOM option.. so the color picker will be visiable only when custom color is selected */
	themestek_show_hide_color_picker_background();
	
});  // document.ready

/**
 *  Window Load init
 */
jQuery( window ).on( 'load', function() {
	
	// Header Styles - change values of some options on change of the header style
	ts_header_style_change_triggers();
	
	// Post formats - Open Gallery meta box if closed
	if( jQuery(".js #_themestek_metabox_gallery").hasClass('closed') ){
		jQuery(".js #_themestek_metabox_gallery button.handlediv").trigger('click');
	}
	
	// Codestar - Remove DISABLED and adding READONLY to the export textarea
	jQuery('textarea[name="_nonce"]').prop("readonly", true);
	jQuery('textarea[name="_nonce"]').removeAttr('disabled');

});  // window.load
