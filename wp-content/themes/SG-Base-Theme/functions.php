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

		$dir = "/wp-content/themes/SG-Base-Theme";

		if( !empty($_POST['product_brands'])  ){
			$brand_name = $_POST['product_brands'];
		} 
		// dd($brand_name);
		
		if( !empty($_POST['product_models']) ){
			$product_model = $_POST['product_models'];
		} 
		// dd($product_model);
		

		if( !empty($_POST['product_locations'])  ){
			$product_location = $_POST['product_locations'];
		} 
		// dd($product_location);

		if( !empty($_POST['product_sizes']) ){
			$product_size = $_POST['product_sizes'];
		} 
		// dd($product_size);

		if( !empty($_POST['product_sizes']) and !empty($_POST['product_locations'])  and  !empty($_POST['product_models']) and !empty($_POST['product_brands'])  ){
			// echo 'and';
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
						'operator' => 'OR'
					),
					array(
						'taxonomy' => 'product_location',
						'field' => 'name',
						'terms'	  	=> $product_location ,
						'operator' => 'OR'
					),
					array(
						'taxonomy' => 'product_brand',
						'field' => 'name',
						'terms'	  	=> $brand_name ,
						'operator' => 'OR'
					),
					array(
						'taxonomy' => 'product_size',
						'field' => 'name',
						'terms'	  	=> $product_size ,
						'operator' => 'OR'
					),
				),
			);

		} else {
			// echo 'OR';
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
		// dd( $product_posts );
		ob_start ();
	
		if ( $product_posts ) {
			foreach ( $product_posts as $product_post ) { setup_postdata( $product_post ); ?>

				<div class="item">
                        <div class="item__logo">
                            <picture>
                                <source srcset="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" media="(max-width: 560px) ">
                                <img src="<?php echo wp_get_attachment_image_url(get_field('acf_product_brand_logo', $product_post->ID) , 'medium'); ?>" alt="описание" />
                            </picture>
                        </div>
                        <div class="item__hero">
                            <div class="item__title">
                                <span><?php the_title(); ?></span>
                            </div>
                            <a href="<?php the_permalink($product_post->ID); ?>" class="item__link">
                                <?php echo get_field('acf_product_brand_name', $product_post->ID); ?>
                            </a>
                            <div class="item__characteristics">
                                <div class="item__characteristic ">
                                    <span><?php echo get_field('acf_product_btu', $product_post->ID); ?></span>
                                    <span>BTU</span>
                                </div>
                                <div class="item__characteristic">
                                    <span><?php echo get_field('acf_product_rating', $product_post->ID); ?></span>
                                    <span>Efficiency Rating</span>
                                </div>
                                <div class="item__characteristic">
                                    <span><?php echo get_field('acf_product_size', $product_post->ID); ?></span>
                                    <span>Size</span>
                                </div>
                            </div>
                            <div class="item__slider">
                                <?php 

                                    $gallery = get_field('acf_product_gallery', $product_post->ID);

                                    if( $gallery ): ?>
                                    
                                        <?php foreach( $gallery as $gallery_item ): ?>
                                            <?php if( !empty($gallery_item) ){ ?>
                                                <a href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo wp_get_attachment_image_url( $gallery_item , 'large'); ?>" media="(max-width: 560px) ">
                                                        <img src="<?php echo wp_get_attachment_image_url( $gallery_item , 'large'); ?>" alt="описание" />
                                                    </picture>
                                                </a>
                                            <?php } else { ?>
                                                <a  href="<?php the_permalink($product_post->ID); ?>" class="item__slide">   
                                                    <picture class="h-object-fit">
                                                        <source srcset="<?php echo $dir; ?>/placeholder.png" media="(max-width: 560px) ">
                                                        <img src="<?php echo $dir; ?>/placeholder.png" alt="описание" />
                                                    </picture>
                                                </a>
                                            <?php } ?>

                                              
                                        <?php endforeach; ?>
                                    
                                    <?php endif; ?>
                            
                            </div>
                            <div class="item__recommend">
                                <span><?php echo get_the_excerpt($product_post->ID);?></span>
                            </div>
                            <a href="<?php the_permalink($product_post->ID); ?>" class="item__link">Learn more</a>
                        </div>
                        <div class="item__info">
                            <div class="item__desc">
                                <?php echo get_field('acf_product_info', $product_post->ID); ?>
                            </div>
                            <div class="item__rate-price">
                                <div class="item__rate">
                                    <div class="item__rate-stars">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                        <img src="<?php echo $dir; ?>/images/star-green.svg" alt="star">
                                    </div>
                                    <span>Google Rating</span>
                                </div>
                                <div class="item__price">
                                    <span>Relative Price: <?php echo get_field('acf_product_price', $product_post->ID); ?></span>
                                </div>
                            </div>
                            <div class="item__offer-txt">
                                
                                <?php if( have_rows('acf_product_offer') ): ?>
                                    <ul class="item__offer-list ">
                                        <?php while( have_rows('acf_product_offer') ): the_row(); ?>

                                            <li>
                                                <i class="fas fa-check-circle"></i>
                                                <span>
                                                    <?php echo get_sub_field('acf_product_offer_content', $product_post->ID); ?>
                                                </span>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                <?php endif; ?>


                                <div class="item__txt">
                                    <span>
                                        <?php echo get_field('acf_product_offer_text', $product_post->ID); ?>
                                    </span>
                                </div>
                            </div>
                            <div class="item__links">
                                <a href="#" class="button">Benefits of leasing</a>
                                <a href="#" class="button">Speak to a home specialist </a>
                            </div>
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