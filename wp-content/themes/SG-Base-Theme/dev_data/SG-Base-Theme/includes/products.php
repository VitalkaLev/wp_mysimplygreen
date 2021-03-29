<?php
// REGISTER CUSTOM TAXONOMIES
	register_post_type( 'products', 
	    array(
	      'public' => true,
	      'has_archive' => true,
	      'menu_position' => 5, // PLACES NEW CUSTOM POST TYPE DIRECTLY BELOW 'POSTS' ON SIDE ADMIN NAV
	      'menu_icon' => 'dashicons-tag', // YOU CAN SET A CUSTOM ICON FOR THE SIDE MENU HERE
	      
	      // THIS SETS UP ALL YOUR LABELS AND ADD/EDIT PROMPTS
	      'labels' => array(
	        'name' => __( 'Products' ),
	        'singular_name' => __( 'Product' ),
	        'add_new' => __( 'Add New' ),
	        'add_new_item' => __( 'Add New Product' ),
	        'edit' => __( 'Edit' ),
	        'edit_item' => __( 'Edit Product' ),
	        'new_item' => __( 'New Product' ),
	        'view' => __( 'View Product' ),
	        'view_item' => __( 'View Product' ),
	        'search_items' => __( 'Search Products' ),
	        'not_found' => __( 'No Products found' ),
	        'not_found_in_trash' => __( 'No Products found in Trash' ),
	        'parent' => __( 'Parent Product' ),
	      ),
	      
	      // YOU CAN REGISTER CUSTOM TAXONOMIES HERE
		  'taxonomies' => array('post_tag','category'),
		  
		  // YOU CAN SPECIFY EXACTLY WHAT YOU WANT THE POST TYPE TO SUPPORT, 
		  // MAKING IT SIMILAR TO PAIRED DOWN COMPARED TO REGULAR POSTS
		  'show_in_rest' => false,
		  'supports' => array('title','editor','thumbnail','excerpt','tags')
		) 
	);

function products_meta(){
	add_meta_box(
    		'products_meta_box', // $id
    		'products Elements', // $title
    		'show_products_meta_box', // $callback
    		'products', // $screen
    		'side', // $context
    		'high' // $priority
    	);
}
function show_products_meta_box() {
    	global $post;
    		$meta = get_post_meta( $post->ID, 'meta', true ); ?>

    	<input type="hidden" name="your_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

        <!-- All fields will go here -->
	<p>
    	<label for="thumbnail_url" style="font-weight:bold;">Product Logo</label>
    	<br>
    	<div id="tile-preview"><img src="<?php echo $meta['thumbnail_url']; ?>" style="max-width: 250px;"></div>
<input type="text" name="meta[thumbnail_url]" id="tile" class="regular-text" value="<?php echo $meta['thumbnail_url']; ?>">
        <input type="button" class="button tile-upload" value="Browse" style="width:100%;">

    </p>
<script>
  jQuery(document).ready(function($) {
    $('.tile-upload').on('click', function(){
        tb_show('', 'media-upload.php?TB_iframe=true');
        window.send_to_editor = function(html) {
        url = jQuery(html).attr('href');
        jQuery('#tile').val(url);
        jQuery('#tile-preview img').attr('src',url);
        tb_remove();
    };
    return false;
    });
  })
</script>
    	<?php }
function save_products_meta( $post_id ) {
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

    	$old = get_post_meta( $post_id, 'products', true );
    	$new = $_POST['meta'];

    	if ( $new && $new !== $old ) {
    		update_post_meta( $post_id, 'meta', $new );
    	} elseif ( '' === $new && $old ) {
    		delete_post_meta( $post_id, 'meta', $old );
    	}
    }
add_action( 'save_post', 'save_products_meta' );
add_action( 'add_meta_boxes', 'products_meta' );

 ?>