<?php 
// SOCIAL MEDIA WIDGET

class Social_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			'Social_widget', 
			__('Social widget', 'widget'), 
			array( 'description' => __( 'Social share - widget', 'widget' ), ) 
			);
	}


	// frontend widget 

	public function widget( $args, $instance ) { 
		$fb = $instance['text']; 
		$tw = $instance['text_tw'];
		$pi = $instance['text_gp']; ?>

		<div class="socl extra_box">
			<div class="wrap3">
				<a href="<?php echo $tw; ?>" target="_blank"><p><?php _e('Twitter', 'shop-commercial-material')?></p>
				<img src="<?php echo get_template_directory_uri(); ?>/images/dev_images/twit.png" alt=""></a>
			</div>
			<div class="wrap2">
				<a href="<?php echo $fb; ?>" target="_blank"><p><?php _e('Facebook', 'shop-commercial-material')?></p>
				<img src="<?php echo get_template_directory_uri(); ?>/images/dev_images/fb.png" alt=""></a>
			</div>
			<div class="wrap1">
				<a href="<?php echo $pi; ?>" target="_blank"><p><?php _e('Google+', 'shop-commercial-material')?></p>
				<img src="<?php echo get_template_directory_uri(); ?>/images/dev_images/g_plus.png" alt=""></a>
			</div>
		</div>

		<?php
		
	}

   	// backend widget

	
	function form($instance) {
		if ( isset( $instance[ 'text' ] ) && isset( $instance[ 'text_tw' ] ) && isset( $instance[ 'text_gp' ] )) {
			$text = $instance[ 'text' ];
			$text_tw = $instance[ 'text_tw' ];
			$text_gp = $instance[ 'text_gp' ];
		}
		else {
			$text = __( 'Social media', 'widget' );
		} ?>

		<p>
			<label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Facebook Link', 'widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>" type="text" value="<?php echo $text; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('text_tw'); ?>"><?php _e('Twitter Link', 'widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text_tw'); ?>" name="<?php echo $this->get_field_name('text_tw'); ?>" type="text" value="<?php echo $text_tw; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('text_gp'); ?>"><?php _e('Google+ Link', 'widget'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('text_gp'); ?>" name="<?php echo $this->get_field_name('text_gp'); ?>" type="text" value="<?php echo $text_gp; ?>" />
		</p>


		<?php
	}

	// Update widgeta whith new instance
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['text_tw'] = strip_tags($new_instance['text_tw']);
		$instance['text_gp'] = strip_tags($new_instance['text_gp']);
		return $instance;
	}
} 

function registerWidget() {

	register_widget('Social_widget');

}

add_action( 'widgets_init', 'registerWidget' );

?>