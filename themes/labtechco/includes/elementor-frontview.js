jQuery( window ).on( 'elementor/frontend/init', function() {
	if (typeof themestek_carousel !== "function"){ return; }
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_blog_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_portfolio_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_service_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_team_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_testimonial_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_client_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_staticbox_element.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_multiple_icon_heading.default', function($scope, $){ themestek_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/ts_fid_element.default', function($scope, $){ labtechco_circle_progressbar(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/global', function( $scope, $ ) {
		setTimeout(function(){
			ts_rearrange_stretched_col( $scope[0].dataset.id );
			ts_bgimage_class();
			ts_bgcolor_class();
		}, 200);
	} );

} );

