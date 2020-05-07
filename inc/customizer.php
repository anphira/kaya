<?php
/**
 * Kaya Theme Customizer.
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.9
 *
 * Included with WordPress Sanitize Functions:
 * sanitize_email()
 * sanitize_file_name()
 * sanitize_html_class()
 * sanitize_key()
 * sanitize_meta()
 * sanitize_mime_type()
 * sanitize_option()
 * sanitize_sql_orderby()
 * sanitize_text_field()
 * sanitize_title()
 * sanitize_title_for_query()
 * sanitize_title_with_dashes()
 * sanitize_user()
 * esc_html
 * esc_url
 * esc_js
 * esc_attr
 * esc_textarea
 * 
 */
 
$kaya_theme_setup_guide_url = 'https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/';

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kaya_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';


 $wp_customize->remove_control("header_image");
 $wp_customize->remove_control("header_textcolor");
 $wp_customize->remove_control("background_color");

	// Remove Background image section from customizer 
	$wp_customize->remove_section("background_image");
}
add_action( 'customize_register', 'kaya_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kaya_customize_preview_js() {
	wp_enqueue_script( 'kaya_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'kaya_customize_preview_js' );


/**
 * Adding Help Options
 */
function kaya_add_help_options($wp_customize) {
	$wp_customize->add_section('kaya_help', array(
		'title' => 'Need Setup Help? Start Here',
		'description' => '<strong>Kaya Setup Instructions</strong><br /><br />
		<a href="https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/">Cick here for Setup Guide</a><br /><br />
		<a href="https://github.com/anphira/kaya">Click here for Kaya GitHub project</a><br />
		If you have a theme error to report, you can do so on the Github project',
		'priority' => 10
	));
	
	$wp_customize->add_setting('kaya_help_textarea', array('sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_help_textarea', array(
		'label'           => __( 'Notes', 'kaya' ),
		'description'	  => __( 'Enter any notes you would like to keep for yourself here', 'kaya'),
		'type'            => 'textarea',
		'section'         => 'kaya_help',
		'settings'   => 'kaya_help_textarea',
		)
	) );
}
add_action('customize_register', 'kaya_add_help_options');


/**
 * Create Logo Setting and Upload Control
 */
function kaya_add_logo($wp_customize) {
	// add a setting for the site logo
	$wp_customize->add_setting('kaya_logo', array('sanitize_callback' => 'kaya_sanitize_logo'));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_logo',
		array(
			'label' =>  __( 'Upload Logo', 'kaya' ),
			'section' => 'title_tagline',
			'settings' => 'kaya_logo',
		) 
	) );

	$wp_customize->add_setting('kaya_logo_width', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_logo_width', array(
		'label'           => __( 'Logo Width (in pixels)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'title_tagline',
		'settings'   => 'kaya_logo_width',
		)
	) );

	$wp_customize->add_setting('kaya_logo_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_logo_height', array(
		'label'           => __( 'Logo Height (in pixels)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'title_tagline',
		'settings'   => 'kaya_logo_height',
		)
	) );
}
add_action('customize_register', 'kaya_add_logo');



/**
 * Adding Colors Options
 */
