<?php
// REGISTER CUSTOM TAXONOMIES
	register_post_type( 'job_postings', 
	    array(
	      'public' => true,
	      'has_archive' => true,
	      'menu_position' => 5, // PLACES NEW CUSTOM POST TYPE DIRECTLY BELOW 'POSTS' ON SIDE ADMIN NAV
	      'menu_icon' => 'dashicons-nametag', // YOU CAN SET A CUSTOM ICON FOR THE SIDE MENU HERE
	      
	      // THIS SETS UP ALL YOUR LABELS AND ADD/EDIT PROMPTS
	      'labels' => array(
	        'name' => __( 'Job Postings' ),
	        'singular_name' => __( 'Job Posting' ),
	        'add_new' => __( 'Add New' ),
	        'add_new_item' => __( 'Add New Job Posting' ),
	        'edit' => __( 'Edit' ),
	        'edit_item' => __( 'Edit Job Posting' ),
	        'new_item' => __( 'New Job Posting' ),
	        'view' => __( 'View Job Posting' ),
	        'view_item' => __( 'View Job Posting' ),
	        'search_items' => __( 'Search Job Postings' ),
	        'not_found' => __( 'No Job Postings found' ),
	        'not_found_in_trash' => __( 'No Job Postings found in Trash' ),
	      ),
	      		  
		  // YOU CAN SPECIFY EXACTLY WHAT YOU WANT THE POST TYPE TO SUPPORT, 
		  // MAKING IT SIMILAR TO PAIRED DOWN COMPARED TO REGULAR POSTS
		  'show_in_rest' => false,
		  'supports' => array('title','editor','excerpt','job-post-type'),
		) 
	);
/**
 * Register a 'job_type' taxonomy for post type 'job_postings'.
 *
 * @see register_post_type for registering post types.
 */
function job_postings_taxonomy_init() {
    register_taxonomy( 'job_type', 'job_postings', array(
        'label'        => __( 'Job Type', 'textdomain' ),
        'rewrite'      => array( 'slug' => 'job_type' ),
        'hierarchical' => true,
    ) );
}

function job_meta(){
    add_meta_box(
            'job_meta_box', // $id
            'Job Posting Elements', // $title
            'show_job_meta_box', // $callback
            'job_postings', // $screen
            'side', // $context
            'high' // $priority
        );
}
function show_job_meta_box() {
        global $post;
            $meta = get_post_meta( $post->ID, 'meta', true ); ?>

        <input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
    <p>
        <label for="location" style="font-weight:bold;">Location</label>
        <br>
        <input type="text" name="meta[location]" id="tile" value="<?php echo $meta['location']; ?>" style="width:100%;">
    </p>
    <p>
        <label for="department" style="font-weight:bold;">Department</label>
        <br>
        <input type="text" name="meta[department]" id="department" value="<?php echo $meta['department']; ?>" style="width:100%;">
    </p>
    <p>
        <label for="employment_type" style="font-weight:bold;">Employment Type</label>
        <br>
        <input type="text" name="meta[employment_type]" id="employment_type" value="<?php echo $meta['employment_type']; ?>" style="width:100%;">
    </p>
    <p>
        <label for="pay" style="font-weight:bold;">Salary</label>
        <br>
        <input type="text" name="meta[pay]" id="pay" value="<?php echo $meta['pay']; ?>" style="width:100%;">
    </p>
<?php }
function save_job_meta( $post_id ) {
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

        $old = get_post_meta( $post_id, 'job_postings', true );
        $new = $_POST['meta'];

        if ( $new && $new !== $old ) {
            update_post_meta( $post_id, 'meta', $new );
        } elseif ( '' === $new && $old ) {
            delete_post_meta( $post_id, 'meta', $old );
        }
    }
    add_action( 'save_post', 'save_job_meta' );
    add_action( 'add_meta_boxes', 'job_meta' );
    add_action( 'init', 'job_postings_taxonomy_init', 0 );
 ?>