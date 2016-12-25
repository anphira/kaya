<?php
/**
 * Kaya functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kaya
 */


/**
 * Add notification for theme updates
 */
include("inc/update_notifier.php");


/**
 * Registers an editor stylesheet for the theme.
 */
function kaya_theme_add_editor_styles() {
    add_editor_style( 'style.css' );
}
add_action( 'admin_init', 'kaya_theme_add_editor_styles' );


/***
 * Add notice to admin to welcome people to theme
 */
function kaya_welcome_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Thank you for installing the Kaya WordPress theme!<br />If you are new to the theme, please <a href="https://www.anphira.com/kaya-wordpress-theme/kaya-setup-guide/">click here to read the setup instructions</a>, if are already familiar with Kaya then click the x on the right to dismiss this notice. You can always view the setup instructions by going to the Customizer and selecting "Need Setup Help?"', 'kaya' ); ?></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'kaya_welcome_notice' );

if( ! function_exists('kaya_social_icons') ) :

/**
 * Displays social icons with Font Awesome icons
 */
function kaya_social_icons() {
	echo '<div class="social-icons">';
		if( get_theme_mod( 'kaya_facebook' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_facebook' ) . '"><i class="fa fa-facebook"></i></a>';
		}
		if( get_theme_mod( 'kaya_twitter' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_twitter' ) . '"><i class="fa fa-twitter"></i></a>';
		}
		if( get_theme_mod( 'kaya_linkedin' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_linkedin' ) . '"><i class="fa fa-linkedin"></i></a>';
		}
		if( get_theme_mod( 'kaya_google_plus' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_google_plus' ) . '"><i class="fa fa-google-plus"></i></a>';
		}
		if( get_theme_mod( 'kaya_skype' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_skype' ) . '"><i class="fa fa-skype"></i></a>';
		}
		if( get_theme_mod( 'kaya_youtube' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_youtube' ) . '"><i class="fa fa-youtube"></i></a>';
		}
		if( get_theme_mod( 'kaya_vimeo' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_vimeo' ) . '"><i class="fa fa-vimeo"></i></a>';
		}
		if( get_theme_mod( 'kaya_instagram' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_instagram' ) . '"><i class="fa fa-instagram"></i></a>';
		}
		if( get_theme_mod( 'kaya_pinterest' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_pinterest' ) . '"><i class="fa fa-pinterest-p"></i></a>';
		}
		if( get_theme_mod( 'kaya_yelp' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_yelp' ) . '"><i class="fa fa-yelp"></i></a>';
		}
		if( get_theme_mod( 'kaya_rss' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_rss' ) . '"><i class="fa fa-rss"></i></a>';
		}
		if( get_theme_mod( 'kaya_email' ) != '' ) {
			echo '<a class="social-icon-single" href="' . get_theme_mod( 'kaya_email' ) . '"><i class="fa fa-envelope"></i></a>';
		}
	echo '</div>';
}

endif;


if ( ! function_exists( 'kaya_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function kaya_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Kaya, use a find and replace
	 * to change 'kaya' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'kaya', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kaya' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kaya_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'kaya_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function kaya_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'kaya_content_width', 640 );
}
add_action( 'after_setup_theme', 'kaya_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kaya_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Pages Sidebar', 'kaya' ),
		'id'            => 'pages-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Posts Sidebar', 'kaya' ),
		'id'            => 'posts-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Post Sidebar', 'kaya' ),
		'id'            => 'single-post-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'kaya' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 2', 'kaya' ),
		'id'            => 'header-2',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 3', 'kaya' ),
		'id'            => 'header-3',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 4', 'kaya' ),
		'id'            => 'header-4',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'kaya' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'kaya' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'kaya' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'kaya' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Add widgets here.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'kaya_widgets_init' );


/**
 * Add Meta Box to Pages for Page Settings
 */
function kaya_page_settings_register_meta_boxes() {
    add_meta_box( 'kaya-page-settings', __( 'Page Settings', 'kaya' ), 'kaya_page_settings_display_callback', 'page' );
}
add_action( 'add_meta_boxes', 'kaya_page_settings_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function kaya_page_settings_display_callback( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!
    wp_nonce_field( 'kaya_sidebar_setting_nonce', 'kaya_sidebar_setting_nonce' );
    
    echo 'Pages are current set to display ';
    switch(get_theme_mod( 'kaya_post_sidebar' )) {
    	case 'no_sidebar';
    		echo 'no Sidebar';
    		break;
    	case  'left_sidebar':
    		echo 'a left Sidebar';
    		break;
    	case  'right_sidebar':
    		echo 'a right Sidebar';
    		break;
    }
    echo ' by default. To override that setting for this page, select your desired setting below:<br /><br />';
    
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['kaya_sidebar_setting'] ) ? esc_attr( $values['kaya_sidebar_setting'][0] ) : '';
    $check = get_post_meta($post->ID, '_kaya_full_width_check', true);
    $check_title = get_post_meta($post->ID, '_kaya_hide_title_check', true);
    
    ?>
    <select id="kaya_sidebar_setting" name="kaya_sidebar_setting">
		<option value="use_default">Use Page Default</option>
		<option value="no_sidebar" <?php selected( $selected, 'no_sidebar' ); ?>>No Sidebar</option>
		<option value="left_sidebar" <?php selected( $selected, 'left_sidebar' ) ?>>Left Sidebar</option>
		<option value="right_sidebar" <?php selected( $selected, 'right_sidebar' ) ?>>Right Sidebar</option>
	</select>
	
	<p>
        <input type="checkbox" id="kaya_full_width_check" name="kaya_full_width_check" <?php checked( $check, 'on' ); ?> />
        <label for="kaya_full_width_check">Make page full width (useful for Landing Pages)</label>
    </p>
	<p>
        <input type="checkbox" id="kaya_hide_title_check" name="kaya_hide_title_check" <?php checked( $check_title, 'on' ); ?> />
        <label for="kaya_hide_title_check">Hide the page title</label>
    </p>
	<?php 
}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function kaya_page_settings_save_meta_box( $post_id ) {
	// Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	/*
 	 * We need to verify this came from the our screen and with proper authorization,
     * because save_post can be triggered at other times.
     */
	if( !isset( $_POST['kaya_sidebar_setting_nonce'] ) || !wp_verify_nonce( $_POST['kaya_sidebar_setting_nonce'], 'kaya_sidebar_setting_nonce' ) ) return;
     
    
    // Check the user's permissions.
	if( !current_user_can( 'edit_post' ) ) return;
 
	/* OK, it's safe for us to save the data now. */
 
	// Sanitize the user input.
	if( isset( $_POST['kaya_sidebar_setting'] ) )
        update_post_meta( $post_id, 'kaya_sidebar_setting', esc_attr( $_POST['kaya_sidebar_setting'] ) );
 
	// Update the meta field.
	update_post_meta( $post_id, '_kaya_sidebar_setting', $mydata );
	
	update_post_meta( $post_id, '_kaya_full_width_check', ($_POST['kaya_full_width_check']) ? 'on' : 'off' );
	
	update_post_meta( $post_id, '_kaya_hide_title_check', ($_POST['kaya_hide_title_check']) ? 'on' : 'off' );
}
add_action( 'save_post', 'kaya_page_settings_save_meta_box' );


/**
 * Enqueue scripts and styles.
 */
function kaya_scripts() {
	wp_enqueue_style( 'kaya-style', get_stylesheet_uri(), false, get_theme_mod( 'kaya_stylesheet_version' ));

	wp_enqueue_script( 'kaya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161215', true );

	wp_enqueue_script( 'kaya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20161215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaya_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * Enqueue Font Awesome Stylesheet
 */
function enqueue_our_required_stylesheets(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'); 
}
add_action('wp_enqueue_scripts','enqueue_our_required_stylesheets');


/**
 * Function to determine good contrast color (black or white)
 */
function readableColour($bg){
    $r = hexdec(substr($bg,0,2));
    $g = hexdec(substr($bg,2,2));
    $b = hexdec(substr($bg,4,2));

    $contrast = sqrt(
        $r * $r * .241 +
        $g * $g * .691 +
        $b * $b * .068
    );

    if($contrast > 130){
        return '000000';
    }else{
        return 'FFFFFF';
    }
}