function kaya_add_colors($wp_customize) {
	$wp_customize->add_setting('kaya_header_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_header_background_color', array(
		'label'        => __( 'Heading Section:<hr />Header Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_header_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_menu_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_menu_background_color', array(
		'label'        => __( 'Menu Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_menu_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_menu_text_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_menu_text_color', array(
		'label'        => __( 'Menu Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_menu_text_color',
		) 
	) );
	$wp_customize->add_setting('kaya_menu_text_hover_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_menu_text_hover_color', array(
		'label'        => __( 'Menu Text Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_menu_text_hover_color',
		) 
	) );

	$wp_customize->add_setting('kaya_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_background_color', array(
		'label'        => __( 'Main Content Section:<hr />Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_background_color',
		) 
	) );

	// add a setting for background image
	$wp_customize->add_setting('kaya_background_image', array('sanitize_callback' => 'kaya_sanitize_logo'));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_background_image',
		array(
			'label' =>  __( 'Upload Background Image', 'kaya' ),
			'section' => 'colors',
			'settings' => 'kaya_background_image',
		) 
	) );
	
	$wp_customize->add_setting('kaya_background_image_type', array('sanitize_callback' => 'kaya_sanitize_background_select'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_background_image_type', array(
		'label'           => __( 'Style of Background Image', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'dont_use' => 'Dont use image',
								'tile_image' => 'Tile image',
								'fix_to_top' => 'Affix background image to top',
								'fix_to_bottom' => 'Affix background image to bottom',
								'stretch' => 'Stetch image to cover whole background',
								'fixed_pos' => 'Fixed position so background doesnt scroll',
							 ),
		'section'         => 'colors',
		'settings'   => 'kaya_background_image_type',
		)
	) );

	$wp_customize->add_setting('kaya_heading_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_heading_color', array(
		'label'        => __( 'Heading Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_heading_color',
		) 
	) );
	$wp_customize->add_setting('kaya_text_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_text_color', array(
		'label'        => __( 'Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_text_color',
		) 
	) );

	
	$wp_customize->add_setting('kaya_link_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_link_color', array(
		'label'        => __( 'Link Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_link_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_link_hover_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_link_hover_color', array(
		'label'        => __( 'Link Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_link_hover_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_button_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_button_color', array(
		'label'        => __( 'Button Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_color',
		) 
	) );
	$wp_customize->add_setting('kaya_button_hover_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_button_hover_color', array(
		'label'        => __( 'Button Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_hover_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_button_text_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
'kaya_button_text_color', array(
		'label'        => __( 'Button Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_text_color',
		) 
	) );
	

	$wp_customize->add_setting('kaya_button_hover_text_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
'kaya_button_hover_text_color', array(
		'label'        => __( 'Button Hover Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_hover_text_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_footer_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_footer_background_color', array(
		'label'        => __( 'Footer Section:<hr />Footer Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_footer_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_footer_heading_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_footer_heading_color', array(
		'label'        => __( 'Footer Heading Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_footer_heading_color',
		) 
	) );
	$wp_customize->add_setting('kaya_footer_text_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_footer_text_color', array(
		'label'        => __( 'Footer Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_footer_text_color',
		) 
	) );
	$wp_customize->add_setting('kaya_footer_link_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_footer_link_color', array(
		'label'        => __( 'Footer Link Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_footer_link_color',
		) 
	) );
	$wp_customize->add_setting('kaya_lower_footer_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_lower_footer_background_color', array(
		'label'        => __( 'Footer Copyright Area Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_lower_footer_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_lower_footer_text_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_lower_footer_text_color', array(
		'label'        => __( 'Lower Footer Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_lower_footer_text_color',
		) 
	) );
	$wp_customize->add_setting('kaya_social_icon_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_social_icon_color', array(
		'label'        => __( 'Social Icon Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_social_icon_color',
		) 
	) );
	
	$wp_customize->add_setting('kaya_social_icon_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_social_icon_background_color', array(
		'label'        => __( 'Social Icon Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_social_icon_background_color',
		) 
	) );
}
add_action('customize_register', 'kaya_add_colors');


/**
 * Adding Header Options
 */
function kaya_add_header_options($wp_customize) {
	$wp_customize->add_section('kaya_header', array(
		'title' => 'Header Options',
		'description' => 'Settings for Header',
		'priority' => 60,
	));
	
	$wp_customize->add_setting('kaya_header_columns', array('sanitize_callback' => 'kaya_sanitize_header_columns'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_header_columns', array(
		'label'           => __( 'Number of Header Columns', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'one_column' => 'Single Column',
								'two_column' => 'Two Columns',
								'three_column' => 'Three Columns',
								'four_column' => 'Four Columns',
								'logo_menu' => 'Logo Left Menu Right',
								'logo_left_right_content' => 'Logo Left Content Right',
							 ),
		'section'         => 'kaya_header',
		'settings'   => 'kaya_header_columns',
		)
	) );
	
	$wp_customize->add_setting('kaya_transparent_header', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
'kaya_transparent_header', array(
		'label'           => __( 'Make Header Transparent', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_header',
		'settings'   => 'kaya_transparent_header',
		)
	) );
	
	$wp_customize->add_setting('kaya_top_header', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
'kaya_top_header', array(
		'label'           => __( 'Use top header bar', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_header',
		'settings'   => 'kaya_top_header',
		)
	) );
	
	$wp_customize->add_setting('kaya_hide_mobile_button_menu', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_hide_mobile_button_menu', array(
		'label'           => __( 'Hide Mobile Menu', 'kaya' ),
		'description'	  => 'Check to hide the mobile menu, useful when using a third party menu plugin',
		'type'            => 'checkbox',
		'section'         => 'kaya_header',
		'settings'   => 'kaya_hide_mobile_button_menu',
		)
	) );
}
add_action('customize_register', 'kaya_add_header_options');


/**
 * Adding General Options
 */
function kaya_add_general($wp_customize) {
	$wp_customize->add_section('kaya_general', array(
		'title' => 'General Options',
		'description' => 'Settings for Content',
		'priority' => 20,
	));
	
	$wp_customize->add_setting('kaya_grid_width', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_grid_width', array(
		'label'           => __( 'Grid Width (default is 1140px)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_grid_width',
		)
	) );
	
	$wp_customize->add_setting('kaya_content_in_grid', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_content_in_grid', array(
		'label'           => __( 'Apply Grid to Main Site Content', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_content_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_header_in_grid', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_header_in_grid', array(
		'label'           => __( 'Apply Grid to Header', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_header_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_in_grid', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_in_grid', array(
		'label'           => __( 'Apply Grid to Whole Footer <hr />', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_footer_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_page_sidebar', array('sanitize_callback' => 'kaya_sanitize_sidebars'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_page_sidebar', array(
		'label'           => __( 'Default Sidebar Setting for Pages', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'no_sidebar' => 'No Sidebar',
								'left_sidebar' => 'Left Sidebar',
								'right_sidebar' => 'Right Sidebar',
							 ),
		'section'         => 'kaya_general',
		'settings'   => 'kaya_page_sidebar',
		)
	) );
	
	$wp_customize->add_setting('kaya_page_comments', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_page_comments', array(
		'label'           => __( 'Display Comments on Pages <hr />', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_page_comments',
		)
	) );
	
	$wp_customize->add_setting('kaya_page_hero', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_page_hero', array(
		'label'           => __( 'Use Page Hero Area for Pages', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_page_hero',
		)
	) );
	
	$wp_customize->add_setting('kaya_page_hero_blogs', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_page_hero_blogs', array(
		'label'           => __( 'Use Page Hero Area for Blogs / Archives', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_page_hero_blogs',
		)
	) );

	$wp_customize->add_setting('kaya_page_hero_background_color', array('sanitize_callback' => 'sanitize_hex_color'));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_page_hero_background_color', array(
		'label'        => __( 'Page Hero Default Background Color', 'kaya' ),
		'section'    => 'kaya_general',
		'settings'   => 'kaya_page_hero_background_color',
		) 
	) );

	// add a setting for background image
	$wp_customize->add_setting('kaya_page_hero_background_image', array('sanitize_callback' => 'kaya_sanitize_logo'));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_page_hero_background_image',
		array(
			'label' =>  __( 'Upload Default Page Hero Area Background Image', 'kaya' ),
			'section' => 'kaya_general',
			'settings' => 'kaya_page_hero_background_image',
		) 
	) );
	
	$wp_customize->add_setting('kaya_page_hero_background_image_type', array('sanitize_callback' => 'kaya_sanitize_background_select'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_page_hero_background_image_type', array(
		'label'           => __( 'Style of Page Hero Background', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'dont_use' => 'Use color instead of image',
								'tile_image' => 'Tile image',
								'fix_to_top' => 'Affix background image to top',
								'fix_to_bottom' => 'Affix background image to bottom',
								'stretch' => 'Stetch image to cover whole background',
								'fixed_pos' => 'Fixed position so background doesnt scroll',
							 ),
		'section'         => 'kaya_general',
		'settings'   => 'kaya_page_hero_background_image_type',
		)
	) );
	
	$wp_customize->add_setting('kaya_post_sidebar', array('sanitize_callback' => 'kaya_sanitize_sidebars'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_sidebar', array(
		'label'           => __( '<hr />Default Sidebar Setting for Blog &amp; Posts', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'no_sidebar' => 'No Sidebar',
								'left_sidebar' => 'Left Sidebar',
								'right_sidebar' => 'Right Sidebar',
							 ),
		'section'         => 'kaya_general',
		'settings'   => 'kaya_post_sidebar',
		)
	) );
	
	$wp_customize->add_setting('kaya_post_comments', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_comments', array(
		'label'           => __( 'Display Comments on Posts', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_post_comments',
		)
	) );
	
	$wp_customize->add_setting('kaya_post_hide_single_featured_image', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_hide_single_featured_image', array(
		'label'           => __( 'Hide Featured Image on Single Posts', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_post_hide_single_featured_image',
		)
	) );
	
	$wp_customize->add_setting('kaya_post_hide_archive_featured_image', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_hide_archive_featured_image', array(
		'label'           => __( 'Hide Featured Image on Archives', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_post_hide_archive_featured_image',
		)
	) );
	
	$wp_customize->add_setting('kaya_post_use_last_updated_date', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_use_last_updated_date', array(
		'label'           => __( 'Use Last Updated Date Instead of Published Date', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_post_use_last_updated_date',
		)
	) );
	
	$wp_customize->add_setting('kaya_blog_excerpt', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_blog_excerpt', array(
		'label'           => __( 'Limit the Blog Excerpts', 'kaya' ),
		'description'	  => __( 'Enter a value here to set the number of words used in an excerpt on the main blog archive pages. Leave blank to display full blog posts.', 'kaya'),
		'type'            => 'number',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_blog_excerpt',
		)
	) );
	
	$wp_customize->add_setting('kaya_woo_sidebar', array('sanitize_callback' => 'kaya_sanitize_sidebars'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_woo_sidebar', array(
		'label'           => __( 'Default Sidebar Setting for WooCommerce', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'no_sidebar' => 'No Sidebar',
								'left_sidebar' => 'Left Sidebar',
								'right_sidebar' => 'Right Sidebar',
							 ),
		'section'         => 'kaya_general',
		'settings'   => 'kaya_woo_sidebar',
		)
	) );

	$wp_customize->add_setting('kaya_enable_cart_fragments', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_enable_cart_fragments', array(
		'label'           => __( 'Enable Cart on Non-WooCommerce pages (used for cart widget in sidebar)', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_enable_cart_fragments',
		)
	) );
	
	$wp_customize->add_setting('kaya_stylesheet_version', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_stylesheet_version', array(
		'label'           => __( 'Stylesheet Version', 'kaya' ),
		'description'	  => __( 'By default WordPress uses the current WP version as the stylesheet version. If you wish to alter that, enter a different value here', 'kaya'),
		'type'            => 'number',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_stylesheet_version',
		)
	) );
	
	$wp_customize->add_setting('kaya_google_analytics', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_analytics', array(
		'label'           => __( 'Google Analytics', 'kaya' ),
		'description'	  => __( 'Enter your Google Analytics number here, it should be of the format UA-00000000-0. Use either the Universal analytics or the Tag Manager, not both.<br><hr><strong>Universal Analytics: </strong>', 'kaya'),
		'type'            => 'text',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_google_analytics',
		)
	) );
	
	$wp_customize->add_setting('kaya_google_tag_analytics', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_tag_analytics', array(
		'label'           => __( 'Tag Manager:', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_google_tag_analytics',
		)
	) );
	
	$wp_customize->add_setting('kaya_google_optimize', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_optimize', array(
		'label'           => __( 'Google Optimize', 'kaya' ),
		'description'	  => __( 'Enter your Google Optimize number here, it should be of the format GTM-XXXXXX. To use Google Optimize you must have already entered a Google Analytics number above.', 'kaya'),
		'type'            => 'text',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_google_optimize',
		)
	) );
	
	$wp_customize->add_setting('kaya_cf7_redirect_url', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_cf7_redirect_url', array(
		'label'           => __( 'Contact Form 7 Redirect URL', 'kaya' ),
		'description'	  => __( 'Enter a custom thank you page after contact form 7 forms are filled out', 'kaya'),
		'type'            => 'url',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_cf7_redirect_url',
		)
	) );
	
	$wp_customize->add_setting('kaya_add_to_head', array('sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_add_to_head', array(
		'label'           => __( 'Add code before </head>', 'kaya' ),
		'description'	  => __( 'Enter code to be added before &lt;/head&gt; tag -- useful for some scripts', 'kaya'),
		'type'            => 'textarea',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_add_to_head',
		)
	) );
	
	$wp_customize->add_setting('kaya_add_to_body_top', array('sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_add_to_body_top', array(
		'label'           => __( 'Add code just after <body>', 'kaya' ),
		'description'	  => __( 'Enter code to be added just after &lt;body&gt; tag -- useful for some scripts', 'kaya'),
		'type'            => 'textarea',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_add_to_body_top',
		)
	) );
	
	$wp_customize->add_setting('kaya_add_to_body_bottom', array('sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_add_to_body_bottom', array(
		'label'           => __( 'Add code just before </body>', 'kaya' ),
		'description'	  => __( 'Enter code to be added just before &lt;/body&gt; tag -- useful for some scripts', 'kaya'),
		'type'            => 'textarea',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_add_to_body_bottom',
		)
	) );
}
add_action('customize_register', 'kaya_add_general');


