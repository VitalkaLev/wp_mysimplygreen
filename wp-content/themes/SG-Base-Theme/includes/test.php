
<?php 
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/includes/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/includes/acf/' );

include_once( MY_ACF_PATH . 'acf.php' );

add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');
function my_acf_settings_show_admin( $show_admin ) {
    return false;
}

// Admin fields to product
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