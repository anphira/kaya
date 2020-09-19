<?php
/**
 * Kaya functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.10.2
 */
 


/**
 * Strip out Visual Composer specific shortcodes in search results
 */
add_filter('relevanssi_pre_excerpt_content', 'kaya_trim_vc_shortcodes');
function kaya_trim_vc_shortcodes($content) {
    $content = preg_replace('\[/vc(.*?)\]', '', $content);
    return $content;
}


/**
 * Set blog to sort by most recently updated date if that option is set
 */
function kaya_orderby_modified_posts( $query ) {
	if( get_theme_mod( 'kaya_post_use_last_updated_date', false ) ) {
		if( $query->is_main_query()) {
			if ( $query->is_home() || $query->is_category() || $query->is_tag() ) {
				$query->set( 'orderby', 'modified' );
			}
		}
	}
}
add_action( 'pre_get_posts', 'kaya_orderby_modified_posts' );


/**
 * Declare WooCommerce Support
 */
add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
	$sidebar_setting = get_theme_mod( 'kaya_woo_sidebar' );
	
	echo '<div id="primary" class="content-area ';
	if( ($sidebar_setting !== 'no_sidebar') ) { 
		echo 'has-sidebar'; 
	}
	echo '">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}


/** 
 * Disable All WooCommerce  Styles and Scripts Except Shop Pages
 */
