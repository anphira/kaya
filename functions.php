<?php
/**
 * Kaya functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 3.2.1
 */

/**
 * 
 * Updater direct from github
 * 
 */
// Automatic theme updates from the GitHub repository
add_filter('pre_set_site_transient_update_themes', 'automatic_GitHub_updates', 100, 1);
function automatic_GitHub_updates($data) {
  // Theme information
  $theme   = get_template(); // Folder name of the current theme
  $current = wp_get_theme($theme)->get('Version'); // Get the version of the current theme
  // GitHub information
  $user = 'anphira'; // The GitHub username hosting the repository
  $repo = 'kaya'; // Repository name as it appears in the URL
  // Get the latest release tag from the repository. The User-Agent header must be sent, as per
  // GitHub's API documentation: https://developer.github.com/v3/#user-agent-required
  $file = @json_decode(@file_get_contents('https://api.github.com/repos/'.$user.'/'.$repo.'/releases/latest', false,
      stream_context_create(['http' => ['header' => "User-Agent: ".$user."\r\n"]])
  ));
  if($file) {
		// Clean the version string by removing common prefixes like 'v', 'ver', etc.
    $update = preg_replace('/^(v|ver|version)?\s*/', '', $file->tag_name);
    // Only return a response if the new version number is higher than the current version
    // Use version_compare() for proper semantic version comparison
    if(version_compare($update, $current, '>')) {
  	  $data->response[$theme] = array(
	      'theme'       => $theme,
	      // Strip the version number of any non-alpha characters (excluding the period)
	      // This way you can still use tags like v1.1 or ver1.1 if desired
	      'new_version' => $update,
	      'url'         => 'https://github.com/'.$user.'/'.$repo,
	      'package'     => $file->assets[0]->browser_download_url,
      );
    }
  }
  return $data;
}


/**
 * Prevent clickjacking -- this only works on some hosting systems. On others you have contact support for how to.
 */
add_action( 'send_headers', 'kaya_send_frame_options_header', 10, 0 );
function kaya_send_frame_options_header() {
	header( 'X-Frame-Options: SAMEORIGIN' );
}


/**
 * Strip out WP Bakery specific shortcodes in search results
 */
add_filter('relevanssi_pre_excerpt_content', 'kaya_trim_vc_shortcodes');
function kaya_trim_vc_shortcodes($content) {
    $content = preg_replace('\[/vc(.*?)\]', '', $content);
    return $content;
}


/**
 * Set perfmatters youtube thumbnail to large
 */
