<?php
	// Getting data of the  Facts in Digits box
	global $ts_global_sbox_element_values;
	
	if( is_array($ts_global_sbox_element_values) ) :
	
?>


<div class="ts-ihbox ts-ihbox-<?php echo themestek_sanitize_html_classes($ts_global_sbox_element_values['boxstyle']); ?> <?php echo themestek_sanitize_html_classes($ts_global_sbox_element_values['main-class']); ?>">
	<div class="ts-sbox-bgimage-layer ts-bgimage-layer"></div>
	<div class="ts-ihbox-wrapper-bg-layer ts-bg-layer"></div>
	
	<div class="ts-ihbox-inner">
		<div class="ts-ihbox-icon ts-large-icon ts-icon-skincolor">
			<?php echo themestek_wp_kses($ts_global_sbox_element_values['icon_html'], 'sbox_icon'); ?>
		</div>
		<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 200 200">
			<defs>
				<path d="M0, 100a100, 100 0 1, 0 200, 0a100, 100 0 1, 0 -200, 0" id="txt-path"></path>
			</defs>
			<text>
				<textPath startOffset="0" xlink:href="#txt-path"><?php echo esc_html( strip_tags($ts_global_sbox_element_values['heading_html']) )  ?></textPath>
			</text>
		</svg>
	</div>	
</div>

<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$ts_global_sbox_element_values = '';
?>