<?php
/**
 * Kaya Theme Customizer.
 *
 * @package Kaya
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kaya_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
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
		'title' => 'Need Setup Help?',
		'description' => 'Options for Getting Help with Setup',
		'priority' => 10,
	));
	
	$wp_customize->add_setting('kaya_help_docs');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_help_docs', array(
		'label'           => __( 'Kaya Setup Instructions', 'kaya' ),
		'description'	  => __( '<a href="https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/">Cick here for Setup Guide</a><br /><br />', 'kaya'),
		'type'            => 'hidden',
		'section'         => 'kaya_help',
		'settings'   => 'kaya_help_docs',
		)
	) );
	
	$wp_customize->add_setting('kaya_help_forum');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_help_forum', array(
		'label'           => __( 'Kaya Help Forum', 'kaya' ),
		'description'	  => __( 'If you have already read the full setup instructions above and still do not understand how to setup the theme, you can post a question in the forum. <br /></br />Make sure to read the pinned thread about how to post a request for help.<br /><br /><a href="https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/">Forum</a>', 'kaya'),
		'type'            => 'hidden',
		'section'         => 'kaya_help',
		'settings'   => 'kaya_help_forum',
		)
	) );
}
add_action('customize_register', 'kaya_add_help_options');


/**
 * Create Logo Setting and Upload Control
 */
function kaya_add_logo($wp_customize) {
	// add a setting for the site logo
	$wp_customize->add_setting('kaya_logo');
	// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_logo',
		array(
			'label' =>  __( 'Upload Logo', 'kaya' ),
			'section' => 'title_tagline',
			'settings' => 'kaya_logo',
		) 
	) );

	// add a setting for the site retina logo
	$wp_customize->add_setting('kaya_retina_logo');
	// Add a control to upload the retina logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kaya_retina_logo',
		array(
			'label' =>  __( 'Upload Retina Logo (twice size of regular logo)', 'kaya' ),
			'section' => 'title_tagline',
			'settings' => 'kaya_retina_logo',
		) 
	) );
}
add_action('customize_register', 'kaya_add_logo');

/**
 * Adding Colors Options
 */
