<?php 
/**
* Create Logo and brand color Setting and Upload Control
*/
$dir = get_template_directory_uri();
function your_theme_new_customizer_settings($wp_customize) {
// add a setting for the site logo
$wp_customize->add_setting('your_theme_logo');
// Add a control to upload the logo
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'your_theme_logo',
array(
'label' => 'Upload Logo',
'section' => 'title_tagline',
'settings' => 'your_theme_logo',
) ) );
// add a setting for the site builder logo
$wp_customize->add_setting('your_theme_builder_logo');
// Add a control to upload the logo
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'your_theme__builder_logo',
array(
'label' => 'Upload Builder Logo',
'section' => 'title_tagline',
'settings' => 'your_theme_builder_logo',
) ) );
// add a setting for the site footer logo
$wp_customize->add_setting('your_theme_footer_logo');
// Add a control to upload the footer logo
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'your_theme_footer_logo',
array(
'label' => 'Upload White Footer Logo',
'section' => 'title_tagline',
'settings' => 'your_theme_footer_logo',
) ) );

// add a setting for the site brand color
$wp_customize->add_setting('base_color');

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'base_color',
        array(
            'label'          => __( 'Green or Blue version?', 'Simply Group Base Theme' ),
            'section'        => 'title_tagline',
            'settings'       => 'base_color',
            'type'           => 'radio',
            'choices'        => array(
                'sg'   => __( 'Green' ),
                'sp'  => __( 'Blue' )
            )
        )
    )
);

// add a setting for the site phone number
$wp_customize->add_setting('phone_number');

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'phone_number',
        array(
            'label'          => __( 'Phone Number', 'Simply Group Base Theme' ),
            'section'        => 'title_tagline',
            'settings'       => 'phone_number',
            'type'           => 'text'
        )
    )
);

// add a setting for the builder site phone number
$wp_customize->add_setting('builder_phone_number');

$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'builder_phone_number',
        array(
            'label'          => __( 'Builder Phone Number', 'Simply Group Base Theme' ),
            'section'        => 'title_tagline',
            'settings'       => 'builder_phone_number',
            'type'           => 'text'
        )
    )
);

}
add_action('customize_register', 'your_theme_new_customizer_settings');
?>
