<?php
$mailchimp_class = '';
global $ts_mainchimp_formrow;
if( !empty($ts_mainchimp_formrow) && $ts_mainchimp_formrow == 'yes' ){
	$mailchimp_class = 'ts-mailchimp-exists';
}
$footer_style  = themestek_get_option('footer-style');
if( !empty($footer_style) ){
	$mailchimp_class = 'ts-footer-style-'.$footer_style.'';
}
?>

				</div><!-- .site-content-inner -->
			</div><!-- .site-content -->
		</div><!-- .site-content-wrapper -->

		<footer id="colophon" class="site-footer <?php echo esc_attr($mailchimp_class); ?>">
			<div class="footer_inner_wrapper footer<?php echo themestek_sanitize_html_classes(themestek_footer_row_class( 'full' )); ?>">
				<div class="site-footer-bg-layer ts-bg-layer"></div>
				<div class="site-footer-w">
					<div class="footer-rows">
						<div class="footer-rows-inner">
							<?php themestek_footer_cta(); ?>
							<?php get_sidebar( 'first-footer' ); ?>
							<?php get_sidebar( 'second-footer' ); ?>
						</div><!-- .footer-inner -->
					</div><!-- .footer -->
					<?php get_sidebar( 'footer' ); ?>
				</div><!-- .footer-inner-wrapper -->
			</div><!-- .site-footer-inner -->
		</footer><!-- .site-footer -->

	</div><!-- #page .site -->

</div><!-- .main-holder -->

<?php 
// Hide Totop Button
$hide_totop_button  = themestek_get_option('hide_totop_button');
if($hide_totop_button != 1 ){ ?>
	<!-- To Top -->
	<a id="totop" title="<?php echo esc_attr__( 'Go to Top', 'labtechco' ); ?>" href="#top" ><i class="ts-labtechco-icon-angle-up"></i></a>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