add_action( 'wp_enqueue_scripts', 'dequeue_woocommerce_styles_scripts', 99 );
function dequeue_woocommerce_styles_scripts() {
	if ( function_exists( 'is_woocommerce' ) ) {
		if ( ! is_woocommerce() && ! is_cart() && ! is_checkout() ) {
			# Styles
			//wp_dequeue_style( 'woocommerce-general' );
			//wp_dequeue_style( 'woocommerce-layout' );
			//wp_dequeue_style( 'woocommerce-smallscreen' );
			//wp_dequeue_style( 'woocommerce_frontend_styles' );
			wp_dequeue_style( 'woocommerce_fancybox_styles' );
			wp_dequeue_style( 'woocommerce_chosen_styles' );
			wp_dequeue_style( 'woocommerce_prettyPhoto_css' );
			# Scripts
			wp_dequeue_script( 'wc_price_slider' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-add-to-cart' );
			if( ! get_theme_mod( 'kaya_enable_cart_fragments', false ) ) {
				wp_dequeue_script( 'wc-cart-fragments' );
			}
			wp_dequeue_script( 'wc-checkout' );
			wp_dequeue_script( 'wc-add-to-cart-variation' );
			wp_dequeue_script( 'wc-single-product' );
			wp_dequeue_script( 'wc-cart' );
			wp_dequeue_script( 'wc-chosen' );
			wp_dequeue_script( 'woocommerce' );
			wp_dequeue_script( 'prettyPhoto' );
			wp_dequeue_script( 'prettyPhoto-init' );
			wp_dequeue_script( 'jquery-blockui' );
			wp_dequeue_script( 'jquery-placeholder' );
			wp_dequeue_script( 'fancybox' );
			wp_dequeue_script( 'jqueryui' );
		}
	}
}

 
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
	if(get_theme_mod( 'kaya_turn_off_read_more', false)) {
		return '';
	}
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
 *
function kaya_welcome_notice() {
    ?>
    <div class="notice updated is-dismissible kaya-welcome-notice-dismiss">
        <p><?php _e( 'Thank you for installing the Kaya WordPress theme! View the setup instructions by going to the Customizer and selecting "Need Setup Help?"', 'kaya' ); ?></p>
    </div>
    <?php
}
if(get_theme_mod('kaya_welcome_notice_dismissed', '0')) {
	add_action( 'admin_notices', 'kaya_welcome_notice' );
}

function kaya_welcome_notice_dismiss() {
	set_theme_mod( 'kaya_welcome_notice_dismissed', '1' );
}
add_action( 'wp_ajax_kaya_welcome_notice_dismiss', 'kaya_welcome_notice_dismiss' );
*/

if( ! function_exists('kaya_social_icons') ) :

/**
 * Displays social icons with Font Awesome icons
 */
function kaya_social_icons() {
	echo '<div class="social-icons">';
		if( get_theme_mod( 'kaya_facebook' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_facebook' ) . '"><i class="fab fa-facebook-f"></i></a>';
		}
		if( get_theme_mod( 'kaya_twitter' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_twitter' ) . '"><i class="fab fa-twitter"></i></a>';
		}
		if( get_theme_mod( 'kaya_linkedin' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_linkedin' ) . '"><i class="fab fa-linkedin-in"></i></a>';
		}
		if( get_theme_mod( 'kaya_google_plus' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_google_plus' ) . '"><i class="fab fa-google"></i></a>';
		}
		if( get_theme_mod( 'kaya_skype' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_skype' ) . '"><i class="fab fa-skype"></i></a>';
		}
		if( get_theme_mod( 'kaya_youtube' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_youtube' ) . '"><i class="fab fa-youtube"></i></a>';
		}
		if( get_theme_mod( 'kaya_vimeo' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_vimeo' ) . '"><i class="fab fa-vimeo"></i></a>';
		}
		if( get_theme_mod( 'kaya_instagram' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_instagram' ) . '"><i class="fab fa-instagram"></i></a>';
		}
		if( get_theme_mod( 'kaya_pinterest' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_pinterest' ) . '"><i class="fab fa-pinterest-p"></i></a>';
		}
		if( get_theme_mod( 'kaya_yelp' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_yelp' ) . '"><i class="fab fa-yelp"></i></a>';
		}
		if( get_theme_mod( 'kaya_rss' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="' . get_theme_mod( 'kaya_rss' ) . '"><i class="fas fa-rss"></i></a>';
		}
		if( get_theme_mod( 'kaya_email' ) != '' ) {
			echo '<a class="social-icon-single" target="_blank" href="mailto:' . get_theme_mod( 'kaya_email' ) . '"><i class="fas fa-envelope"></i></a>';
		}
	echo '</div>';
}

endif;


/**
 * Function for [kaya_social_icons] shortcode
 */
if ( ! function_exists( 'kaya_setup' ) ) :
function kaya_social_icons_shortcode() {
	kaya_social_icons();
}
add_shortcode('kaya_social_icons', 'kaya_social_icons_shortcode');
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
 * Add custom image size for related posts
 */
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'related-posts-image', 355, 180, true ); // (cropped)
}



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
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function kaya_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Everywhere Top Sidebar', 'kaya' ),
		'id'            => 'everywhere-top-sidebar',
		'description'   => esc_html__( 'Add widgets here which will display on all sidebars at the top.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Everywhere Bottom Sidebar', 'kaya' ),
		'id'            => 'everywhere-bottom-sidebar',
		'description'   => esc_html__( 'Add widgets here which will display on all sidebars at the bottom.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Pages Sidebar', 'kaya' ),
		'id'            => 'pages-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display below the "Everywhere Top Sidebar" widgets and above the "Everywhere Bottom Sidebar" widgets on your pages.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Post Archives Sidebar', 'kaya' ),
		'id'            => 'posts-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display below the "Everywhere Top Sidebar" widgets and above the "Everywhere Bottom Sidebar" widgets on your blog archive pages (categories, tags, and date archives) and primary blog page sidebar (the page you set under settings > reading as your posts page).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Post Sidebar', 'kaya' ),
		'id'            => 'single-post-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display below the "Everywhere Top Sidebar" widgets and above the "Everywhere Bottom Sidebar" widgets on your individual blog posts.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'kaya' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display on your WooCommerce pages sidebar.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Left', 'kaya' ),
		'id'            => 'top-header-1',
		'description'   => esc_html__( 'If you are using the top header area (turned on in the theme customizer under header), then this will be displayed on the left side.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Header Right', 'kaya' ),
		'id'            => 'top-header-2',
		'description'   => esc_html__( 'If you are using the top header area (turned on in the theme customizer under header), then this will be displayed on the right side.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '',
		'after_title'   => '',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 2', 'kaya' ),
		'id'            => 'header-2',
		'description'   => esc_html__( 'Add content here to be displayed in Header Column 2 widget area (see theme setup guide for where this widget is displayed depending on theme settings).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 3', 'kaya' ),
		'id'            => 'header-3',
		'description'   => esc_html__( 'Add content here to be displayed in Header Column 3 widget area (see theme setup guide for where this widget is displayed depending on theme settings).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 4', 'kaya' ),
		'id'            => 'header-4',
		'description'   => esc_html__( 'Add content here to be displayed in Header Column 4 widget area (see theme setup guide for where this widget is displayed depending on theme settings).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'kaya' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Content for 1st footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'kaya' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Content for 2nd footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'kaya' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Content for 3rd footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'kaya' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Content for 4th footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Extra Widget Area 1', 'kaya' ),
		'id'            => 'extra-area-1',
		'description'   => esc_html__( 'This is a widget area which has no theme displayed location. The purpose of this widget area is to provide you with a spare widget area which can be used in child theme customization or in page builders.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Extra Widget Area 2', 'kaya' ),
		'id'            => 'extra-area-2',
		'description'   => esc_html__( 'This is a widget area which has no theme displayed location. The purpose of this widget area is to provide you with a spare widget area which can be used in child theme customization or in page builders.', 'kaya' ),
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
    $check_width = get_post_meta($post->ID, '_kaya_full_width_check', true);
    $check_title = get_post_meta($post->ID, '_kaya_hide_title_check', true);
    $check_header = get_post_meta($post->ID, '_kaya_hide_header_check', true);
    $check_footer = get_post_meta($post->ID, '_kaya_hide_footer_check', true);
    $google_experiments = get_post_meta($post->ID, '_kaya_google_experiments_code', true);
    
    ?>
    <select id="kaya_sidebar_setting" name="kaya_sidebar_setting">
		<option value="use_default">Use Page Default</option>
		<option value="no_sidebar" <?php selected( $selected, 'no_sidebar' ); ?>>No Sidebar</option>
		<option value="left_sidebar" <?php selected( $selected, 'left_sidebar' ) ?>>Left Sidebar</option>
		<option value="right_sidebar" <?php selected( $selected, 'right_sidebar' ) ?>>Right Sidebar</option>
	</select>
	
	<p>
        <input type="checkbox" id="kaya_full_width_check" name="kaya_full_width_check" <?php checked( $check_width, 'on' ); ?> />
        <label for="kaya_full_width_check">Make page full width (useful for Landing Pages)</label>
    </p>
	<p>
        <input type="checkbox" id="kaya_hide_title_check" name="kaya_hide_title_check" <?php checked( $check_title, 'on' ); ?> />
        <label for="kaya_hide_title_check">Hide the page title</label>
    </p>
	<p>
        <input type="checkbox" id="kaya_hide_header_check" name="kaya_hide_header_check" <?php checked( $check_header, 'on' ); ?> />
        <label for="kaya_hide_header_check">Hide the page header</label>
    </p>
	<p>
        <input type="checkbox" id="kaya_hide_footer_check" name="kaya_hide_footer_check" <?php checked( $check_footer, 'on' ); ?> />
        <label for="kaya_hide_footer_check">Hide the page footer</label>
    </p>
    
    <p>Enter Google Experiments Code - make sure to ONLY enter code on the master page, not variations:</p>
    <textarea rows="4" style="width: 100%;" id="kaya_google_experiments_code" name="kaya_google_experiments_code" ><?php echo $google_experiments; ?></textarea>
    
    <?php 
    echo '<hr />Pages are currently set to display ';
    if(get_theme_mod( 'kaya_page_hero' ) == 'on') {
    	echo 'the page hero area';
    }
    else {
    	echo 'no page hero area';
    }
    echo ' by default. To override the page hero setting for this page, select your desired setting below:<br /><br />';
    
    $values = get_post_custom( $post->ID );
    $hero_selected = isset( $values['kaya_page_hero_setting'] ) ? esc_attr( $values['kaya_page_hero_setting'][0] ) : '';
    $page_hero_content = get_post_meta($post->ID, '_kaya_page_hero_content', true);
    
    ?>
    <select id="kaya_page_hero_setting" name="kaya_page_hero_setting">
		<option value="use_default">Use Page Default</option>
		<option value="no_page_hero" <?php selected( $hero_selected, 'no_page_hero' ) ?>>No Page Hero</option>
		<option value="use_page_hero" <?php selected( $hero_selected, 'use_page_hero' ) ?>>Use Page Hero</option>
	</select>
    
	<?php 

	echo '<p>Page Hero Background color</p>';
	$kaya_page_hero_header_color = get_post_meta($post->ID, '_kaya_page_hero_header_color', true);
	?>
	<input class="color_field" type="text" name="kaya_page_hero_header_color" value="<?php esc_attr( $kaya_page_hero_header_color ); ?>"/>
	<?php

	echo '<p>Page Hero Background image</p>';
	$kaya_page_hero_image = get_post_meta($post->ID, '_kaya_page_hero_image', true);
	?>

	
	<input style="width:100%" type="text" name="kaya_page_hero_image" id="kaya_page_hero_image" value="<?php echo esc_attr( $kaya_page_hero_image ); ?>" />
    

	<?php
	echo '<p>Style of Page Hero Background: The page default is set to ', get_theme_mod('kaya_page_hero_background_image_type'),'</p>';
	$selected = isset( $values['kaya_page_hero_background_setting'] ) ? esc_attr( $values['kaya_page_hero_background_setting'][0] ) : '';
	?>
    <select id="kaya_page_hero_background_setting" name="kaya_page_hero_background_setting">
		<option value="use_page_default">Use page default setting</option>
		<option value="dont_use" <?php selected( $selected, 'dont_use' ); ?>>Use color instead of image</option>
		<option value="tile_image" <?php selected( $selected, 'tile_image' ); ?>>Tile image</option>
		<option value="fix_to_top" <?php selected( $selected, 'fix_to_top' ) ?>>Affix background image to top</option>
		<option value="fix_to_bottom" <?php selected( $selected, 'fix_to_bottom' ) ?>>Affix background image to bottom</option>
		<option value="stretch" <?php selected( $selected, 'stretch' ) ?>>Stetch image to cover whole background</option>
		<option value="fixed_pos" <?php selected( $selected, 'fixed_pos' ) ?>>Fixed position so background doesnt scroll</option>
	</select>

    
    <p>Enter content for page hero area:<br /><em>This content area supports full HTML</em></p>
    <textarea rows="4" style="width: 100%;" id="kaya_page_hero_content" name="kaya_page_hero_content" ><?php echo $page_hero_content; ?></textarea>

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
		update_post_meta( $post_id, '_kaya_full_width_check', $_POST['kaya_full_width_check']);
	else
		update_post_meta( $post_id, '_kaya_full_width_check', '');
	
	if( isset( $_POST['kaya_hide_title_check'] ) )
		update_post_meta( $post_id, '_kaya_hide_title_check', $_POST['kaya_hide_title_check']);
	else
		update_post_meta( $post_id, '_kaya_hide_title_check', '');
	
	if( isset( $_POST['kaya_hide_header_check'] ) )
		update_post_meta( $post_id, '_kaya_hide_header_check', $_POST['kaya_hide_header_check']);
	else
		update_post_meta( $post_id, '_kaya_hide_header_check', '');
	
	if( isset( $_POST['kaya_hide_footer_check'] ) )
		update_post_meta( $post_id, '_kaya_hide_footer_check', $_POST['kaya_hide_footer_check']);
	else
		update_post_meta( $post_id, '_kaya_hide_footer_check', '');
		
	if( isset( $_POST['kaya_google_experiments_code'] ) )
		update_post_meta( $post_id, '_kaya_google_experiments_code', $_POST['kaya_google_experiments_code'] );

	if( isset( $_POST['kaya_page_hero_setting'] ) )
        update_post_meta( $post_id, 'kaya_page_hero_setting', esc_attr( $_POST['kaya_page_hero_setting'] ) );

	if( isset( $_POST['kaya_page_hero_header_color'] ) )
        update_post_meta( $post_id, '_kaya_page_hero_header_color', esc_attr( $_POST['kaya_page_hero_header_color'] ) );

    // Checks for input and saves if needed
	if( isset( $_POST[ 'kaya_page_hero_image' ] ) ) {
	    update_post_meta( $post_id, '_kaya_page_hero_image', $_POST[ 'kaya_page_hero_image' ] );
	}

	if( isset( $_POST['kaya_page_hero_background_setting'] ) )
        update_post_meta( $post_id, 'kaya_page_hero_background_setting', esc_attr( $_POST['kaya_page_hero_background_setting'] ) );
		
	if( isset( $_POST['kaya_page_hero_content'] ) )
		update_post_meta( $post_id, '_kaya_page_hero_content', htmlspecialchars_decode($_POST['kaya_page_hero_content']) );
}
add_action( 'save_post', 'kaya_page_settings_save_meta_box' );


/**
 * Enqueue scripts and styles.
 */
function kaya_scripts() {

	

	// enqueue child theme if using child theme
	if(get_theme_file_uri() != get_template_directory_uri()) {
		wp_enqueue_style( 'kaya-style', get_template_directory_uri() . '/style.min.css', false, filemtime( get_theme_file_path( 'style.min.css' )));
		wp_enqueue_style( 'kaya-child-style', get_theme_file_uri('style.css'), false, filemtime( get_theme_file_path( 'style.css' )));
	}
	else {
		wp_enqueue_style( 'kaya-style', get_theme_file_uri('style.min.css'), false, filemtime( get_theme_file_path( 'style.min.css' )));
	}

	wp_enqueue_script( 'kaya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161215', true );

	wp_enqueue_script( 'kaya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20161215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kaya_scripts' );

/**
 * Enqueue scripts and styles for WP dashboard (admin).
 */
function kaya_admin_scripts() {
    wp_enqueue_script( 'kaya_notice_update', get_template_directory_uri() . '/js/dismissible-admin-notices.js' );
}
add_action('admin_enqueue_scripts', 'kaya_admin_scripts');


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
function enqueue_kaya_font_awesome_stylesheet(){
	wp_enqueue_style('font-awesome-kaya', get_template_directory_uri() . '/inc/fontawesome-free-5.13.0-web/css/all.min.css');
}
add_action('wp_enqueue_scripts','enqueue_kaya_font_awesome_stylesheet');

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


/* Remove website field from the comment form */
add_filter('comment_form_default_fields', 'kaya_website_field_remove');
function kaya_website_field_remove($fields) {
	if(isset($fields['url']))
	unset($fields['url']);
	return $fields;
}