/**
 * Adding Footer Section Options
 */
function kaya_add_footer($wp_customize) {
	$wp_customize->add_section('kaya_footer', array(
		'title' => 'Footer',
		'description' => 'Footer Settings',
		'priority' => 120,
	));
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_show_footer_columns', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_show_footer_columns', array(
		'label'           => __( 'Show the Footer Columns', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_show_footer_columns',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_columns_in_grid', array('sanitize_callback' => 'kaya_sanitize_checkbox'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_columns_in_grid', array(
		'label'           => __( 'Apply Grid to Footer Columns', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_columns_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_columns', array('sanitize_callback' => 'kaya_sanitize_footer_columns'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_columns', array(
		'label'           => __( 'Number of Footer Columns', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'one_column' => 'Single Column',
								'two_column' => 'Two Columns',
								'three_column' => 'Three Columns',
								'four_column' => 'Four Columns',
							 ),
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_columns',
		)
	) );
	
	$wp_customize->add_setting( 'kaya_show_footer_social', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'kaya_sanitize_checkbox',
	) );
	$wp_customize->add_control( 'kaya_show_footer_social', array(
	  'type' => 'checkbox',
	  'section' => 'kaya_footer', 
	  'label' => __( 'Display Social Media Icons in Footer', 'kaya' ),
	) );
	
	$wp_customize->add_setting('kaya_footer_right', array('sanitize_callback' => 'esc_textarea'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_right', array(
		'label'           => __( 'Content for Right side of Lower Footer', 'kaya' ),
		'description'	  => __( 'Enter content to replace the credit info', 'kaya'),
		'type'            => 'textarea',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_right',
		)
	) );
}
add_action('customize_register', 'kaya_add_footer');


