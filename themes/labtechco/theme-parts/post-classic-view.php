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
	
	<div class="ts-blog-classic-featured-wrapper">
		
		<div class="ts-blog-classic-datebox-overlay">
			<div class="ts-blog-classic-dbox-date"><?php echo get_the_date( 'd' ); ?></div>
			<div class="ts-blog-classic-dbox-month"><?php echo get_the_date( 'M' ); ?></div>
		</div>
		
		<?php echo themestek_get_featured_media(); // Featured content ?>
	</div>
	
	<div class="ts-blog-classic-box-content <?php if( !function_exists('tste_labtechco_cs_framework_init') ) { ?>ts-blog-classic-no-footer-meta<?php }; ?>">
	
		<?php
		 if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
			
			<!-- Blog classic meta Start -->
			<div class="ts-featured-meta-wrapper ts-featured-overlay">
				
				<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
					
					<div class="ts-blog-post-date">
						<?php 
						// Post Date
						$date = get_the_date();
						?>
						<span class="ts-meta-line"><span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Date', 'Used before category names.', 'labtechco' ); ?> </span> <i class="ts-labtechco-icon-clock"></i> <a href="<?php the_permalink(); ?>"  title="<?php echo esc_attr__( 'Date', 'labtechco' ); ?>"><?php echo esc_attr($date); ?></a></span>
					</div>
					
					<div class="ts-blog-post-cat ts-blog-post-cat-above-title">
					<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
						<?php echo labtechco_blogstyle2_meta('blogclassic');  // blog post meta details ?>
					<?php endif; ?>
		
					</div>
					
					<?php if( is_single() ) : ?>
						<div class="themestek-box-title"><h4><?php echo get_the_title(); ?></h4></div>
					<?php else : ?>
						<?php echo themestek_box_title('classicmain'); // post title ?>
					<?php endif; ?>
					
				<?php endif; ?>

			</div>
			<!-- Blog classic meta End -->
			
		<?php endif; ?>
      
		<?php if( 'quote' != get_post_format() ) : ?>
			<div class="entry-content">
				
				<?php if( !is_single() ) : ?>
					<?php
					$readmoretext = themestek_get_option('blog_readmore_text');
					
					?>
					
					<div class="themestek-box-desc-text"><?php echo themestek_blogbox_description( $readmoretext ); ?></div>
					
				<?php else : ?>
				
					<?php
					the_content( sprintf(
						'',
						the_title( '<span class="">', '</span>', false )
					) );
					?>
					
				<?php endif; ?>
				<?php if( !is_single() ) : ?>
			        <div class="themestek-blog-classic-footer-readmore">
						<?php $readmore = themestek_blogbox_readmore_classic();
					    echo themestek_wp_kses($readmore); ?>
					</div>
				<?php endif; ?>
				<?php if( function_exists('tste_labtechco_cs_framework_init') ) : ?>
				<div class="ts-footer-meta-wrapper">
					
					<span class="ts-footer-meta-line-w ts-footer-meta-line-comments">
						<a title="<?php echo esc_attr__( 'Comments', 'labtechco' ); ?>" href="<?php echo get_permalink();?>">
							<?php 
							$num_comments    = get_comments_number();			
							$comments_code = '';
							if( !is_sticky() && comments_open() && ($num_comments>=0) ){ ?>
								<i class="ts-labtechco-icon-comment-1"></i>
								<span class="comments">
									<?php printf( esc_attr__('%1$s Comments', 'labtechco'), $num_comments ) ?>
								</span>
							<?php } ?>
						</a>
					</span>
					
					<?php
					// Author
					$author	= '<a title="'.get_the_author().'" class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="ts-labtechco-icon-user"></i> '.get_the_author().'</a>';
						?>
						<span class="ts-footer-meta-line-w ts-footer-meta-line-author">
							<span class="author vcard">
								<span class="screen-reader-text ts-hide"><?php echo esc_attr_x( 'Author', 'Used before post author name.', 'labtechco' ); ?> </span>
								<?php echo themestek_wp_kses($author); ?>
							</span>
						</span>	
				</div>
				<?php endif; ?>
				
				<?php
				if( is_single() ) {
					// pagination if any
					wp_link_pages( array(
						'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'labtechco' ),
						'after'       => '</div>',
						'link_before' => '<span class="page-number">',
						'link_after'  => '</span>',
					) );
				}
				?>
				
			</div><!-- .entry-content -->
			
			<?php if( is_single() ) : ?>
				<?php echo themestek_social_share_box('post'); ?>
			<?php endif; ?>
			
		<?php endif; ?>

		<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'theme-parts/author-bio', 'customized' );
		endif;
		?>
		
	</div><!-- .ts-blog-classic-box-content -->
	
</article><!-- #post-## -->
