<?php 
	add_filter('excerpt_more', function($more) {
		return '';
	});

// require get_template_directory() . '/includes/acf.php';
// Define path and URL to the ACF plugin.

define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

// Admin fields to product
// add_action('acf/init', 'my_function_to_add_field_groups');
add_action( 'acf/register_fields', 'my_function_to_add_field_groups' );
function my_function_to_add_field_groups() {

	if( function_exists('acf_add_local_field_group') ):

		acf_add_local_field_group(array(
			'key' => 'group_6058dfcca25f5',
			'title' => 'Product Informations - left column',
			'fields' => array(
				array(
					'key' => 'field_6058e2c565488',
					'label' => 'Short Content',
					'name' => 'acf_product_info',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '<p><strong><span style="color: #56a63f;">Lots of Warmth, Less Energy Wasted</span></strong><br>
		Brand Is Known For:<br>
		Lennox furnaces are some of the most efficient and<br>
		quietest heating systems you can buy*. They’re<br>
		engineered for perfect warmth and savings.</p>
		<p><strong>Our Expert Advice:</strong><br>
		If you’re looking to buy vs lease, we recommend Lennox<br>
		furnaces because they have a long history of building<br>
		high-quality, long-lasting equipment.</p>
		high-quality, long-lasting equipment.</p>',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
				array(
					'key' => 'field_6059db1ad5644',
					'label' => 'Offer Text',
					'name' => 'acf_product_offer_text',
					'type' => 'textarea',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'Cash pricing and maintenance
		and protection plans also
		available.',
					'placeholder' => '',
					'maxlength' => '',
					'rows' => '',
					'new_lines' => 'br',
				),
				array(
					'key' => 'field_6058e33e0fd81',
					'label' => 'Offer List',
					'name' => 'acf_product_offer',
					'type' => 'repeater',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'collapsed' => 'field_6058e3680fd82',
					'min' => 0,
					'max' => 0,
					'layout' => 'block',
					'button_label' => 'Add item',
					'sub_fields' => array(
						array(
							'key' => 'field_6058e3680fd82',
							'label' => 'Content',
							'name' => 'acf_product_offer_content',
							'type' => 'text',
							'instructions' => '',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '',
								'class' => '',
								'id' => '',
							),
							'default_value' => '$0 upfront costs',
							'placeholder' => 'Content',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
						),
					),
				),
				array(
					'key' => 'field_6059dae5d5643',
					'label' => 'Modal Content',
					'name' => 'acf_product_modal',
					'type' => 'wysiwyg',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'tabs' => 'all',
					'toolbar' => 'full',
					'media_upload' => 1,
					'delay' => 0,
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'products',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'normal',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		acf_add_local_field_group(array(
			'key' => 'group_6058e50a791e2',
			'title' => 'Product Informations - right column',
			'fields' => array(
				array(
					'key' => 'field_6059da89fa5fa',
					'label' => 'Brand (logo)',
					'name' => 'acf_product_brand_logo',
					'type' => 'image',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id',
					'preview_size' => 'thumbnail',
					'library' => 'all',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
				array(
					'key' => 'field_6059da5afa5f9',
					'label' => 'Brand (model)',
					'name' => 'acf_product_brand_model',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 'KeepRite Furnace',
					'placeholder' => 'Brand (name)',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6058e50aa4024',
					'label' => 'Price',
					'name' => 'acf_product_price',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '$$$',
					'placeholder' => 'Price',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6058e50aa3859',
					'label' => 'Btu',
					'name' => 'acf_product_btu',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => 45,
					'placeholder' => 'Btu',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6058e50aa3c45',
					'label' => 'Rating',
					'name' => 'acf_product_rating',
					'type' => 'text',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '96%',
					'placeholder' => 'Rating',
					'prepend' => '',
					'append' => '',
					'maxlength' => '',
				),
				array(
					'key' => 'field_6058e50aa30a6',
					'label' => 'Gallery',
					'name' => 'acf_product_gallery',
					'type' => 'gallery',
					'instructions' => '',
					'required' => 0,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'return_format' => 'id',
					'preview_size' => 'medium',
					'insert' => 'append',
					'library' => 'all',
					'min' => '',
					'max' => '',
					'min_width' => '',
					'min_height' => '',
					'min_size' => '',
					'max_width' => '',
					'max_height' => '',
					'max_size' => '',
					'mime_types' => '',
				),
			),
			'location' => array(
				array(
					array(
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'products',
					),
				),
			),
			'menu_order' => 0,
			'position' => 'side',
			'style' => 'default',
			'label_placement' => 'top',
			'instruction_placement' => 'label',
			'hide_on_screen' => '',
			'active' => true,
			'description' => '',
		));
		
		endif;
	
	

   
}


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


/**
* Admin Fields additions.
*/
require get_template_directory() . '/includes/swipeks.php';






// options page(s)

if( function_exists('acf_add_options_page') ) {

	

	acf_add_options_page(array(

		'page_title' 	=> 'Swipeks settings',

		'menu_title'	=> 'Swipeks settings',

		'icon_url'      => 'dashicons-tide',

		'menu_slug' 	=> 'theme-general-settings',

		'capability'	=> 'edit_posts',

		'redirect'		=> false

	));

}



add_filter('acf/format_value/type=textarea', 'do_shortcode');


add_action('acf/render_field_settings/type=image', 'add_default_value_to_image_field', 20);
  function add_default_value_to_image_field($field) {
    acf_render_field_setting( $field, array(
      'label'      => __('Default Image ID','acf'),
      'instructions'  => __('Appears when creating a new post','acf'),
      'type'      => 'image',
      'name'      => 'default_value',
    ));
  }


add_filter('acf/format_value/type=wysiwyg', 'format_value_wysiwyg', 10, 3);
function format_value_wysiwyg( $value, $post_id, $field ) {
	$value = apply_filters( 'the_content', $value );
	return $value;
}


add_filter('the_content', 'do_shortcode');