/**
 * Adding 404 Page Options
 */
function kaya_add_404($wp_customize) {
	$wp_customize->add_section('kaya_404', array(
		'title' => '404 Error Page',
		'description' => '404 Error Page',
		'priority' => 130,
	));
	
	$wp_customize->add_setting('kaya_404_title', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_404_title', array(
		'label'           => __( '404 Page Heading', 'kaya' ),
		'type'            => 'text',
		'section'         => 'kaya_404',
		'settings'   => 'kaya_404_title',
		)
	) );
	
	$wp_customize->add_setting('kaya_404_content', array('sanitize_callback' => 'esc_textarea'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_404_content', array(
		'label'           => __( '404 Page Content', 'kaya' ),
		'type'            => 'textarea',
		'section'         => 'kaya_404',
		'settings'   => 'kaya_404_content',
		)
	) );
}
add_action('customize_register', 'kaya_add_404');



/**
 * Adding Social Section Options
 */
function kaya_add_social($wp_customize) {
	$wp_customize->add_section('kaya_social', array(
		'title' => 'Social Media URLs',
		'description' => 'URLS for your social media accounts',
		'priority' => 110,
	));
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_facebook', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_facebook', array(
		'label'           => __( 'Facebook', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_facebook',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_twitter', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_twitter', array(
		'label'           => __( 'Twitter', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_twitter',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_linkedin', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_linkedin', array(
		'label'           => __( 'LinkedIn', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_linkedin',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_google_plus', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_plus', array(
		'label'           => __( 'Google Map URL', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_google_plus',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_skype', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_skype', array(
		'label'           => __( 'Skype', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_skype',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_youtube', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_youtube', array(
		'label'           => __( 'YouTube', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_youtube',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_vimeo', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_vimeo', array(
		'label'           => __( 'Vimeo', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_vimeo',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_instagram', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_instagram', array(
		'label'           => __( 'Instagram', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_instagram',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_pinterest', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_pinterest', array(
		'label'           => __( 'Pinterest', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_pinterest',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_yelp', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_yelp', array(
		'label'           => __( 'Yelp', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_yelp',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_rss', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_rss', array(
		'label'           => __( 'RSS', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_rss',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_email', array('sanitize_callback' => 'is_email'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_email', array(
		'label'           => __( 'E-mail Address', 'kaya' ),
		'type'            => 'email',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_email',
		)
	) );
}
add_action('customize_register', 'kaya_add_social');


/**
 * Adding Font Section Options
 */
function kaya_add_fonts($wp_customize) {
	$wp_customize->add_section('kaya_fonts', array(
		'title' => 'Font Options',
		'description' => 'All custom font sizes need to be in pixels. If you want your h1 to be 40px, then enter the number 40.',
		'priority' => 40,
	));
	
	$wp_customize->add_setting('kaya_heading_1', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_1', array(
		'label'           => __( 'Heading 1', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_1',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_2', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_2', array(
		'label'           => __( 'Heading 2', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_2',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_3', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_3', array(
		'label'           => __( 'Heading 3', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_3',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_4', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_4', array(
		'label'           => __( 'Heading 4', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_4',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_5', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_5', array(
		'label'           => __( 'Heading 5', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_5',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_6', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_6', array(
		'label'           => __( 'Heading 6', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_6',
		)
	) );
	
	$wp_customize->add_setting('kaya_paragraph', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_paragraph', array(
		'label'           => __( 'Paragraph', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_paragraph',
		)
	) );
	
	$wp_customize->add_setting('kaya_social_icon_size', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_social_icon_size', array(
		'label'           => __( 'Social Icons', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_social_icon_size',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_1_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_1_line_height', array(
		'label'           => __( 'Heading 1 Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for headings in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_1_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_2_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_2_line_height', array(
		'label'           => __( 'Heading 2 Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for headings in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_2_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_3_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_3_line_height', array(
		'label'           => __( 'Heading 3 Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for headings in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_3_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_4_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_4_line_height', array(
		'label'           => __( 'Heading 4 Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for headings in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_4_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_5_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_5_line_height', array(
		'label'           => __( 'Heading 5 Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for headings in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_5_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_6_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_6_line_height', array(
		'label'           => __( 'Heading 6 Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for headings in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_6_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_paragraph_line_height', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_paragraph_line_height', array(
		'label'           => __( 'Paragraph Line Height', 'kaya' ),
		'description'	  => __( 'Enter the line height for paragraphs in em units (ie: 1.5)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_paragraph_line_height',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_font_weight', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_font_weight', array(
		'label'           => __( 'Heading Font Weight', 'kaya' ),
		'description'	  => __( 'Enter font weight as a number, for example "300"', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_font_weight',
		)
	) );
	
	$wp_customize->add_setting('kaya_paragraph_font_weight', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_paragraph_font_weight', array(
		'label'           => __( 'Paragraph Font Weight', 'kaya' ),
		'description'	  => __( 'Enter font weight as a number, for example "300"', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_paragraph_font_weight',
		)
	) );
	
	$wp_customize->add_setting('kaya_heading_font', array('sanitize_callback' => 'kaya_sanitize_font'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_font', array(
		'label'           => __( 'Heading Font', 'kaya' ),
		'description'	  => __( 'If available, the normal weight, bold and italic will be loaded. If you want other font weights to be loaded, use the custom Google font adder below.', 'kaya' ),
		'type'            => 'select',
		'choices'		  => kaya_fonts_list(),
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_font',
		)
	) );
	
	$wp_customize->add_setting('kaya_paragraph_font', array('sanitize_callback' => 'kaya_sanitize_font'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_paragraph_font', array(
		'label'           => __( 'Regular Text Font', 'kaya' ),
		'description'	  => __( 'If available, the normal weight, bold and italic will be loaded. If you want other font weights to be loaded, use the custom Google font adder below.', 'kaya' ),
		'type'            => 'select',
		'choices'		  => kaya_fonts_list(),
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_paragraph_font',
		)
	) );
	
	$wp_customize->add_setting('kaya_custom_google_fonts_url', array('sanitize_callback' => 'esc_url_raw'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_custom_google_fonts_url', array(
		'label'           => __( 'Add your custom Google Fonts URL', 'kaya' ),
		'description'	  => __( 'For use of this field, read the theme instructions.', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_custom_google_fonts_url',
		)
	) );
	
	$wp_customize->add_setting('kaya_custom_google_fonts_heading', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_custom_google_fonts_heading', array(
		'label'           => __( 'Custom Heading Font Name', 'kaya' ),
		'description'	  => __( 'For use of this field, read the theme instructions.', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_custom_google_fonts_heading',
		)
	) );
	
	$wp_customize->add_setting('kaya_custom_google_fonts_paragraph', array('sanitize_callback' => 'sanitize_text_field'));
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_custom_google_fonts_paragraph', array(
		'label'           => __( 'Custom Regular Text Font Name', 'kaya' ),
		'description'	  => __( 'For use of this field, read the theme instructions.', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_custom_google_fonts_paragraph',
		)
	) );
}
add_action('customize_register', 'kaya_add_fonts');