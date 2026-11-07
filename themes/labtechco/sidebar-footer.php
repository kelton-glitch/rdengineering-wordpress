<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */
global $labtechco_theme_options;


?>

<div id="bottom-footer-text" class="bottom-footer-text ts-bottom-footer-text site-info <?php echo themestek_sanitize_html_classes(themestek_footer_row_class( 'bottom' )); ?>">
	<div class="bottom-footer-bg-layer ts-bg-layer"></div>
	<div class="<?php echo themestek_sanitize_html_classes(themestek_footer_container_class()); ?>">
		<div class="bottom-footer-inner">
			<div class="row multi-columns-row">
			
				<?php $left_content = themestek_get_option('footer_copyright_left'); ?>
				<?php $right_content = themestek_get_option('footer_copyright_right'); ?>
				<?php $footer_style = themestek_get_option('footer-style');?>
				
				<?php if( has_nav_menu('themestek-footer-menu') || !empty($right_content) ) : ?>
					<?php if($footer_style = '2'){ ?>
						<div class="col-xs-12 col-sm-7 <?php if(!empty($left_content)) { ?>ts-footer2-left <?php } ?>">
					<?php } else { ?>
						<div class="col-xs-12 col-sm-5 <?php if(!empty($left_content)) { ?>ts-footer2-left <?php } ?>">
					<?php } ?>
				<?php else : ?>
				<div class="col-xs-12 col-sm-12 <?php if(!empty($left_content)) { ?>ts-footer2-left <?php } ?>">
				<?php endif; ?>
					<?php if( !empty($left_content) ){ echo do_shortcode( $left_content ); } ?>
				</div><!-- footer left -->

				<?php if( has_nav_menu('themestek-footer-menu') ) : ?>
					<?php if($footer_style = '2'){ ?>
						<div class="col-xs-12 col-sm-5 ts-footer2-right">
							<?php wp_nav_menu( array( 'theme_location' => 'themestek-footer-menu', 'menu_class' => 'footer-nav-menu', 'container' => false ) ); ?>
						</div><!-- footer right --> 
					<?php } else { ?>
						<div class="col-xs-12 col-sm-7 ts-footer2-right">
							<?php wp_nav_menu( array( 'theme_location' => 'themestek-footer-menu', 'menu_class' => 'footer-nav-menu', 'container' => false ) ); ?>
						</div><!-- footer right --> 
					<?php }?>

				<?php else : ?>
					
					<?php if( !empty($right_content) ) : ?>
						<?php if($footer_style = '2'){ ?>
						<div class="col-xs-12 col-sm-5 ts-footer2-right">
							<?php $right_content = do_shortcode( $right_content ); ?>
							<?php echo themestek_wp_kses($right_content); ?>
						</div><!-- footer right --> 
						<?php } else { ?>
							<div class="col-xs-12 col-sm-7 ts-footer2-right">
								<?php $right_content = do_shortcode( $right_content ); ?>
								<?php echo themestek_wp_kses($right_content); ?>
							</div><!-- footer right -->
						<?php }?>
					<?php endif; ?>
				<?php endif; ?>

			</div><!-- .row.multi-columns-row --> 
		</div><!-- .bottom-footer-inner --> 
	</div><!--  --> 
</div><!-- .footer-text -->
