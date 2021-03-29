<?php 
	$dir = get_template_directory();
	// Update CSS within in Admin
	function admin_style() {
	  wp_enqueue_style('admin-styles', '/wp-content/themes/SG-Base-Theme/css/admin.css');
	}
	add_action('admin_enqueue_scripts', 'admin_style');
	add_theme_support( 'post-thumbnails' );
	// ADD CUSTOM POST TYPES AND CUSTOM META FIELDS
	function codex_custom_init(){
		require_once('includes/posts.php');
		require_once('includes/products.php');
		require_once('includes/testimonials.php');
		require_once('includes/press.php');
		require_once('includes/job-postings.php');
		add_post_type_support( 'products', 'thumbnail' );
	}
	// THEN YOU INITIALIZE THE CODE BY RUNNING THE "init" HOOK
	add_action( 'init', 'codex_custom_init' );


	// CUSTOM CATEGORY CLASS CODE
	function sps_category(){
	    $categories = get_the_category();   
	    foreach ( $categories as $category ) {
	        echo esc_html( $category->slug.' ' );	
	        //echo esc_html( $category->cat_name ).', ';	
    	}
	}

	// MANUALLY LIMIT THE EXCERPT COUNT
	function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

	// REGISTER NEW MENUS
	function register_my_menus() {
	    register_nav_menus(
	        array(
	            'primary-menu' => __( 'menu-top' ),
	            'secondary-menu' => __( 'footer-top' ),
	            'tertiary-menu' => __( 'footer-bottom' ),
	            'builder-primary-menu' => __( 'menu-top' ),
	            'builder-secondary-menu' => __( 'footer-top' ),
	            'builder-tertiary-menu' => __( 'footer-bottom' )
			)
	    );
	}
	add_action( 'init', 'register_my_menus' );

	// REGISTER SIDE BARS
	function wpdocs_theme_slug_widgets_init() {
	    register_sidebar( array(
	        'name'          => __( 'Footer Text', 'textdomain' ),
	        'id'            => 'sidebar-1',
	        'description'   => __( 'Text in this area will be shown on all posts and pages.', 'textdomain' ),
	        'before_widget' => '',
	        'after_widget'  => '',
	        'before_title'  => '',
	        'after_title'   => '',
	    ) );
	}
	add_action( 'widgets_init', 'wpdocs_theme_slug_widgets_init' );

	// ONLY ALLOW CERTAIN BLOCK TYPES
	add_filter( 'allowed_block_types', 'codesquid_allowed_block_types' );
 
function codesquid_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'core/paragraph',
		'core/heading',
		'core/list',
		'core/html',
		'block-lab/sg-hero',
		'block-lab/featured-products',
		'block-lab/form-block',
		'block-lab/half-and-half',
		'block-lab/half-and-half-products',
		'block-lab/info-block',
		'block-lab/image-flex-list',
		'block-lab/logo-salad',
		'block-lab/price-block',
		'block-lab/testimonials',
		'block-lab/two-column-list',
		'block-lab/bottom-form',
		'block-lab/faq-block',
		'block-lab/all-testimonials',
		'block-lab/contact-block',
		'block-lab/stats-block',
		'block-lab/timeline-block',
		'block-lab/all-products',
		'block-lab/job-listings',
		'block-lab/plan-forms',
		'block-lab/video-block'
	);
 
}

/**
* Customizer additions.
*/
require $dir.'/includes/customizer.php';


?>