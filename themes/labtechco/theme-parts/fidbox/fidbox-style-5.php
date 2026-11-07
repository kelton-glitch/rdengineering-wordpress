<?php
	// Getting data of the  Facts in Digits box
	global $ts_global_fid_element_values;
	
	if( is_array($ts_global_fid_element_values) ) :
	
?>


<div class="ts-fid inside ts-fid-boxstyle-without-icon <?php echo themestek_sanitize_html_classes($ts_global_fid_element_values['main-class']); ?>">
	<div class="ts-fld-contents">
		<h3 class="ts-fid-inner">
			<?php echo themestek_wp_kses($ts_global_fid_element_values['before_text']); ?>
			<span
				data-appear-animation = "animateDigits"
				data-from             = "0"
				data-to               = "<?php echo esc_attr($ts_global_fid_element_values['digit']); ?>"
				data-interval         = "<?php echo esc_attr($ts_global_fid_element_values['interval']); ?>"
				>
					<?php echo esc_attr($ts_global_fid_element_values['digit']); ?>
			</span>
			<?php echo themestek_wp_kses($ts_global_fid_element_values['after_text']); ?>
		</h3>
		<h6 class="ts-fid-title"><span><?php echo esc_attr($ts_global_fid_element_values['title']); ?><br></span></h6>
	</div><!-- .ts-fld-contents -->
</div>



<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$ts_global_fid_element_values = '';
?>