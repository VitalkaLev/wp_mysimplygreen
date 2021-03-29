<?php
// REGISTER CUSTOM TAXONOMIES
	register_post_type( 'testimonials', 
	    array(
	      'public' => true,
	      'has_archive' => true,
	      'menu_position' => 5, // PLACES NEW CUSTOM POST TYPE DIRECTLY BELOW 'POSTS' ON SIDE ADMIN NAV
	      'menu_icon' => 'dashicons-admin-users', // YOU CAN SET A CUSTOM ICON FOR THE SIDE MENU HERE
	      
	      // THIS SETS UP ALL YOUR LABELS AND ADD/EDIT PROMPTS
	      'labels' => array(
	        'name' => __( 'Testimonials' ),
	        'singular_name' => __( 'Testimonial' ),
	        'add_new' => __( 'Add New' ),
	        'add_new_item' => __( 'Add New Testimonial' ),
	        'edit' => __( 'Edit' ),
	        'edit_item' => __( 'Edit Testimonial' ),
	        'new_item' => __( 'New Testimonial' ),
	        'view' => __( 'View Testimonial' ),
	        'view_item' => __( 'View Testimonial' ),
	        'search_items' => __( 'Search Testimonials' ),
	        'not_found' => __( 'No Testimonials found' ),
	        'not_found_in_trash' => __( 'No Testimonials found in Trash' ),
	        'parent' => __( 'Parent Testimonial' ),
	      ),
	      		  
		  // YOU CAN SPECIFY EXACTLY WHAT YOU WANT THE POST TYPE TO SUPPORT, 
		  // MAKING IT SIMILAR TO PAIRED DOWN COMPARED TO REGULAR POSTS
		  'show_in_rest' => false,
		  'supports' => array('title','editor')
		) 
	);

function testimonials_meta(){
	add_meta_box(
    		'testimonials_meta_box', // $id
    		'testimonials Elements', // $title
    		'show_testimonials_meta_box', // $callback
    		'testimonials', // $screen
    		'side', // $context
    		'high' // $priority
    	);
}
function show_testimonials_meta_box() {
    	global $post;
    		$meta = get_post_meta( $post->ID, 'meta', true ); ?>

    	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
    <p>
        <label for="rating" style="font-weight:bold;">Service Rating</label>
        <br>1 - 4 stars.<br>
        <input type="text" name="meta[rating]" id="rating" size="1" value="<?php echo $meta['rating']; ?>">
    </p>
    <p>
        <label for="topic" style="font-weight:bold;">Topic</label>
        <br>
        <input type="text" name="meta[topic]" id="topic" style="width:100%;" value="<?php echo $meta['topic']; ?>">
    </p>
    	<?php }
function save_testimonials_meta( $post_id ) {
    	// verify nonce
    	if ( !wp_verify_nonce( $_POST['your_meta_box_nonce'], basename(__FILE__) ) ) {
    		return $post_id;
    	}
    	// check autosave
    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    		return $post_id;
    	}
    	// check permissions
    	if ( 'page' === $_POST['post_type'] ) {
    		if ( !current_user_can( 'edit_page', $post_id ) ) {
    			return $post_id;
    		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
    			return $post_id;
    		}
    	}

    	$old = get_post_meta( $post_id, 'testimonials', true );
    	$new = $_POST['meta'];

    	if ( $new && $new !== $old ) {
    		update_post_meta( $post_id, 'meta', $new );
    	} elseif ( '' === $new && $old ) {
    		delete_post_meta( $post_id, 'meta', $old );
    	}
    }
add_action( 'save_post', 'save_testimonials_meta' );
add_action( 'add_meta_boxes', 'testimonials_meta' );

 ?>