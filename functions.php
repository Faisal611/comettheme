<?php

/*---- Hook Link ----*/
require_once ('hook/hook.php');
require_once ('hook/single-product-hooked.php');
require_once ('hook/checkout-hooked.php');

/*--- Nav_Menu_Walker ---*/
require_once( 'admin-cpanel-nav-menu-walker.php' );
require_once( 'custom-nav-menu-walker.php' );

/*--- mate-box -----*/
require_once ('meta-box/init.php');
require_once ('meta-box/config.php');



if (!function_exists('comet_theme_setup')) {
	add_action('after_setup_theme', 'comet_theme_setup');
	function comet_theme_setup() {

		flush_rewrite_rules();
		load_theme_textdomain( 'comet_theme', get_template_directory() .'/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'woocommerce' );
		add_theme_support('custom-post-type-ui');

		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'main-menu' => __( 'Main Menu' )
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		*/

		add_theme_support( 'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		/*
		 * Enable support for Post Formats.
		*/
		add_theme_support(
			'post-formats',
			array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
				'gallery',
				'status',
				'audio',
				'chat',
			)
		);

	/*
	 * -------Default Menu----- *
	*/
		function default_main_menu() {

			echo '<ul class="navigation-menu">';
			echo '<li><a href="' . home_url() . '" class="transition">HOME</a></li>';
			echo '</ul>';
		}
	}

	add_action('widgets_init', 'right_sidebar_widgets');
	function right_sidebar_widgets()
	{
		register_sidebar(array(
			'name' => __('Sidebar', 'comet_theme'),
			'id' => 'last_sidebar',
			'description' => __('Right Sidebar', 'comet_theme'),
		));
	}


}






/*---------------- Nav menu Walker ----------------*/

add_filter('wp_edit_nav_menu_walker','admin_notun_menu_functios');
    function admin_notun_menu_functios() {
        return 'Amader_Nav_Walkar';
    }

add_action('wp_update_nav_menu_item','new_megamenu_data_update_function',10,2);
	function new_megamenu_data_update_function ($meta_id, $post_id ){
		update_post_meta($post_id,'_faisal',$_REQUEST['megamenu_mane'][$post_id]);
	}

/*------ Comments  ---*/


add_filter('comment_form_defaults','comment_form_function');
function comment_form_function ($defaults) {
	if (!is_user_logged_in()) {
		$defaults['comment_field'] =  '';
	}else{
		$defaults['comment_field'] = '<div class="form-group">
								<textarea name="comment" placeholder="Comment" class="form-control"></textarea>
							</div>';
	}
	$defaults['submit_button'] = '<button type="submit" class="btn btn-color-out">Post Comment</button>';
	$defaults['submit_field'] = '<div class="form-submit text-right">%1$s %2$s</div>';
	return $defaults;
}









register_activation_hook(__FILE__,function (){
	flush_rewrite_rules();
});

add_action( 'wp_enqueue_scripts', 'comet_scripts' );
function comet_scripts() {
	wp_enqueue_style( 'comet-bundle', get_template_directory_uri().'/assets/css/bundle.css' );
	wp_enqueue_style( 'comet-stylesheet', get_template_directory_uri().'/assets/css/style.css' );
	wp_enqueue_style( 'comet-style', get_stylesheet_uri() );

	wp_enqueue_script('html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js');
	wp_script_add_data('html5shim', 'conditional', 'lt IE 9');

	wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js');
	wp_script_add_data('respond', 'conditional', 'lt IE 9');

	wp_enqueue_script( 'comet-bundle', get_template_directory_uri() . '/assets/js/bundle.js', array('jquery'), '', true );
	wp_enqueue_script( 'comet-googlemap', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'), '', true );
	wp_enqueue_script( 'comet-main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}


