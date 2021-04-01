<?php
function cptui_register_my_taxes() {

/**
 * Taxonomy: Locations.
 */

$labels = [
    "name" => __( "Locations", "simplygroup" ),
    "singular_name" => __( "Location", "simplygroup" ),
    "all_items" => __( "ALL", "simplygroup" ),
    "edit_item" => __( "Edit", "simplygroup" ),
    "view_item" => __( "View", "simplygroup" ),
    "update_item" => __( "Update", "simplygroup" ),
    "add_new_item" => __( "Add New", "simplygroup" ),
    "new_item_name" => __( "New Item", "simplygroup" ),
    "search_items" => __( "Search", "simplygroup" ),
];

$args = [
    "label" => __( "Locations", "simplygroup" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'product-locations', 'with_front' => true,  'hierarchical' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "product_location",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
        ];
register_taxonomy( "product_location", [ "products" ], $args );

/**
 * Taxonomy: Sizes.
 */

$labels = [
    "name" => __( "Sizes", "simplygroup" ),
    "singular_name" => __( "Size", "simplygroup" ),
    "all_items" => __( "ALL", "simplygroup" ),
    "edit_item" => __( "Edit", "simplygroup" ),
    "view_item" => __( "View", "simplygroup" ),
    "update_item" => __( "Update", "simplygroup" ),
    "add_new_item" => __( "Add New", "simplygroup" ),
    "new_item_name" => __( "New Item", "simplygroup" ),
    "search_items" => __( "Search", "simplygroup" ),
];

$args = [
    "label" => __( "Sizes", "simplygroup" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'product-sizes', 'with_front' => true,  'hierarchical' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "product_size",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
        ];
register_taxonomy( "product_size", [ "products" ], $args );

/**
 * Taxonomy: Brands.
 */

$labels = [
    "name" => __( "Brands", "simplygroup" ),
    "singular_name" => __( "brand", "simplygroup" ),
    "all_items" => __( "ALL", "simplygroup" ),
    "edit_item" => __( "Edit", "simplygroup" ),
    "view_item" => __( "View", "simplygroup" ),
    "update_item" => __( "Update", "simplygroup" ),
    "add_new_item" => __( "Add New", "simplygroup" ),
    "new_item_name" => __( "New Item", "simplygroup" ),
    "search_items" => __( "Search", "simplygroup" ),
];

$args = [
    "label" => __( "Brands", "simplygroup" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'product-brands', 'with_front' => true,  'hierarchical' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "product_brand",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
        ];
register_taxonomy( "product_brand", [ "products" ], $args );

/**
 * Taxonomy: Products.
 */

$labels = [
    "name" => __( "Products", "simplygroup" ),
    "singular_name" => __( "Product", "simplygroup" ),
    "all_items" => __( "ALL", "simplygroup" ),
    "edit_item" => __( "Edit", "simplygroup" ),
    "view_item" => __( "View", "simplygroup" ),
    "update_item" => __( "Update", "simplygroup" ),
    "add_new_item" => __( "Add New", "simplygroup" ),
    "new_item_name" => __( "New Item", "simplygroup" ),
    "search_items" => __( "Search", "simplygroup" ),
];

$args = [
    "label" => __( "Products", "simplygroup" ),
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "hierarchical" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "show_in_nav_menus" => true,
    "query_var" => true,
    "rewrite" => [ 'slug' => 'product-models', 'with_front' => true,  'hierarchical' => true, ],
    "show_admin_column" => false,
    "show_in_rest" => true,
    "rest_base" => "product_model",
    "rest_controller_class" => "WP_REST_Terms_Controller",
    "show_in_quick_edit" => false,
        ];
register_taxonomy( "product_model", [ "products" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes' );

?>
