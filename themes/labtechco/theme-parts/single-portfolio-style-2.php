<?php
/*
 *
 *  Single Portfolio - Top image
 *
 */

?>

<div class="ts-pf-single-content-wrapper ts-pf-view-top-image">
	<div class="themestek-common-box-shadow ts-pf-single-content-wrapper-innerbox">

		<!-- =============================================================== -->
		<div class="ts-pf-top-content">
			<div class="row">
					<div class="themestek-pf-single-short-desc col-xs-12 col-sm-8 col-md-8 col-lg-8">
						<h4 class="ts-custom-heading "><?php esc_attr_e('PROJECT OVERVIEW','labtechco'); ?></h4>
						<?php echo themestek_portfolio_shortdesc(); ?>
					</div>
					<div class=" themestek-pf-single-details-area col-xs-12 col-sm-4 col-md-4 col-lg-4">
						<?php $project_details = themestek_get_option('portfolio_project_details');  ?> 
						<?php if( !empty($project_details) ){ ?>
							<h5><?php echo esc_attr($project_details); ?></h5>
						<?php } ?>
						<?php echo themestek_portfolio_detailsbox(); ?>
					</div>
					
					<div class="themestek-pf-single-featured-media col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<?php echo themestek_get_featured_media('', 'themestek-img-1170x575'); ?>
					</div>
			</div>
		</div>

		<?php echo themestek_portfolio_description(); ?>

		<!-- =============================================================== -->

	<div class="themestek-pf-single-content-bottom container">
		<?php
		// Portfolio Category
		$row_value = get_the_term_list( get_the_ID(), 'ts-portfolio-category', '', ' ', '' );
		if( !empty($row_value) ){ ?>
			<div class="ts-pf-single-category-w">
				<?php echo themestek_wp_kses($row_value); ?>
			</div>
		<?php } ?>
		<?php echo themestek_social_share_box('portfolio');  // Social share ?>
	</div>

	</div><!-- .themestek-common-box-shadow -->

	<div class="container">
		<div class="ts-pf-single-np-nav"><?php echo themestek_portfolio_next_prev_btn(); // Next/Prev button ?></div>
		<?php edit_post_link( esc_attr__( 'Edit', 'labtechco' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>
	</div>

</div><!-- .ts-pf-single-content-wrapper -->