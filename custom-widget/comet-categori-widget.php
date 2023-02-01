<?php
add_action('widgets_init','comet_widget_categori');
	function comet_widget_categori() {
		register_widget('comet_cat_widget');
	}

class comet_cat_widget extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'description' =>'This is Comet Category Area'
		);
		parent::__construct('category-widget','Comet Category',$widget_ops);
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
	}

	public function form( $instance ) {
		// outputs the options form in the admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}