function kaya_add_colors($wp_customize) {
	$wp_customize->add_setting('kaya_header_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_header_background_color', array(
		'label'        => __( 'Header Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_header_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_footer_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_footer_background_color', array(
		'label'        => __( 'Footer Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_footer_background_color',
		) 
	) );
	$wp_customize->add_setting('kaya_lower_footer_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_lower_footer_background_color', array(
		'label'        => __( 'Footer Copyright Area Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_lower_footer_background_color',
		) 
	) );
	// add a setting for the text color
	$wp_customize->add_setting('kaya_text_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_text_color', array(
		'label'        => __( 'Text Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_text_color',
		) 
	) );

	// add a setting for the text color
	$wp_customize->add_setting('kaya_menu_background_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_menu_background_color', array(
		'label'        => __( 'Menu Background Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_menu_background_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_heading_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_heading_color', array(
		'label'        => __( 'Heading Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_heading_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_link_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_link_color', array(
		'label'        => __( 'Link Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_link_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_link_hover_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_link_hover_color', array(
		'label'        => __( 'Link Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_link_hover_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_button_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_button_color', array(
		'label'        => __( 'Button Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_button_hover_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_button_hover_color', array(
		'label'        => __( 'Button Hover Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_button_hover_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_social_icon_color');
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kaya_social_icon_color', array(
		'label'        => __( 'Social Icon Color', 'kaya' ),
		'section'    => 'colors',
		'settings'   => 'kaya_social_icon_color',
		) 
	) );
	
	// add a setting for the text color
	$wp_customize->add_setting('kaya_social_icon_background_color');
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
	
	$wp_customize->add_setting('kaya_header_columns');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_header_columns', array(
		'label'           => __( 'Number of Header Columns', 'kaya' ),
		'type'            => 'select',
		'choices'		  => array(
								'one_column' => 'Single Column',
								'two_column' => 'Two Columns',
								'three_column' => 'Three Columns',
								'four_column' => 'Four Columns',
							 ),
		'section'         => 'kaya_header',
		'settings'   => 'kaya_header_columns',
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
	
	$wp_customize->add_setting('kaya_grid_width');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_grid_width', array(
		'label'           => __( 'Grid Width (default is 1640px)', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_grid_width',
		)
	) );
	
	$wp_customize->add_setting('kaya_content_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_content_in_grid', array(
		'label'           => __( 'Apply Grid to Main Site Content', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_content_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_header_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_header_in_grid', array(
		'label'           => __( 'Apply Grid to Header', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_header_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_footer_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_in_grid', array(
		'label'           => __( 'Apply Grid to Whole Footer', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_general',
		'settings'   => 'kaya_footer_in_grid',
		)
	) );
	
	$wp_customize->add_setting('kaya_page_sidebar');
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
	
	$wp_customize->add_setting('kaya_post_sidebar');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_post_sidebar', array(
		'label'           => __( 'Default Sidebar Setting for Blog Posts', 'kaya' ),
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
	$wp_customize->add_setting('kaya_show_footer_columns');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_show_footer_columns', array(
		'label'           => __( 'Show the Footer Columns', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_show_footer_columns',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_footer_columns_in_grid');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_footer_columns_in_grid', array(
		'label'           => __( 'Apply Grid to Footer Columns', 'kaya' ),
		'type'            => 'checkbox',
		'section'         => 'kaya_footer',
		'settings'   => 'kaya_footer_columns_in_grid',
		)
	) );
	
	// add a setting for the footer columns
	$wp_customize->add_setting('kaya_footer_columns');
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
}
add_action('customize_register', 'kaya_add_footer');


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
	$wp_customize->add_setting('kaya_facebook');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_facebook', array(
		'label'           => __( 'Facebook', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_facebook',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_twitter');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_twitter', array(
		'label'           => __( 'Twitter', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_twitter',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_linkedin');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_linkedin', array(
		'label'           => __( 'LinkedIn', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_linkedin',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_google_plus');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_google_plus', array(
		'label'           => __( 'Google Plus', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_google_plus',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_skype');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_skype', array(
		'label'           => __( 'Skype', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_skype',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_youtube');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_youtube', array(
		'label'           => __( 'YouTube', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_youtube',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_vimeo');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_vimeo', array(
		'label'           => __( 'Vimeo', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_vimeo',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_instagram');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_instagram', array(
		'label'           => __( 'Instagram', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_instagram',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_pinterest');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_pinterest', array(
		'label'           => __( 'Pinterest', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_pinterest',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_yelp');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_yelp', array(
		'label'           => __( 'Yelp', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_yelp',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_rss');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_rss', array(
		'label'           => __( 'RSS', 'kaya' ),
		'type'            => 'url',
		'section'         => 'kaya_social',
		'settings'   => 'kaya_rss',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_email');
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
		'title' => 'Font Sizes',
		'description' => '',
		'priority' => 40,
	));
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_heading_1');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_1', array(
		'label'           => __( 'Heading 1', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_1',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_heading_2');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_2', array(
		'label'           => __( 'Heading 2', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_2',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_heading_3');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_3', array(
		'label'           => __( 'Heading 3', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_3',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_heading_4');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_4', array(
		'label'           => __( 'Heading 4', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_4',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_heading_5');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_5', array(
		'label'           => __( 'Heading 5', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_5',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_heading_6');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_heading_6', array(
		'label'           => __( 'Heading 6', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_heading_6',
		)
	) );
	
	// add a setting for the footer columns to show
	$wp_customize->add_setting('kaya_paragraph');
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kaya_paragraph', array(
		'label'           => __( 'Paragraph', 'kaya' ),
		'type'            => 'number',
		'section'         => 'kaya_fonts',
		'settings'   => 'kaya_paragraph',
		)
	) );
}
add_action('customize_register', 'kaya_add_fonts');