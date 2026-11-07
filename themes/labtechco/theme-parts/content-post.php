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

<article id="post-<?php the_ID(); ?>" <?php post_class( themestek_sanitize_html_classes(themestek_post_class()) ); ?>>
	
	
	<div class="ts-featured-outer-wrapper ts-post-featured-outer-wrapper">
		<?php echo themestek_get_post_format_icon(); ?>
		<?php echo themestek_get_featured_media(); // Featured content ?>
	</div>
	
	
	<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
		<?php echo labtechco_entry_meta('blogclassic');  // blog post meta details ?>
	<?php endif; ?>
	
	
	<header class="entry-header">
		<?php if( !is_single() ) : ?>
			<?php if( 'aside' != get_post_format() && 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
				<?php the_title( sprintf( '<h2 class="entry-title"><a title="' . the_title(); . '" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php endif; ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	
	
	<?php if( 'quote' != get_post_format() ) : ?>
		<div class="entry-content">
			<?php
			the_content( sprintf(
				esc_attr__( 'Read More %s', 'labtechco' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );
			
			// pagination if any
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'labtechco' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>

	
	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'theme-parts/author-bio', 'customized' );
	endif;
	?>

	
	<?php
	// Edit link
	if( is_singular() ){
		edit_post_link( esc_attr__( 'Edit', 'labtechco' ), '<div class="edit-link-wrapper clearfix"> <span class="edit-link">', '</span></div>' );
	}
	?>

</article><!-- #post-## -->