if(function_exists('perfmatters_plugins_loaded')) {
	add_filter('perfmatters_lazyload_youtube_thumbnail_resolution', function($resolution) {
		if(!wp_is_mobile()) {
			$resolution = 'maxresdefault';
		}
		return $resolution;
	});
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
add_action( 'after_setup_theme', 'kaya_woocommerce_support' );
function kaya_woocommerce_support() {
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'kaya_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'kaya_theme_wrapper_end', 10);

function kaya_theme_wrapper_start() {
	$sidebar_setting = kaya_sanitize_sidebars( get_theme_mod( 'kaya_woo_sidebar', 'no_sidebar' ) );
	
	echo '<div id="primary" class="content-area ';
	if( ($sidebar_setting !== 'no_sidebar') ) { 
		echo 'has-sidebar'; 
	}
	echo '">';
}

function kaya_theme_wrapper_end() {
  echo '</div>';
}


/** 
 * Disable All WooCommerce  Styles and Scripts Except Shop Pages
 */
add_action( 'wp_enqueue_scripts', 'kaya_dequeue_woocommerce_styles_scripts', 99 );
function kaya_dequeue_woocommerce_styles_scripts() {
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
 * Loads the kaya functions so that they could be overriden by a child theme.
 * Registers an editor stylesheet for the theme.
 */
function kaya_theme_add_editor_styles() {
	require get_template_directory() . '/inc/kaya-function.php';

	add_theme_support('editor-styles');
    add_editor_style( get_template_directory_uri() . '/style.min.css' );

    // also add the child theme styles
    if(get_theme_file_uri() != get_template_directory_uri()) {
    	add_editor_style( get_theme_file_uri('style.css') );
    }
}
add_action( 'after_setup_theme', 'kaya_theme_add_editor_styles' );


/**
 * Blog excerpts
 */
function kaya_excerpt_length( $length ) {
	$kaya_blog_excerpt = sanitize_text_field( get_theme_mod( 'kaya_blog_excerpt', '' ) );
	if( $kaya_blog_excerpt != '') {
		return $kaya_blog_excerpt;
	}
	else {
		return 50;
	}
}
add_filter( 'excerpt_length', 'kaya_excerpt_length', 999 );

function kaya_excerpt_more( $more ) {
	return '';
}
add_filter( 'excerpt_more', 'kaya_excerpt_more' );

function kaya_the_excerpt() {
	the_excerpt();
	if(!get_theme_mod( 'kaya_turn_off_read_more', false)) {
		echo '<p><a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'kaya') . '<span class="screen-reader-text">' . get_the_title( get_the_ID() ) . '</span></a>';
	}
}




if( ! function_exists('kaya_social_icons') ) :

/**
 * Displays social icons with Font Awesome icons
 */
function kaya_social_icons() {
	echo '<div class="social-icons">';
		if( get_theme_mod( 'kaya_facebook' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_facebook' )) . '"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"> Visit us on Facebook</span></a>';
		}
		if( get_theme_mod( 'kaya_twitter' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_twitter' )) . '"><i class="fab fa-x-twitter"></i><span class="screen-reader-text"> Visit us on X</span></a>';
		}
		if( get_theme_mod( 'kaya_linkedin' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_linkedin' )) . '"><i class="fab fa-linkedin-in"><span class="screen-reader-text"> Visit us on LinkedIn</span></i></a>';
		}
		if( get_theme_mod( 'kaya_google_plus' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_google_plus' )) . '"><i class="fab fa-google"></i><span class="screen-reader-text"> Visit us on Google Maps</span></a>';
		}
		if( get_theme_mod( 'kaya_skype' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_skype' )) . '"><i class="fab fa-skype"></i><span class="screen-reader-text"> Contact us on Skype</span></a>';
		}
		if( get_theme_mod( 'kaya_youtube' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_youtube' )) . '"><i class="fab fa-youtube"></i><span class="screen-reader-text"> Visit us on Youtube</span></a>';
		}
		if( get_theme_mod( 'kaya_vimeo' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_vimeo' )) . '"><i class="fab fa-vimeo-v"></i><span class="screen-reader-text"> Visit us on Vimeo</span></a>';
		}
		if( get_theme_mod( 'kaya_instagram' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_instagram' )) . '"><i class="fab fa-instagram"></i><span class="screen-reader-text"> Visit us on Instagram</span></a>';
		}
		if( get_theme_mod( 'kaya_pinterest' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_pinterest' )) . '"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"> Visit us on Pinterest</span></a>';
		}
		if( get_theme_mod( 'kaya_yelp' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_yelp' )) . '"><i class="fab fa-yelp"></i><span class="screen-reader-text"> Visit us on Yelp</span></a>';
		}
		if( get_theme_mod( 'kaya_behance' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_behance' )) . '"><i class="fab fa-behance"></i><span class="screen-reader-text"> Visit us on Behance</span></a>';
		}
		if( get_theme_mod( 'kaya_rss' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_rss' )) . '"><i class="fas fa-rss"></i><span class="screen-reader-text"> View our RSS feed</span></a>';
		}
		if( get_theme_mod( 'kaya_email' ) != '' ) {
			echo '<a class="social-icon-single" href="mailto:' . sanitize_email(get_theme_mod( 'kaya_email' )) . '"><i class="fas fa-envelope"></i><span class="screen-reader-text"> Email us</span></a>';
		}
		if( get_theme_mod( 'kaya_social_custom_1' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_social_custom_1' )) . '"><i class="' . sanitize_text_field( get_theme_mod( 'kaya_social_custom_1_icon', '' ) ) . '"></i><span class="screen-reader-text"> Email us</span></a>';
		}
		if( get_theme_mod( 'kaya_social_custom_2' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_social_custom_2' )) . '"><i class="' . sanitize_text_field( get_theme_mod( 'kaya_social_custom_2_icon', '' ) ) . '"></i><span class="screen-reader-text"> Email us</span></a>';
		}
		if( get_theme_mod( 'kaya_social_custom_3' ) != '' ) {
			echo '<a class="social-icon-single" href="' . esc_url(get_theme_mod( 'kaya_social_custom_3' )) . '"><i class="' . sanitize_text_field( get_theme_mod( 'kaya_social_custom_3_icon', '' ) ) . '"></i><span class="screen-reader-text"> Email us</span></a>';
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
	// The footer menu & top menu can be used in other locations as desired.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'kaya' ),
    'footer-menu' => esc_html__( 'Footer Menu', 'kaya' ),
    'top-menu' => esc_html__( 'Top Menu', 'kaya' )
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
		'style',
		'script',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'kaya_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Theme support for alignwide and alignfull
	add_theme_support( "align-wide" );

	// Theme support for responsive emebds
	add_theme_support( 'responsive-embeds' );
	
}
endif;
add_action( 'after_setup_theme', 'kaya_setup' );



/**
 * Add custom image size for related posts
 */
add_action( 'after_setup_theme', 'kaya_image_sizes_setup' );
function kaya_image_sizes_setup() {
    add_image_size( 'related-posts-image', 355, 180, true ); // (cropped)
}



/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $kaya_content_width
 */
function kaya_content_width() {
	$GLOBALS['kaya_content_width'] = apply_filters( 'kaya_content_width', 1140 );
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
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Everywhere Bottom Sidebar', 'kaya' ),
		'id'            => 'everywhere-bottom-sidebar',
		'description'   => esc_html__( 'Add widgets here which will display on all sidebars at the bottom.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Pages Sidebar', 'kaya' ),
		'id'            => 'pages-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display below the "Everywhere Top Sidebar" widgets and above the "Everywhere Bottom Sidebar" widgets on your pages.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Post Archives Sidebar', 'kaya' ),
		'id'            => 'posts-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display below the "Everywhere Top Sidebar" widgets and above the "Everywhere Bottom Sidebar" widgets on your blog archive pages (categories, tags, and date archives) and primary blog page sidebar (the page you set under settings > reading as your posts page).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Single Post Sidebar', 'kaya' ),
		'id'            => 'single-post-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display below the "Everywhere Top Sidebar" widgets and above the "Everywhere Bottom Sidebar" widgets on your individual blog posts.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce Sidebar', 'kaya' ),
		'id'            => 'kaya-woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here which will be display on your WooCommerce pages sidebar.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
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
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 3', 'kaya' ),
		'id'            => 'header-3',
		'description'   => esc_html__( 'Add content here to be displayed in Header Column 3 widget area (see theme setup guide for where this widget is displayed depending on theme settings).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Column 4', 'kaya' ),
		'id'            => 'header-4',
		'description'   => esc_html__( 'Add content here to be displayed in Header Column 4 widget area (see theme setup guide for where this widget is displayed depending on theme settings).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'kaya' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Content for 1st footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'kaya' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Content for 2nd footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'kaya' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Content for 3rd footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'kaya' ),
		'id'            => 'footer-4',
		'description'   => esc_html__( 'Content for 4th footer column (if used).', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Extra Widget Area 1', 'kaya' ),
		'id'            => 'extra-area-1',
		'description'   => esc_html__( 'This is a widget area which has no theme displayed location. The purpose of this widget area is to provide you with a spare widget area which can be used in child theme customization or in page builders.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Extra Widget Area 2', 'kaya' ),
		'id'            => 'extra-area-2',
		'description'   => esc_html__( 'This is a widget area which has no theme displayed location. The purpose of this widget area is to provide you with a spare widget area which can be used in child theme customization or in page builders.', 'kaya' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="widget-title">',
		'after_title'   => '</div>',
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
    
    <?php 
    echo '<hr />Pages are currently set to display ';
    if(get_theme_mod( 'kaya_page_hero', 'off' ) == 'on') {
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
	echo '<p>Style of Page Hero Background: The page default is ';
	if('' == esc_html(get_theme_mod('kaya_page_hero_background_image_type')) ) {
		echo 'not set.</p>';
	}
	else {
		echo esc_html(get_theme_mod('kaya_page_hero_background_image_type')),'.</p>';
	}
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
    
	<?php 

	echo '<p>Page Hero Background color. Use a valid CSS color name or hex value (ie: aqua or #ff00ff).</p>';
	$kaya_page_hero_header_color = get_post_meta($post->ID, '_kaya_page_hero_header_color', true);
	?>
	<input class="color_field" type="text" name="kaya_page_hero_header_color" value="<?php echo esc_attr($kaya_page_hero_header_color); ?>"/>
	<?php

	echo '<p>Page Hero Background image. Use a valid URL path (ie: https://example.com/wp-content/uploads/img.jpg).</p>';
	$kaya_page_hero_image = get_post_meta($post->ID, '_kaya_page_hero_image', true);
	?>

	<input style="width:100%" type="text" name="kaya_page_hero_image" id="kaya_page_hero_image" value="<?php echo esc_attr( $kaya_page_hero_image ); ?>" />

    
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

	if( !isset( $_POST['kaya_sidebar_setting_nonce'] ) || !wp_verify_nonce( $_POST['kaya_sidebar_setting_nonce'], 'kaya_sidebar_setting_nonce' ) ) return; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
     
    
    // Check the user's permissions.
	if( !current_user_can( 'edit_post', $post_id ) ) return;
 
	/* OK, it's safe for us to save the data now. */
 
	// Sanitize the user input.
	if( isset( $_POST['kaya_sidebar_setting'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        update_post_meta( $post_id, 'kaya_sidebar_setting', esc_attr( wp_unslash($_POST['kaya_sidebar_setting']) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
	
	if( isset( $_POST['kaya_full_width_check'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		update_post_meta( $post_id, '_kaya_full_width_check', wp_unslash($_POST['kaya_full_width_check'])); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
	else {
		update_post_meta( $post_id, '_kaya_full_width_check', '');
	}
	
	if( isset( $_POST['kaya_hide_title_check'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		update_post_meta( $post_id, '_kaya_hide_title_check', wp_unslash($_POST['kaya_hide_title_check'])); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
	else {
		update_post_meta( $post_id, '_kaya_hide_title_check', '');
	}
	
	if( isset( $_POST['kaya_hide_header_check'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		update_post_meta( $post_id, '_kaya_hide_header_check', wp_unslash($_POST['kaya_hide_header_check'])); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
	else {
		update_post_meta( $post_id, '_kaya_hide_header_check', '');
	}
	
	if( isset( $_POST['kaya_hide_footer_check'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		update_post_meta( $post_id, '_kaya_hide_footer_check', wp_unslash($_POST['kaya_hide_footer_check'])); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
	else {
		update_post_meta( $post_id, '_kaya_hide_footer_check', '');
	}

	if( isset( $_POST['kaya_page_hero_setting'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        update_post_meta( $post_id, 'kaya_page_hero_setting', esc_attr( wp_unslash($_POST['kaya_page_hero_setting']) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}

	if( isset( $_POST['kaya_page_hero_header_color'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        update_post_meta( $post_id, '_kaya_page_hero_header_color', wp_unslash($_POST['kaya_page_hero_header_color']) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}

    // Checks for input and saves if needed
	if( isset( $_POST[ 'kaya_page_hero_image' ] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	    update_post_meta( $post_id, '_kaya_page_hero_image', wp_unslash($_POST[ 'kaya_page_hero_image' ]) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}

	if( isset( $_POST['kaya_page_hero_background_setting'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
        update_post_meta( $post_id, 'kaya_page_hero_background_setting', esc_attr( wp_unslash($_POST['kaya_page_hero_background_setting']) ) ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
		
	if( isset( $_POST['kaya_page_hero_content'] ) ) { // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		update_post_meta( $post_id, '_kaya_page_hero_content', $_POST['kaya_page_hero_content'] ); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
	}
}
add_action( 'save_post', 'kaya_page_settings_save_meta_box' );


/**
 * Enqueue scripts and styles.
 */
function kaya_scripts() {

	// enqueue accessibility options panel stylesheet
	if( get_theme_mod( 'kaya_a11y_enable_checkbox', false ) ) {
		wp_enqueue_style( 'kaya-a11y', get_template_directory_uri() . '/accessibility.css', false, filemtime( get_theme_file_path( 'accessibility.css' )));
	}

	// enqueue child theme if using child theme
	if(get_theme_file_uri() != get_template_directory_uri()) {
		wp_enqueue_style( 'kaya-style', get_template_directory_uri() . '/style.min.css', false, filemtime( get_theme_file_path( 'style.min.css' )));
		wp_enqueue_style( 'kaya-child-style', get_theme_file_uri('style.css'), false, filemtime( get_theme_file_path( 'style.css' )));
	}
	else {
		wp_enqueue_style( 'kaya-style', get_theme_file_uri('style.min.css'), false, filemtime( get_theme_file_path( 'style.min.css' )));
	}

	if(!get_theme_mod('kaya_do_not_load_nav_js', false)) {
		wp_enqueue_script( 'kaya-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20161216', true );
	}

	wp_enqueue_script( 'kaya-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20161216', true );
	wp_enqueue_script( 'kaya-accessibility', get_template_directory_uri() . '/js/accessibility.js', array(), '20240708', true );

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
//require get_template_directory() . '/inc/extras.php';

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
function kaya_enqueue_font_awesome_stylesheet(){
	wp_enqueue_style('font-awesome-kaya', get_template_directory_uri() . '/fonts/fontawesome-free-7.0.0-web/css/all.min.css');
}
add_action('wp_enqueue_scripts','kaya_enqueue_font_awesome_stylesheet');

/**
 * Function to determine good contrast color (black or white)
 */
function kaya_readableColour($bg){
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
		<label for="<?php echo esc_html($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'kaya' ); ?></label> 
		<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
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

function kaya_register_Social_Widget() {
    register_widget( 'Kaya_Social_Widget' );
}
add_action( 'widgets_init', 'kaya_register_Social_Widget' );


/* Remove website field from the comment form */
add_filter('comment_form_default_fields', 'kaya_website_field_remove');
function kaya_website_field_remove($fields) {
	if(isset($fields['url']))
	unset($fields['url']);
	return $fields;
}


/**
 * Customize login page with logo & URL
 */
function kaya_login_logo() { 
	$default_kaya_logo = get_template_directory_uri() . '/img/kaya-logo.png';
	$kaya_setting_logo = esc_url(get_theme_mod( 'kaya_logo', '' ));
	if($kaya_setting_logo != '') {
		$default_kaya_logo = $kaya_setting_logo;
	}
	?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?php echo esc_url($default_kaya_logo); ?>);
			height:auto;
			width:194px;
			background-size: contain;
			background-repeat: no-repeat;
			padding-bottom: 30px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'kaya_login_logo' );

function kaya_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'kaya_login_logo_url' );



/**
 * Kaya Logo Display
 */
add_action('kaya_logo_display', 'kaya_logo_display_callback');

function kaya_logo_display_callback() {
	echo '<div class="site-branding">';
		if ( get_theme_mod( 'kaya_logo', false ) ) :
			echo '<a href="',  esc_url( home_url() )  , '">';
			$kaya_alt = esc_attr( get_bloginfo( 'name', 'display' ) ) . ' home.';
			$kaya_logo = esc_url(get_theme_mod( 'kaya_logo' ));
			$width = get_theme_mod( 'kaya_logo_width', '' );
			$height = get_theme_mod( 'kaya_logo_height', '' );
			echo '<img src="' . esc_url($kaya_logo) . '" alt="' . esc_html($kaya_alt) . '" width="' . esc_html($width) . '" height="' . esc_html($height) . '">';
			echo '</a>';
		else :
			echo '<h3 class="site-title"><a href="',  esc_url( home_url() )  , '">' , esc_html(bloginfo( 'name' )) , '</a></h3>';
		endif;
	echo '</div><!-- .site-branding -->';
}


/**
 * 
 * Calculate reading time of blog post
 * 
 */
add_action('kaya_reading_time', 'kaya_reading_time_callback');
function kaya_reading_time_callback() {
	$words = str_word_count( wp_strip_all_tags( get_the_content() ) );
	$reading_time = ceil($words/250);
	echo $reading_time;
}