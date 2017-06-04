<?php
/**
 * Kaya functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kaya
 */
 
/**
 * Enable shortcodes in text widgets
 */
add_filter('widget_text','do_shortcode');
 
/**
 * Add footer menu
 */
function kaya_register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu', 'kaya' ));
}
add_action( 'init', 'kaya_register_footer_menu' );


/**
 * Add notification for theme updates
 */
//include("inc/update_notifier.php");
include("inc/kaya-function.php");


/**
 * Registers an editor stylesheet for the theme.
 */
function kaya_theme_add_editor_styles() {
    add_editor_style( 'style.min.css' );
}
add_action( 'admin_init', 'kaya_theme_add_editor_styles' );


/**
 * Blog excerpts
 */
function kaya_excerpt_length( $length ) {
	if(get_theme_mod( 'kaya_blog_excerpt' ) != '') {
		return get_theme_mod( 'kaya_blog_excerpt' );
	}
	else {
		return 50;
	}
}
add_filter( 'excerpt_length', 'kaya_excerpt_length', 999 );

function kaya_excerpt_more( $more ) {
	return ' </p><p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'kaya') . '</a>';
}
add_filter( 'excerpt_more', 'kaya_excerpt_more' );


/**
 * Always make "Remember me" box checked for login screen
 */
function login_checked_remember_me() {
    add_filter( 'login_footer', 'rememberme_checked' );
}
add_action( 'init', 'login_checked_remember_me' );
 
function rememberme_checked() {
	echo "<script>document.getElementById('rememberme').checked = true;</script>";
}


/***
 * Add notice to admin to welcome people to theme
 */
