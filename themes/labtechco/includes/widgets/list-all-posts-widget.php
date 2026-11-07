<?php
/**
 * List All Posts widget class with Icon
 *
 * @since 1.0
 */
class labtechco_list_all_posts extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'themestek_widget_list_all_posts', 'description' => esc_attr__( "Show all posts for current CPT.", 'labtechco') );
		parent::__construct('themestek-list-all-posts', esc_attr__('LabtechCO List All Posts', 'labtechco'), $widget_ops);
	}

	function widget($args, $instance) {

		if ( ! isset( $args['widget_id'] ) ){
			$args['widget_id'] = $this->id;
		}
		extract($args);
		
		$title			= ( !empty($instance['title']) ) ? $instance['title'] : esc_attr__( 'Posts', 'labtechco' );
		$title			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$number			= ( !empty($instance['number']) ) ? absint( $instance['number'] ) : '-1';
		$orderby		= ( !empty($instance['orderby']) ) ? $instance['orderby'] : '';
		$t_order		= ( !empty($instance['t_order']) ) ? $instance['t_order'] : '';
		$from_curr_cat	= ( !empty($instance['from_curr_cat']) ) ? $instance['from_curr_cat'] : '';
		$custom_class	= ( !empty($instance['custom_class']) ) ? $instance['custom_class'] : '';
		
		
		
		// Adding class in $before_widget variable
		if( !empty($custom_class) ){
			if( strpos($before_widget, 'class') === false ) {
				// include closing tag in replace string
				$before_widget = str_replace('>', 'class="'. $custom_class . '">', $before_widget);
			} else {
				// there is 'class' attribute - append width value to it
				$before_widget = str_replace('class="', 'class="'. $custom_class . ' ', $before_widget);
			}
		}
		
		
		$post_type = 'post';
		if( is_singular() ){
			$post_type = get_post_type();
			$post_type = (empty($post_type)) ? 'post' : $post_type ;
		}
		
		
		
		
		$args = array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'post_type'			  => $post_type,
		);
		
		if( !empty($orderby) ){
			$args['orderby'] = $orderby;
		}
		if( !empty($t_order) ){
			$args['order'] = $t_order;
		}
		if( !empty($from_curr_cat) && $from_curr_cat=='true' ){
			$taxonomy = '';
			if( $post_type=='ts-portfolio' ){
				$taxonomy = 'ts-portfolio-category';

			} else if( $post_type=='ts-service' ){
				$taxonomy = 'ts-service-category';

			} else if( $post_type=='ts-team-member' ){
				$taxonomy = 'ts-team-group';

			}
			
			// Taxonomy
			if( !empty($taxonomy) ){
				$terms = get_the_terms( get_the_ID(), $taxonomy );
				if( !empty($terms) && is_array($terms) && count($terms)>0 ){
					$termlist = array();
					foreach( $terms as $term ){
						$termlist[] = $term->slug;
					}

					$args['tax_query'] = array(
						array(
							'taxonomy' => $taxonomy,
							'field'    => 'slug',
							'terms'    => implode(',',$termlist),
						),
					);
				}
			}



		}
		
		
		// Main query
		$r = new WP_Query($args);
		
		
		
		?>
		
		
		<?php
		if ($r->have_posts()) :
