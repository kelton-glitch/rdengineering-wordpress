<?php

add_action( 'widgets_init', 'labtechco_flicker_widget' );

function labtechco_flicker_widget() {
	register_widget( 'labtechco_flicker_widget' );
}

class labtechco_flicker_widget extends WP_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		$widget_style = array('classname'   => 'labtechco_flicker_widget',
							  'description' => esc_attr__('Show photos from Flickr.','labtechco') );

		
		parent::__construct(
			'labtechco_flicker_widget', // Base ID
			esc_attr__('LabtechCO Flickr Widget', 'labtechco'), // Name
			$widget_style // Args
		);
	}


	function widget( $args, $cur_instance ) {
		extract( $args );

		
		$title 		= apply_filters( 'widget_title', $cur_instance['title'] );
		$flickrID 	= $cur_instance['flickrID'];
		$postcount 	= $cur_instance['postcount'];
		$type 		= $cur_instance['type'];
		$display 	= $cur_instance['display'];
		$setid	 	= ( !empty($cur_instance['album']) ) ? $cur_instance['album'] : '' ;

		
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
		
		
		
		if ( !empty($title) ){
			$contact_widget_title = $before_title . $title . $after_title;
			echo wp_kses( /* html Filter */
				$contact_widget_title,
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
		
		$type2	  = $type;
		$type_val = urlencode($flickrID);
		
		if( $type2 == 'user_set' ){
			$type2    = 'set';
			$type_val = $setid;
		}
		
		// type value

		
		$url = 'https://www.flickr.com/badge_code_v2.gne?count='.trim($postcount).'&amp;display='.$display.'&amp;size=s&amp;layout=v&amp;source='.$type.'&amp;'.$type2.'='.$type_val;
		
		
		echo '<div class="labtechco_flicker_widget_wrapper">'; ?>
			<script src="<?php echo esc_url($url); ?>"></script>
			<?php 
		echo '</div>';
		
		
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
		
		
	}
		
	function update( $new_instance, $org_instance ) {
		$cur_instance 				= $org_instance;
		$cur_instance['title'] 		= strip_tags( $new_instance['title'] );
		$cur_instance['flickrID'] 	= strip_tags( $new_instance['flickrID'] );
		$cur_instance['show'] 		= $new_instance['slide'];
		$cur_instance['postcount'] 	= $new_instance['postcount'];
		$cur_instance['type'] 		= $new_instance['type'];
		$cur_instance['album'] 		= strip_tags( $new_instance['album'] );
		$cur_instance['inline'] 	= $new_instance['true'];
		$cur_instance['display'] 	= $new_instance['display'];
		return $cur_instance;
	}
		 
	function form( $cur_instance ) {
		$defaults = array('title'     => 'Flickr',
						  'flickrID'  => '65961696@N02',
						  'postcount' => '9',
						  'type'      => 'user',
						  'display'   => 'latest',
						  'album'     => '');
		
		$cur_instance = wp_parse_args( (array) $cur_instance, $defaults ); ?>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_attr__('Title', 'labtechco'); ?>:</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" value="<?php echo esc_attr($cur_instance['title']); ?>" />
		</p>
		
		

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'flickrID' )); ?>">Flickr ID: (see <a title="idGettr" href="<?php echo esc_url('http://idgettr.com/'); ?>">idGettr</a>)</label>
			<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id( 'flickrID' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'flickrID' )); ?>" value="<?php echo esc_attr($cur_instance['flickrID']); ?>" />
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'postcount' )); ?>">Number of photos:</label>
			<select id="<?php echo esc_attr($this->get_field_id( 'postcount' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'postcount' )); ?>" class="widefat">
				<?php
				$maxList = 10;
				for( $x=1; $x<=$maxList; $x++ ){
					?>
					<option <?php if ( $x == $cur_instance['postcount'] ) echo 'selected="selected"'; ?>> <?php echo esc_attr($x); ?> </option>
					<?php
				}
				?>
			</select>		
		</p>
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'type' )); ?>">Type (user or group):</label>
			<select id="<?php echo esc_attr($this->get_field_id( 'type' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'type' )); ?>" class="widefat ts-fw-type-selector">	
				<option value="user"     <?php if ( 'user'		== $cur_instance['type'] ) echo 'selected="selected"'; ?>>User</option>
				<option value="group"    <?php if ( 'group'		== $cur_instance['type'] ) echo 'selected="selected"'; ?>>Group</option>
				<option value="user_set" <?php if ( 'user_set'	== $cur_instance['type'] ) echo 'selected="selected"'; ?>>Album</option>
			</select>
		</p>
		
		
		<!-- Album -->
		<div class="ts-fwidget-album-wrapper" <?php if('user_set' != $cur_instance['type']) : ?> style="display:none;" <?php endif; ?> >
			<p>
				<?php $album_fieldid = $this->get_field_id( 'album' ); ?>
				<label for="<?php echo esc_attr($album_fieldid); ?>"><?php echo esc_attr__('Album ID', 'labtechco'); ?>:</label>
				<input type="text" class="widefat" id="<?php echo esc_attr($album_fieldid); ?>" name="<?php echo esc_attr($this->get_field_name( 'album' )); ?>" value="<?php echo esc_attr($cur_instance['album']); ?>" />
			</p>
		</div>
		
		
		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'display' )); ?>">Show (random or most recent):</label>
			<select id="<?php echo esc_attr($this->get_field_id( 'display' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'display' )); ?>" class="widefat">
				<option <?php if ( 'random' == $cur_instance['display'] ) echo 'selected="selected"'; ?>>random</option>
				<option <?php if ( 'latest' == $cur_instance['display'] ) echo 'selected="selected"'; ?>>latest</option>
			</select>
		</p>
		
		
		
		
		<script>
		jQuery('.ts-fw-type-selector').on('change', function(){
			//console.log('Workinngg ' + jQuery(this).val() );
			if( jQuery(this).val() == 'user_set' ){
				jQuery('.ts-fwidget-album-wrapper').show();
			} else {
				jQuery('.ts-fwidget-album-wrapper').hide();
			}
		});
		</script>
		
		<?php
	}
}
