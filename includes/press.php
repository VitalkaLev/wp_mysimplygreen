<?php
// REGISTER CUSTOM TAXONOMIES
	register_post_type( 'press_release', 
	    array(
	      'public' => true,
	      'has_archive' => true,
	      'menu_position' => 5, // PLACES NEW CUSTOM POST TYPE DIRECTLY BELOW 'POSTS' ON SIDE ADMIN NAV
	      'menu_icon' => 'dashicons-id-alt', // YOU CAN SET A CUSTOM ICON FOR THE SIDE MENU HERE
	      
	      // THIS SETS UP ALL YOUR LABELS AND ADD/EDIT PROMPTS
	      'labels' => array(
	        'name' => __( 'Press Releases' ),
	        'singular_name' => __( 'Press Release' ),
	        'add_new' => __( 'Add New' ),
	        'add_new_item' => __( 'Add New Press Release' ),
	        'edit' => __( 'Edit' ),
	        'edit_item' => __( 'Edit Press Release' ),
	        'new_item' => __( 'New Press Release' ),
	        'view' => __( 'View Press Release' ),
	        'view_item' => __( 'View Press Release' ),
	        'search_items' => __( 'Search Press Releases' ),
	        'not_found' => __( 'No Press Release found' ),
	        'not_found_in_trash' => __( 'No Press Release found in Trash' ),
	      ),
	      		  
		  // YOU CAN SPECIFY EXACTLY WHAT YOU WANT THE POST TYPE TO SUPPORT, 
		  // MAKING IT SIMILAR TO PAIRED DOWN COMPARED TO REGULAR POSTS
		  'show_in_rest' => false,
		  'supports' => array('title','editor')
		) 
	);
 ?>