?>

		<?php
		
		echo wp_kses( /* html Filter */
			$before_widget,
			array(
				'aside' => array(
					'id'    => array(),
					'class' => array(),
				),
				'div' => array(
					'id'    => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'h2' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h3' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h4' => array(
					'class' => array(),
					'id'    => array(),
				),
				
			)
		); 
		?>
		
		
		<?php
		if ( !empty($title) ){
			$recentposts_widget_title = $before_title . $title . $after_title;
			echo wp_kses( /* html Filter */
				$recentposts_widget_title,
				array(
					'aside' => array(
						'id'    => array(),
						'class' => array(),
					),
					'div' => array(
						'id'    => array(),
						'class' => array(),
					),
					'span' => array(
						'class' => array(),
					),
					'h2' => array(
						'class' => array(),
						'id'    => array(),
					),
					'h3' => array(
						'class' => array(),
						'id'    => array(),
					),
					'h4' => array(
						'class' => array(),
						'id'    => array(),
					),
					
				)
			);
		}
		?>
		
		<div class="ts-all-post-list-w">
			<ul class="ts-all-post-list">
			<?php
			
			$current_id = ( is_singular() ) ? get_the_ID() : '' ;
			
			if ($r->have_posts()){
				while ( $r->have_posts() ) :
					$r->the_post();
					$current_class = ( get_the_ID() == $current_id ) ? 'ts-post-active' : '' ;
					?>
					<li class="<?php echo esc_attr($current_class); ?>"><a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></li>
					<?php
				endwhile;
			}
			?>
			</ul>
		</div>
		
		
		<?php
		echo wp_kses( /* html Filter */
			$after_widget,
			array(
				'aside' => array(
					'id'    => array(),
					'class' => array(),
				),
				'div' => array(
					'id'    => array(),
					'class' => array(),
				),
				'span' => array(
					'class' => array(),
				),
				'h2' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h3' => array(
					'class' => array(),
					'id'    => array(),
				),
				'h4' => array(
					'class' => array(),
					'id'    => array(),
				),
				
			)
		);
		?>
		
		
		<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();
		endif;
		
		
	}

	
	
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title']			= esc_attr($new_instance['title']);
		$instance['number']			= (int) $new_instance['number'];
		$instance['orderby']		= esc_attr($new_instance['orderby']);
		$instance['t_order']		= esc_attr($new_instance['t_order']);
		$instance['from_curr_cat']	= esc_attr($new_instance['from_curr_cat']);
		$instance['custom_class']	= esc_attr($new_instance['custom_class']);
	
		return $instance;
	}


	function form( $instance ) {
		$title			= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$orderby		= isset( $instance['orderby'] ) ? esc_attr($instance['orderby']) : '';
		$t_order		= isset( $instance['t_order'] ) ? esc_attr($instance['t_order']) : '';
		$from_curr_cat	= isset( $instance['from_curr_cat'] ) ? esc_attr($instance['from_curr_cat']) : '';
		$custom_class	= isset( $instance['custom_class'] ) ? esc_attr($instance['custom_class']) : '';
		?>

		<div class="ts-widget-infobox">
			<?php esc_attr_e('This will show recent post,page or other post-type as list with special design.', 'labtechco'); ?>
		</div>
		
		<p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_attr_e( 'Title:', 'labtechco' ); ?></label>
		<input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_attr_e( 'Number of posts to show:', 'labtechco' ); ?></label> <br>
		<input id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" /></p>
		
		
		<p><label for="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>"><?php esc_attr_e( 'Order By:', 'labtechco' ); ?></label><br>
		<select id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" value="<?php echo esc_attr($orderby); ?>" >
			<option value="">none</option>
			<option value="ID" <?php selected( $orderby, 'ID' ); ?>>ID</option>
			<option value="title" <?php selected( $orderby, 'title' ); ?>>title</option>
			<option value="name" <?php selected( $orderby, 'name' ); ?>>name</option>
			<option value="date" <?php selected( $orderby, 'date' ); ?>>date</option>
			<option value="modified" <?php selected( $orderby, 'modified' ); ?>>modified</option>
		</select>
		<!--<input id="<?php echo esc_attr($this->get_field_id( 'orderby' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'orderby' )); ?>" type="text" value="<?php echo esc_attr($orderby); ?>" /> -->
		</p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id( 't_order' )); ?>"><?php esc_attr_e( 'Order:', 'labtechco' ); ?></label><br>
		<!--<input id="<?php echo esc_attr($this->get_field_id( 't_order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 't_order' )); ?>" type="text" value="<?php echo esc_attr($t_order); ?>" /> -->
		<select id="<?php echo esc_attr($this->get_field_id( 't_order' )); ?>" name="<?php echo esc_attr($this->get_field_name( 't_order' )); ?>" value="<?php echo esc_attr($t_order); ?>" >
			<option value="">none</option>
			<option value="ASC" <?php selected( $t_order, 'ASC' ); ?>>ASC</option>
			<option value="DESC" <?php selected( $t_order, 'DESC' ); ?>>DESC</option>
		</select>
		</p>

		<p><label for="<?php echo esc_attr($this->get_field_id( 'from_curr_cat' )); ?>"><?php esc_attr_e( 'From Category Only:', 'labtechco' ); ?></label><br>
		<input id="<?php echo esc_attr($this->get_field_id( 'from_curr_cat' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'from_curr_cat' )); ?>" type="checkbox" value="true" <?php checked( $from_curr_cat, 'true' ); ?> /></p>
		
		<p><label for="<?php echo esc_attr($this->get_field_id( 'custom_class' )); ?>"><?php esc_attr_e( 'Custom Class:', 'labtechco' ); ?></label><br>
		<input id="<?php echo esc_attr($this->get_field_id( 'custom_class' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'custom_class' )); ?>" type="text" value="<?php echo esc_attr($custom_class); ?>" /></p>

		
		
<?php
	}
}

register_widget('labtechco_list_all_posts');