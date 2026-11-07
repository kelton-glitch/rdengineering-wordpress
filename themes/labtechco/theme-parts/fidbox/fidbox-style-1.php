<?php
	// jquery circle progress bar library
	wp_enqueue_script('jquery-circle-progress');
	
	// Getting data of the  Facts in Digits box
	global $ts_global_fid_element_values;
	
	if( is_array($ts_global_fid_element_values) ) :
		
		// Getting skin color
		global $labtechco_theme_options;
		$skincolor = ( !empty($labtechco_theme_options['skincolor']) ) ? $labtechco_theme_options['skincolor'] : '#78c63e' ;
		
?>


<div class="ts-fid inside ts-fid-boxstyle-style1 <?php echo themestek_sanitize_html_classes($ts_global_fid_element_values['main-class']); ?>">
	
	<div class="ts-fld-contents">
		<div class="ts-circle-outer"
			data-digit			= "<?php echo esc_attr($ts_global_fid_element_values['digit']); ?>"
			data-fill			= "<?php echo esc_attr($skincolor); ?>"
			data-before			= "<?php echo esc_attr($ts_global_fid_element_values['before_text']); ?>"
			data-before-type	= "<?php echo esc_attr($ts_global_fid_element_values['beforetextstyle']); ?>"
			data-after			= "<?php echo esc_attr($ts_global_fid_element_values['after_text']); ?>"
			data-after-type		= "<?php echo esc_attr($ts_global_fid_element_values['aftertextstyle']); ?>"
			data-size			= "122"
			data-emptyfill		= "#000005"
			data-thickness		= "7"
			data-gradient		= ""
			>
			<div class="ts-circle-w">
				<div class="ts-circle"></div>
				<div class="ts-circle-overlay">
					<div class="ts-circle-number"></div>
				</div>
			</div>
			<div class="ts-fid-title-w">
				<h3 class="ts-fid-title"><span><?php echo esc_attr($ts_global_fid_element_values['title']); ?><br></span></h3>
			</div>
		</div>
	</div><!-- .ts-fld-contents -->
	
</div>

<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$ts_global_fid_element_values = '';
?>