function kaya_welcome_notice() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php _e( 'Thank you for installing the Kaya WordPress theme! View the setup instructions by going to the Customizer and selecting "Need Setup Help?"', 'kaya' ); ?></p>
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
	
	/**
	 * Setup Theme Defaults for colors
	 */
	if( get_theme_mod( 'kaya_header_background_color') == '') 
		set_theme_mod( 'kaya_header_background_color', '#ffffff' );
	if( get_theme_mod( 'kaya_footer_heading_color') == '') 
		set_theme_mod( 'kaya_footer_heading_color', '#000000' );
	if( get_theme_mod( 'kaya_footer_text_color') == '') 
		set_theme_mod( 'kaya_footer_text_color', '#000000' );
	if( get_theme_mod( 'kaya_lower_footer_text_color') == '') 
		set_theme_mod( 'kaya_lower_footer_text_color', '#ffffff' );
	if( get_theme_mod( 'kaya_footer_background_color') == '') 
		set_theme_mod( 'kaya_footer_background_color', '#ffffff' );
	if( get_theme_mod( 'kaya_lower_footer_background_color') == '') 
		set_theme_mod( 'kaya_lower_footer_background_color', '#000000' );
	if( get_theme_mod( 'kaya_text_color') == '') 
		set_theme_mod( 'kaya_text_color', '#000000' );
	if( get_theme_mod( 'kaya_menu_background_color') == '') 
		set_theme_mod( 'kaya_menu_background_color', '#ffffff' );
	if( get_theme_mod( 'kaya_menu_text_color') == '') 
		set_theme_mod( 'kaya_menu_text_color', '#008dc4' );
	if( get_theme_mod( 'kaya_menu_text_color') == '') 
		set_theme_mod( 'kaya_menu_text_hover_color', '#005dc4' );
	if( get_theme_mod( 'kaya_heading_color') == '') 
		set_theme_mod( 'kaya_heading_color', '#000000' );
	if( get_theme_mod( 'kaya_link_color') == '') 
		set_theme_mod( 'kaya_link_color', '#008dc4' );
	if( get_theme_mod( 'kaya_link_hover_color') == '') 
		set_theme_mod( 'kaya_link_hover_color', '#005dc4' );
	if( get_theme_mod( 'kaya_button_color') == '') 
		set_theme_mod( 'kaya_button_color', '#008dc4' );
	if( get_theme_mod( 'kaya_button_text_color') == '') 
		set_theme_mod( 'kaya_button_text_color', '#ffffff' );
	if( get_theme_mod( 'kaya_button_hover_color') == '') 
		set_theme_mod( 'kaya_button_hover_color', '#005dc4' );
	if( get_theme_mod( 'kaya_button_hover_text_color') == '') 
		set_theme_mod( 'kaya_button_hover_text_color', '#000000' );
	if( get_theme_mod( 'kaya_social_icon_color') == '') 
		set_theme_mod( 'kaya_social_icon_color', '#ffffff' );
	if( get_theme_mod( 'kaya_social_icon_background_color') == '') 
		set_theme_mod( 'kaya_social_icon_background_color', '#000000' );
		
	/**
	 * Setup theme defaults for settings
	 */
	if( empty(get_theme_mod( 'kaya_grid_width')) )
		set_theme_mod( 'kaya_grid_width', '1140' );
	if( empty(get_theme_mod( 'kaya_content_in_grid')) )
		set_theme_mod( 'kaya_content_in_grid', 'on' );
	if( empty(get_theme_mod( 'kaya_header_in_grid')) )
		set_theme_mod( 'kaya_header_in_grid', 'on' );

	if( empty(get_theme_mod( 'kaya_post_comments')) )
		set_theme_mod( 'kaya_post_comments', 'on' );
	if( empty(get_theme_mod('kaya_page_sidebar')) )
		set_theme_mod( 'kaya_page_sidebar', 'right_sidebar' );
	if( empty(get_theme_mod('kaya_post_sidebar')) )
		set_theme_mod( 'kaya_post_sidebar', 'right_sidebar' );

	if( empty(get_theme_mod('kaya_heading_font')) )
		set_theme_mod( 'kaya_heading_font', 'arial' );
	if( empty(get_theme_mod('kaya_paragraph_font')) )
		set_theme_mod( 'kaya_paragraph_font', 'arial' );
	if( empty(get_theme_mod('kaya_heading_1')) )
		set_theme_mod( 'kaya_heading_1', '36' );
	if( empty(get_theme_mod('kaya_heading_2')) )
		set_theme_mod( 'kaya_heading_2', '27' );
	if( empty(get_theme_mod('kaya_heading_3')) )
		set_theme_mod( 'kaya_heading_3', '21' );
	if( empty(get_theme_mod('kaya_heading_4')) )
		set_theme_mod( 'kaya_heading_4', '18' );
	if( empty(get_theme_mod('kaya_heading_5')) )
		set_theme_mod( 'kaya_heading_5', '16' );
	if( empty(get_theme_mod('kaya_heading_6')) )
		set_theme_mod( 'kaya_heading_6', '16' );
	if( empty(get_theme_mod('kaya_paragraph')) )
		set_theme_mod( 'kaya_paragraph', '16' );
	if( empty(get_theme_mod('kaya_social_icon_size')) )
		set_theme_mod( 'kaya_social_icon_size', '18' );

	if( empty(get_theme_mod('kaya_header_columns')) )
		set_theme_mod( 'kaya_header_columns', 'one_column' );
	
	if( empty(get_theme_mod('kaya_show_footer_columns')) )
		set_theme_mod( 'kaya_show_footer_columns', 'on' );
	if( empty(get_theme_mod('kaya_footer_columns_in_grid')) )
		set_theme_mod( 'kaya_footer_columns_in_grid', 'on' );
	if( empty(get_theme_mod('kaya_footer_columns')) )
		set_theme_mod( 'kaya_footer_columns', 'one_column' );
	if( empty(get_theme_mod('kaya_show_footer_social')) )
		set_theme_mod( 'kaya_show_footer_social', 'on' );
	
	if( empty(get_theme_mod('kaya_404_title')) )
		set_theme_mod( 'kaya_404_title', 'Sorry, that page could not be found' );
	if( empty(get_theme_mod('kaya_404_content')) )
		set_theme_mod( 'kaya_404_content', 'You tried to reach a page which could not be found. Please <a href="/">click here to visit the home page</a> or use the main menu to navigate to your desired location.' );
	
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
	$GLOBALS['content_width'] = apply_filters( 'kaya_content_width', 1140 );
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
    		echo 'No Sidebar';
    		break;
    	case  'left_sidebar':
    		echo 'a Left Sidebar';
    		break;
    	case  'right_sidebar':
    		echo 'a Right Sidebar';
    		break;
    }
    echo ' by default. To override that setting for this page, select your desired setting below:<br /><br />';
    
    $values = get_post_custom( $post->ID );
    $selected = isset( $values['kaya_sidebar_setting'] ) ? esc_attr( $values['kaya_sidebar_setting'][0] ) : '';
    $check = get_post_meta($post->ID, '_kaya_full_width_check', true);
    $check_title = get_post_meta($post->ID, '_kaya_hide_title_check', true);
    $google_experiments = get_post_meta($post->ID, '_kaya_google_experiments_code', true);
    
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
    
    <p>Enter Google Experiments Code - make sure to ONLY enter code on the master page, not variations:</p>
    <textarea rows="4" style="width: 100%;" id="kaya_google_experiments_code" name="kaya_google_experiments_code" ><?php echo $google_experiments; ?></textarea>
    
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
	
	if( isset( $_POST['kaya_full_width_check'] ) )
		update_post_meta( $post_id, '_kaya_full_width_check', ($_POST['kaya_full_width_check']) ? 'on' : 'off' );
	
	if( isset( $_POST['kaya_hide_title_check'] ) )
		update_post_meta( $post_id, '_kaya_hide_title_check', ($_POST['kaya_hide_title_check']) ? 'on' : 'off' );
	
	if( isset( $_POST['kaya_hide_title_check'] ) )
		update_post_meta( $post_id, '_kaya_hide_title_check', ($_POST['kaya_hide_title_check']) ? 'on' : 'off' );
		
	if( isset( $_POST['kaya_google_experiments_code'] ) )
		update_post_meta( $post_id, '_kaya_google_experiments_code', $_POST['kaya_google_experiments_code'] );
}
add_action( 'save_post', 'kaya_page_settings_save_meta_box' );


