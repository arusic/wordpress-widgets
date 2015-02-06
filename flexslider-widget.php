<?php

// FLEXSLIDER WIDGET

class Flexslider_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'Flexslider_widget', 
			__('Flexslider widget', 'widget'), 
			array( 'description' => __( 'Slider for posts with flexslider', 'widget' ), ) 
			);
	}


	// frontend widgeta 

	public function widget( $args, $instance ) { 
		$value_posts = $instance['title']; 
		$link = $instance['text']; 
		?>

		<!-- FLEX WIDGET -->

		<div class="best_of_content">
			<div class="flexslider">
			  <p class="tag_title"><?php _e('Flexslider widget', 'themename');?></p>
				<ul class="slides">

					<?php

						$args = array('posts_per_page' => $value_posts , 'post_status' => 'publish'); 
						$category_posts = new WP_Query($args);
						$posts = $category_posts->posts;


						foreach ($posts as $key => $value) { 
							$post_title = $value->post_title;
							$post_id = $value->ID;
							$image = get_the_post_thumbnail( $post_id, 'widget_image' ); // you can set the image size in function 
							$link = post_permalink($value->ID); ?>

							<li class="best_of_wrap">
								<a href="<?php echo $link; ?>"><?php echo $image; ?></a>
							</li>
							
					<?php } ?>

				</ul>
			</div>
		</div>
		
		<?php
	}

   	// backend widget

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] )  && isset( $instance[ 'text' ] ) ) {
			$title = $instance[ 'title' ];
			$link = $instance['text']; 
		}
		else {
			$title = __( 'Number of posts', 'widget' );
			$link = __( 'Link to page', 'widget' );
		} ?>

		<!-- form in backend -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Number of posts:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Link to page:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>" />
		</p>

		<?php 
	}


	// Upejdovanje widgeta sa novom instancom 
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		return $instance;
	}
} 

// don't forget to include flexslider.js and to call it in js file

//	jQuery(document).ready(function($){
//		$('.flexslider').flexslider();
//	});
?>


