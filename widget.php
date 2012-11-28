<?php

/* This class must be extended for each widget and WP_Widget::widget(), WP_Widget::update()
 * and WP_Widget::form() need to be over-ridden.

*/

class Chataway_Events extends WP_Widget {
	public function __construct() {
		parent::__construct(
	 		'chataway-events', // Base ID
			'Chataway Events', // Name
			array( 'description' => 'Chataway events widget', 'text_domain') // Args
		);
	}

 	public function form( $instance ) {
		if ( $instance ) {
			$title = esc_attr( $instance[ 'title' ] );
			$numevents = esc_attr( $instance[ 'numevents' ] );
		}
		else {
			$title = __( 'New title', 'text_domain' );
			$numevents = 6;
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
		<label for="<?php echo $this->get_field_id( 'numevents' ); ?>"><?php _e( 'Number of events to display:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'numevents' ); ?>" name="<?php echo $this->get_field_name( 'numevents' ); ?>" type="text" value="<?php echo $numevents; ?>" />
		</p>
		<?php 
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['numevents'] = (int)$new_instance['numevents'];

		return $instance;
	}

	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $before_widget;
		echo $before_title . $title . $after_title; ?>
        <ul>
        	<li>
            	
            </li>
        </ul>
        <?php
		echo $after_widget;
	}
}

register_widget( 'Chataway_Events' );