/**
 * Enqueue scripts and styles.
 */
function kaya_scripts() {
	if(get_theme_file_uri() == get_template_directory_uri()) {
		wp_enqueue_style( 'kaya-style', get_theme_file_uri('style.min.css'), false, filemtime( get_theme_file_path( 'style.min.css' )));
	}
	else {
		wp_enqueue_style( 'kaya-style', get_theme_file_uri('style.css'), false, filemtime( get_theme_file_path( 'style.css' )));
	}

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
	wp_enqueue_style('font-awesome', 'inc/font-awesome-4.7.0/font-awesome.min.css'); 
}
add_action('get_footer','enqueue_our_required_stylesheets');

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

class Kaya_Social_Widget extends WP_Widget {

	/**
	 * Sets up the widgets name etc
	 */
	public function __construct() {
		parent::__construct(
			'kaya_social_widget', // Base ID
			__( 'Kaya Social', 'kaya' ), // Name
			array( 'description' => __( 'Displays Kaya Social Icons', 'kaya' ), ) // Args
		);
	}

	/**
	 * Outputs the content of the widget
	 *
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		kaya_social_icons();
		echo $args['after_widget'];
	}

	/**
	 * Outputs the options form on admin
	 *
	 * @param array $instance The widget options
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'Follow Us', 'kaya' );
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'kaya' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<?php 
	}

	/**
	 * Processing widget options on save
	 *
	 * @param array $new_instance The new options
	 * @param array $old_instance The previous options
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

function register_Kaya_Social_Widget() {
    register_widget( 'Kaya_Social_Widget' );
}
add_action( 'widgets_init', 'register_Kaya_Social_Widget' );