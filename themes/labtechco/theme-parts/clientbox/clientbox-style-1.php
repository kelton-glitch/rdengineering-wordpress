<?php
global $ts_global_client_element_values;
$show_hover = ( !empty($ts_global_client_element_values['show_hover']) ) ? $ts_global_client_element_values['show_hover'] : 'yes' ;
$hover_img = themestek_client_hover_img();
?>
<div class="themestek-box themestek-box-client ts-clientbox-style-1 themestek-box-view-style1 themestek-client-box-view-style1 <?php if( $show_hover=='yes' && !empty($hover_img) ) { ?> themestek-clientbox-hover-exists <?php } ?>">
	<?php echo themestek_wp_kses(themestek_featured_image()); ?>
	<?php if( $show_hover=='yes' && !empty($hover_img) ) { echo themestek_wp_kses($hover_img); } ?>
</div>
