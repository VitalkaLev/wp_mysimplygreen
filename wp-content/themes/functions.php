<?php 
	add_filter('excerpt_more', function($more) {
		return '';
	});

  	function dd( $data ){
		echo '<pre>';
			var_dump( $data );
		echo '</pre>';
 	}

	// CUSTOM CATEGORY CLASS CODE
	function sps_category(){
		$categories = get_the_category();   
		foreach ( $categories as $category ) {
			echo esc_html( $category->slug.' ' );	
			//echo esc_html( $category->cat_name ).', ';	
		}
	}
	

	// Filter AJAX
	add_action( 'wp_ajax_nopriv_load-filter', 'product_ajax_get' );
	add_action( 'wp_ajax_load-filter', 'product_ajax_get' );
	
	function product_ajax_get () {

		$product_category = $_POST['product_category'];
		// dd($product_category);

		if( !empty($_POST['product_brands'])  ){
			$brand_name = $_POST['product_brands'];
		} else {
			$brand_name = 'NOT EXISTS';
		}
		dd($brand_name);
		
		if( !empty($_POST['product_models']) ){
			$product_model = $_POST['product_models'];
		} else {
			$product_model = 'NOT EXISTS';
		}

		dd($product_model);
		

		if( !empty($_POST['product_locations'])  ){
			$product_location = $_POST['product_locations'];
		} else {
			$product_location = 'NOT EXISTS';
		}
		dd($product_location);

		if( !empty($_POST['product_sizes']) ){
			$product_size = $_POST['product_sizes'];
		} else {
			$product_size = 'NOT EXISTS';
		}
		dd($product_size);

		if( !empty($_POST['product_sizes']) || !empty($_POST['product_locations'])  ||  !empty($_POST['product_models']) || !empty($_POST['product_brands'])  ){
			echo 'and';
			$product_args = array(
				'post_type' => 'products',
				'numberposts'   => -1,          
				'post_status'   => 'publish',
				'orderby' => 'name',
				'order' => 'ASC',
				'tax_query'	=> array(
					'relation'		=> 'AND',
					array(
						'taxonomy' => 'product_model',
						'field' => 'name',
						'terms'	  	=> $product_model ,
					),
					array(
						'taxonomy' => 'product_location',
						'field' => 'name',
						'terms'	  	=> $product_location ,
					),
					array(
						'taxonomy' => 'product_brand',
						'field' => 'name',
						'terms'	  	=> $brand_name ,
					),
					array(
						'taxonomy' => 'product_size',
						'field' => 'name',
						'terms'	  	=> $product_size ,
					),
				),
			);

		} else {
			echo 'OR';
			$product_args = array(
				'post_type' => 'products',
				'numberposts'   => -1,          
				'post_status'   => 'publish',
				'orderby' => 'name',
				'order' => 'ASC',
				'tax_query'	=> array(
					'relation'		=> 'OR',
					array(
						'taxonomy' => 'product_model',
						'field' => 'name',
						'terms'	  	=> $product_model ,
					),
					array(
						'taxonomy' => 'product_location',
						'field' => 'name',
						'terms'	  	=> $product_location ,
						// 'operator' => 'NOT IN'
					),
					array(
						'taxonomy' => 'product_brand',
						'field' => 'name',
						'terms'	  	=> $brand_name ,
					),
					array(
						'taxonomy' => 'product_size',
						'field' => 'name',
						'terms'	  	=> $product_size ,
					),
				),
			);

		}
	
		

		$product_posts = get_posts( $product_args );
		dd( $product_posts );
		ob_start ();
	
		if ( $product_posts ) {
			foreach ( $product_posts as $product_post ) { setup_postdata( $product_post ); ?>

				<div class="item" style="display: grid">
					  <div class="text-side">
					    <!-- <php echo get_field('acf_product_brand_logo', $product_post->ID); ?> -->

					  	<?php echo wp_get_attachment_image(get_field('acf_product_brand_logo', $product_post->ID),'medium'); ?>
						<h3><?php echo get_the_title($product_post->ID); ?></h3>
						<p><?php echo get_the_excerpt($product_post->ID);?></p>        
						<div class="cta-block"><a href="<?php the_permalink($product_post->ID); ?>">View details ›</a></div>                
					</div>
					<div class="image-side">
						<?php echo wp_get_attachment_image(get_post_thumbnail_id($product_post->ID),'medium'); ?>
					</div>
				</div>

			<?php } 
		} else {
			echo 'Not Found';
		}
		
		wp_reset_postdata(); 

		$response = ob_get_contents();
		ob_end_clean();

		echo $response;
		die(1);
	}




	// function get_query_tax( $post_type , $taxonomy , $meta_key ) {

	// 	$query_args = array(
	// 		'post_type' => $post_type,
	// 		'posts_per_page' => -1,
	// 		'post_status' => 'publish',
	// 		'order' => 'DESC',
	// 		'meta_key' => $meta_key,
	// 		'orderby' => 'meta_query',
	// 		'tax_query' => array(
	// 			array(
	// 				'taxonomy' => $taxonomy,
	// 				'field'    => 'id',
	// 				'terms'    => get_queried_object()->post_name,
	// 			),
	// 		),
	// 	);

	// 	$query_posts = new WP_Query( $query_args );
	// 	return $query_posts; 
	
	// }


	function get_list_tax( $taxonomy ) {
		$taxonomy_args = array(
			'orderby'       => 'term_id', 
			'order'         => 'ASC',
			'hide_empty'    => true, 
		);
		$list_tax = get_terms( $taxonomy, $taxonomy_args );
		return $list_tax; 
	}




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