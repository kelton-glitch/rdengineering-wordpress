<?php
	// Getting data of the  Facts in Digits box
	global $ts_global_ptbox_element_values;
	
	if( is_array($ts_global_ptbox_element_values) ) :
		//var_dump ($ts_global_ptbox_element_values);
	
?>


<div class="ts-ptablebox ts-ptablebox-<?php echo themestek_sanitize_html_classes($ts_global_ptbox_element_values['boxstyle']); ?> <?php echo themestek_sanitize_html_classes($ts_global_ptbox_element_values['main-class']); ?>">
	
	<?php echo themestek_wp_kses($ts_global_ptbox_element_values['featured_text']); ?>
	
	<div class="themestek-ptable-main">
		<div class="themestek-ptable-icon">
			<?php echo themestek_wp_kses($ts_global_ptbox_element_values['icon_html']); ?>
		</div>
		
		<h3 class="themestek-ptable-heading"><?php echo esc_attr($ts_global_ptbox_element_values['heading']); ?></h3>
		<div class="themestek-sep"></div>
		
		<div class="themestek-ptable-price-w">
			<?php echo themestek_wp_kses($ts_global_ptbox_element_values['cur_symbol_before']); ?>
			<?php echo themestek_wp_kses($ts_global_ptbox_element_values['price']); ?>
			<?php echo themestek_wp_kses($ts_global_ptbox_element_values['cur_symbol_after']); ?>		
			<div class="themestek-ptable-frequency"><?php echo esc_attr($ts_global_ptbox_element_values['price_frequency']); ?></div>
		</div>
	</div>
	
	<div class="ts-ptablebox-colum ts-ptablebox-featurebox">
		<?php echo themestek_wp_kses($ts_global_ptbox_element_values['lines_html']); ?>
	</div>
	
	<?php if( !empty($ts_global_ptbox_element_values['btn_title']) ){ ?>
		<?php echo do_shortcode('[ts-btn color="inverse" title="'. esc_attr($ts_global_ptbox_element_values['btn_title']).'" link="'.esc_attr($ts_global_ptbox_element_values['btn_link']).'"]'); ?>
	<?php } else {
	 echo themestek_wp_kses($button); 
	} ?>
	
</div>



<?php
	endif;
	
?>