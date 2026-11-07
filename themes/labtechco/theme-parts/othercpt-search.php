<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage LabtechCO
 * @since LabtechCO 1.0
 */
?>

<div class="ts-other-cpt-boxstyle ts-cpt-<?php echo get_post_type(); ?>">
	
	<?php echo themestek_get_featured_media( '', 'thumb' ); // Featured content ?>
	
	<div class="ts-cpt-title">
		<a title="<?php the_title(); ?>" href="<?php echo esc_url( get_permalink() ); ?>">
			<?php the_title(); ?>
		</a>
	</div>
	
	<div class="clear clr clearfix"></div>
	
</div><!-- #post-## -->
