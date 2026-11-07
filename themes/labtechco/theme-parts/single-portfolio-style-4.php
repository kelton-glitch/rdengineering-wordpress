<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */

?>

<div class="ts-pf-single-content-wrapper ts-pf-view-top-image">

	<?php echo themestek_get_featured_media(); ?>
<div class="themestek-pf-single-details-area">
			<?php echo themestek_portfolio_detailsbox(); ?>
		</div><!-- .themestek-pf-single-content-area -->
	<div class="row">
		<div class="themestek-pf-single-content-area col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php echo themestek_portfolio_description(); ?>
		</div><!-- .themestek-pf-single-content-area -->

	</div>
	
	<div class="ts-social-top-wrapper">
		<?php echo themestek_social_share_box('portfolio'); /* Social share */ ?>
	</div>
	<div class="ts-pf-single-np-nav"><?php echo themestek_portfolio_next_prev_btn(); /* Next/Prev button */ ?></div>
	
</div>


<?php edit_post_link( esc_attr__( 'Edit', 'labtechco' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>