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

<article id="post-<?php the_ID(); ?>" <?php post_class( themestek_sanitize_html_classes(themestek_postlayout_class()) ); ?> >
	
	<div class="ts-featured-outer-wrapper ts-post-featured-outer-wrapper">
		<?php echo themestek_get_featured_media(); // Featured content ?>
	</div>
	
	<div class="ts-blog-classic-box-content">
	
		<?php
		 if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
			
			<!-- Blog classic meta Start -->
			<div class="ts-featured-meta-wrapper ts-featured-overlay">
				
				<?php
				// Category list
				$categories_list = get_the_category_list( ', ' );
				if ( !empty($categories_list) ) { ?>
					<span class="ts-meta-line cat-links"><i class="ts-labtechco-icon-category"></i> <span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Categories', 'Used before category names.', 'labtechco' ); ?> </span><?php echo themestek_wp_kses($categories_list); ?></span>
				<?php } ?>
				
				
				<?php
				// Date
				$date_format =  get_option('date_format'); ?>
				<span class="ts-meta-line posted-on">
					<i class="ts-labtechco-icon-clock"></i> 
					<span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Posted on', 'Used before publish date.', 'labtechco' ); ?> </span>
					<a title="<?php echo esc_attr__( 'Date', 'labtechco' ); ?>" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
						<time class="entry-date published" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo get_the_date($date_format); ?></time>
						<time class="updated ts-hide" datetime="<?php echo esc_attr( get_the_modified_date( 'c' ) ); ?>"><?php echo get_the_modified_date($date_format); ?></time>
					</a>
				</span>
				
				
				<?php
				// Author
				$author	= '<a title="'.get_the_author().'" class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">'.get_the_author().'</a>';
				?>
				<span class="ts-meta-line byline">
					<i class="ts-labtechco-icon-user"></i>
					<span class="author vcard">
						<span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Author', 'Used before post author name.', 'labtechco' ); ?> </span>
						<?php echo themestek_wp_kses($author); ?>
					</span>
				</span>
				
				
				<?php
				// Tag
				$tags_list = get_the_tag_list( '', esc_attr_x( ', ', 'Used between list items, there is a space after the comma.', 'labtechco' ) );
				if ( !empty($tags_list) ) {
					?>
					<span class="ts-meta-line tags-links">
						<i class="ts-labtechco-icon-tag"></i>
						<span class="screen-reader-text ts-hide">
							<?php echo esc_attr_x( 'Tags', 'Used before tag names.', 'labtechco' ); ?>
						</span>
						<?php echo themestek_wp_kses($tags_list); ?>
					</span>
				<?php } ?>
				
				
			</div>
			<!-- Blog classic meta End -->
			
		<?php endif; ?>


		<header class="entry-header">
			<?php if( !is_single() ) : ?>
				<?php if( 'aside' != get_post_format() && 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
					<?php the_title( sprintf( '<h2 class="entry-title"><a title="'. the_title(); .'" href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
			<?php endif; ?>
		</header><!-- .entry-header -->
		
		
		<?php if( 'quote' != get_post_format() ) : ?>
			<div class="entry-content">
				
				<?php if( !is_single() ) : ?>
					<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description(); ?></div>
				<?php endif; ?>
			
				<?php

				the_content( sprintf(
					esc_attr__( 'Read More %s', 'labtechco' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				?>

					<div class="themestek-blogbox-footer-readmore">
						<?php echo themestek_blogbox_readmore(); ?>
					</div>	
		<?php
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
		if( is_single() ){
			echo themestek_social_share_box('post');
		}
		?>
		
		
		<?php
		// Tags & Categories
		
		if( !empty($tags) || !empty($category) ){
			echo themestek_wp_kses('<div class="ts-post-tag-cat">');
		}
		
		if( !empty($tags) ){
			echo sprintf( themestek_wp_kses('<div class="ts-post-tag">%s</div>'), esc_attr__('Tags:', 'labtechco') . ' ' . $tags );
		}
		if( !empty($category) ){
			echo sprintf( themestek_wp_kses('<div class="ts-post-cat">%s</div>'), esc_attr__('Categories:', 'labtechco') . ' ' . $category );
		}
		
		if( !empty($tags) || !empty($category) ){
			echo themestek_wp_kses('</div><!-- .ts-post-tag-cat -->');
		}
		
		?>
		
		
		
		
		
		<?php
		// Next Prev buttons
		$prev_post = get_previous_post();  // Prev post
		$next_post = get_next_post();  // Next post
		if( ( !empty($prev_post) || !empty($next_post) ) && shortcode_exists('ts-btn') ){
			?>
			<div class="ts-post-prev-next-buttons">
				<?php
				if( !empty( $prev_post ) && shortcode_exists('ts-btn') ){
					echo do_shortcode('[ts-btn title="' . esc_attr__('PREVIOUS', 'labtechco') . '" style="flat" shape="square" font_weight="yes" color="skincolor" size="md" i_align="left" i_icon_themify="themifyicon ti-arrow-left" add_icon="true" link="url:' . urlencode(esc_url( get_permalink( $prev_post->ID ) )) . '|title:' . rawurlencode($prev_post->post_title) . '||" el_class="ts-left-align-btn"]');
				};
				// Next post
				if ( !empty($next_post) && shortcode_exists('ts-btn') ){
					echo do_shortcode('[ts-btn title="' . esc_attr__('NEXT', 'labtechco') . '" style="flat shape="square" font_weight="yes" color="skincolor" size="md" i_align="right" i_icon_themify="themifyicon ti-arrow-right" add_icon="true" link="url:' . urlencode(esc_url( get_permalink( $next_post->ID ) )) . '|title:' . rawurlencode($next_post->post_title) . '||" el_class="ts-right-align-btn"]');
				};
				?>
			</div>
			<?php
		}
		?>
		
		
		
		<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'theme-parts/author-bio', 'customized' );
		endif;
		?>
		

		
	</div><!-- .ts-blog-classic-box-content -->
	
</article><!-- #post-## -->
