<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.








/**
 * Admin Enqueue scripts and styles
 */
function tste_labtechco_vc_templates_scripts_styles(){
	wp_register_script( 'tste-labtechco-vc-templates', THEMESTEK_LABTECHCO_URI . '/vc-templates/ts-custom-vc-templates.js' , array( 'jquery' ) );
	wp_register_style(  'tste-labtechco-vc-templates', THEMESTEK_LABTECHCO_URI . '/vc-templates/ts-custom-vc-templates.css' );
	
	wp_enqueue_script( 'tste-labtechco-vc-templates' );
	wp_enqueue_style( 'tste-labtechco-vc-templates' );
}
add_action( 'admin_enqueue_scripts', 'tste_labtechco_vc_templates_scripts_styles' );




// VC Load section templates
add_action( 'vc_load_default_templates_action', function() {
	
	include_once( THEMESTEK_LABTECHCO_DIR.'vc-templates/vc-templates-array.php' );
	$all_templates = TS_labtechco_templates::get();
	
	
	foreach ( $all_templates as $t ) {
		
		$section_list = '';
		if( is_array($t['section']) ){
			foreach( $t['section'] as $section ){
				$section_list .= sanitize_html_class( strtolower($section)). ' ' ;
			}
		} else {
			$section_list = sanitize_html_class(strtolower($t['section']));
		}
		
		// img
		$t['img'] = str_replace('.','_', $t['img']);
		
		$custom_class = 'ts-section-template ' . sanitize_html_class($t['img']) . ' ' . $section_list ;
		
		$data					= array();
		$data['name']			= $t['name'];
		$data['custom_class']	= $custom_class;
		$data['content']		= <<<CONTENT
{$t['content']}
CONTENT;

		vc_add_default_templates( $data );
	}
});








/**
 *
 * VC Templates Filters
 * 
 */

add_action( 'admin_footer', function() {
	
	
	include_once( THEMESTEK_LABTECHCO_DIR.'vc-templates/vc-templates-array.php' );
	$all_templates = TS_labtechco_templates::get();
	$filters_list = array();
	if( is_array($all_templates) ){
		foreach( $all_templates as $template ){
			if( is_array($template['section']) ){
				foreach( $template['section'] as $section ){
					$section_slug = sanitize_html_class( strtolower($section));
					$filters_list[ $section_slug ] = $section;
				}
			} else {
				$section_slug = sanitize_html_class( strtolower( $template['section'] ));
				$filters_list[ $section_slug ] = $template['section'];
			}
		}
	}
	

	array_unique($filters_list);
	
	
	
	
	
	?><ul class="ts_vc_filters hidden" data-tab-title="<?php esc_html_e( 'Premium Templates', 'codevz' ); ?>">
		
		<li data-filter="vc_ui-template" class="ts_active"><?php esc_html_e( 'All Templates', 'codevz' ); ?></li>
		
		<?php
		foreach( $filters_list as $filter_slug => $filter_name ){
			?>
			<li data-filter="<?php echo esc_html( $filter_slug ); ?>"><?php esc_html_e( $filter_name, 'codevz' ); ?></li>
		<?php } ?>
	
	</ul><?php
});

