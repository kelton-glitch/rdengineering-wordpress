<?php
global $labtechco_theme_options;

$search_input     = ( !empty($labtechco_theme_options['search_input']) ) ? esc_attr($labtechco_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'labtechco');
$searchform_title = ( isset($labtechco_theme_options['searchform_title']) ) ? esc_attr($labtechco_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'labtechco');
$search_logo = ( !empty($labtechco_theme_options['logoimg_search']['full-url']) ) ? '<div class="ts-search-logo"><img src="' . esc_url($labtechco_theme_options['logoimg_search']['full-url']) . '" alt="' . esc_attr(get_bloginfo('name')) . '" /></div>' : '' ;
if( !empty($searchform_title) ){
	$searchform_title = '<div class="ts-form-title">' . $searchform_title . '</div>';
}


if( !empty( $labtechco_theme_options['header_search'] ) && $labtechco_theme_options['header_search'] == true ){
	?>

<div class="ts-search-overlay">
		<?php echo themestek_wp_kses($searchform_title); ?>		
		<div class="ts-icon-close"></div>
	<div class="ts-search-outer">
		<?php echo themestek_wp_kses($search_logo); ?>
		<form method="get" class="ts-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="ts-labtechco-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>
