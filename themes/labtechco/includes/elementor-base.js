jQuery( window ).load(function() {
	elementor.hooks.addAction( 'panel/open_editor/section', function( panel, model, view ) {
		
		jQuery(document).on('change', 'input[data-setting="ts-extended-column"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[data-setting="ts-strech-content-left"], input[data-setting="ts-strech-content-right"]', function(e) {
			setTimeout(function(){
				jQuery('#elementor-preview-iframe')[0].contentWindow.ts_rearrange_stretched_col( model.id );
			}, 200);
		});

	});

	// image element custom size. Missing "width" and "height" attributes
	elementorFrontend.hooks.addAction( 'frontend/element_ready/image.default', function( $scope ) {
		var image_ele = jQuery( '.elementor-widget-container img', $scope);
		var ele_width	= jQuery(image_ele).attr("width");
		var ele_height	= jQuery(image_ele).attr("height");
		var ele_url		= jQuery(image_ele).attr("src");
		if ( ( typeof ele_width === 'undefined' || ele_width === false ) || ( typeof ele_height === 'undefined' || ele_height === false ) ) {
			jQuery("<img/>").attr('src', ele_url).on('load', function() {
				jQuery(image_ele).attr( 'width', this.width );
				jQuery(image_ele).attr( 'height', this.height );
			});
		}
	} );


	elementor.hooks.addAction( 'panel/open_editor/column', function( panel, model, view ) {
		setTimeout(function(){
			jQuery('.elementor-component-tab > a').on('click',function(){
				setTimeout(function(){
					jQuery('input[data-setting="ts-extended-column"], input[data-setting="ts-strech-content-left"], input[data-setting="ts-strech-content-right"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[type=radio]').on('change', function(){
						setTimeout(function(){
							jQuery('#elementor-preview-iframe')[0].contentWindow.ts_rearrange_stretched_col( model.id );
						}, 200);
					});
					jQuery('label[for="elementor-control-classic"]').on('click', function(){
						jQuery('#elementor-preview-iframe')[0].contentWindow.ts_rearrange_stretched_col( model.id );
					});
				}, 500);
			})
		 }, 500);
	});

});