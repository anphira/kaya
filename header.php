<?php
/**
 * The header for Kaya theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.11
 */

$postID = get_queried_object_id();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

<div id="page" class="site">

	<header id="masthead" class="site-header <?php if(get_theme_mod( 'kaya_transparent_header', false ) ) echo 'transparent-header'; ?>">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaya' ); ?></a>

	<?php if(get_theme_mod( 'kaya_a11y_enable_checkbox', false )) { ?>
		<div class="a11y-options-bar container">
			<button id="kaya-a11y-open" onclick="kaya_show_a11y_options()"><i class="fas fa-universal-access"></i> Show preferences</button>
			<div id="kaya-a11y-options" style="display:none">
				<button id="kaya-a11y-close" onclick="kaya_hide_a11y_options()"><i class="fas fa-universal-access"></i> Close preferences</button>
				<h2 class="h4">Accessibility preferences</h2>

				<div class="flexbox">

				<?php if( get_theme_mod( 'kaya_a11y_textresize_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Text size:</legend>
							<input id="kaya-text-size-default" name="kaya-text-size" type="radio" value="default" onchange="kaya_set_text_size('default')"><label for="kaya-text-size-default">Default for site</label><br>
							<input id="kaya-text-size-small" name="kaya-text-size" type="radio" value="text-size-small" onchange="kaya_set_text_size('text-size-small')"><label for="kaya-text-size-small">Small</label><br>
							<input id="kaya-text-size-large" name="kaya-text-size" type="radio" value="text-size-large" onchange="kaya_set_text_size('text-size-large')"><label for="kaya-text-size-large">Large</label><br>
							<input id="kaya-text-size-xlarge" name="kaya-text-size" type="radio" value="text-size-xlarge" onchange="kaya_set_text_size('text-size-xlarge')"><label for="kaya-text-size-xlarge">Extra Large</label><br>
							<input id="kaya-text-size-huge" name="kaya-text-size" type="radio" value="text-size-huge" onchange="kaya_set_text_size('text-size-huge')"><label for="kaya-text-size-huge">Huge</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_lineheight_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Line spacing:</legend>
							<input id="kaya-line-spacing-default" name="kaya-line-spacing" type="radio" value="default" onchange="kaya_set_line_height('default')"><label for="kaya-line-spacing-default">Default for site</label><br>
							<input id="kaya-line-spacing-1" name="kaya-line-spacing" type="radio" value="line-height-1" onchange="kaya_set_line_height('line-height-1')"><label for="kaya-line-spacing-1">1</label><br>
							<input id="kaya-line-spacing-125" name="kaya-line-spacing" type="radio" value="line-height-125" onchange="kaya_set_line_height('line-height-125')"><label for="kaya-line-spacing-125">1.25</label><br>
							<input id="kaya-line-spacing-15" name="kaya-line-spacing" type="radio" value="line-height-15" onchange="kaya_set_line_height('line-height-15')"><label for="kaya-line-spacing-15">1.5</label><br>
							<input id="kaya-line-spacing-175" name="kaya-line-spacing" type="radio" value="line-height-175" onchange="kaya_set_line_height('line-height-175')"><label for="kaya-line-spacing-175">1.75</label><br>
							<input id="kaya-line-spacing-2" name="kaya-line-spacing" type="radio" value="line-height-2" onchange="kaya_set_line_height('line-height-2')"><label for="kaya-line-spacing-2">2</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_font_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Change font:</legend>
							<input id="kaya-font-family-default" name="kaya-font-family" type="radio" value="default" onchange="kaya_set_font_family('default')"><label for="kaya-font-family-default">Default for site</label><br>
							<input id="kaya-font-family-arial" name="kaya-font-family" type="radio" value="arial" onchange="kaya_set_font_family('arial')"><label for="kaya-font-family-arial">Arial</label><br>
							<input id="kaya-font-family-dyslexic" name="kaya-font-family" type="radio" value="dyslexic" onchange="kaya_set_font_family('dyslexic')"><label for="kaya-font-family-dyslexic">Open Dyslexic</label><br>
							<input id="kaya-font-family-times" name="kaya-font-family" type="radio" value="times" onchange="kaya_set_font_family('times')"><label for="kaya-font-family-times">Times New Roman</label><br>
							<input id="kaya-font-family-verdana" name="kaya-font-family" type="radio" value="verdana" onchange="kaya_set_font_family('verdana')"><label for="kaya-font-family-verdana">Verdana</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_contrast_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Change contrast:</legend>
							<input id="kaya-contrast-default" name="kaya-contrast" type="radio" value="on" onchange="kaya_set_contrast('default')"><label for="kaya-contrast-default">Default for site</label><br>
							<input id="kaya-contrast-white-bkgd" name="kaya-contrast" type="radio" value="on" onchange="kaya_set_contrast('white-bkgd-black-txt')"><label for="kaya-contrast-white-bkgd">White background with black text</label><br>
							<input id="kaya-contrast-black-bkgd" name="kaya-contrast" type="radio" value="off" onchange="kaya_set_contrast('black-bkgd-white-txt')"><label for="kaya-contrast-black-bkgd">Black background with white text</label>
						</fieldset>
					</div>
				<?php } ?>

				<?php if( get_theme_mod( 'kaya_a11y_inputs_checkbox', false ) ) { ?>
					<div class="">
						<fieldset>
							<legend>Enhance inputs areas:</legend>
							<input id="kaya-enhance-inputs-off" name="kaya-enhance-inputs" type="radio" value="off" onchange="kaya_set_enhance_inputs('off')"><label for="kaya-enhance-inputs-off">Default for site: Off</label><br>
							<input id="kaya-enhance-inputs-on" name="kaya-enhance-inputs" type="radio" value="on" onchange="kaya_set_enhance_inputs('on')"><label for="kaya-enhance-inputs-on">On</label>
						</fieldset>
					</div>
				<?php } ?>
				</div>
			</div>
		</div>
	<?php } ?>

	<?php if(get_theme_mod( 'kaya_announce_bar_checkbox', false )) { ?>
		<div class="announcement-bar">
			<?php echo esc_html(get_theme_mod( 'kaya_announce_bar_content', '' )); ?>
			<?php if(get_theme_mod( 'kaya_announce_bar_button_show', false )) { ?>
				<a class="announcement-button" href="<?php echo esc_url(get_theme_mod( 'kaya_announce_bar_button_url', '' )); ?>"><?php echo esc_html(get_theme_mod( 'kaya_announce_bar_button_text', '' )); ?></a>
			<?php } ?>
		</div>
	<?php } ?>

	<?php if( '' == get_post_meta($postID, '_kaya_hide_header_check', true)) { ?>
		<?php if(get_theme_mod( 'kaya_top_header', false )) { ?>
			<div class="top-header">
				<div class="container flexbox">
					<div class="">
						<?php dynamic_sidebar('top-header-1'); ?>
					</div>
					<div class="">
						<?php dynamic_sidebar('top-header-2'); ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		<?php } ?>
		<div class="container flexbox-non-responsive">
			<?php 
			switch(get_theme_mod( 'kaya_header_columns', 'one_column' )) {
				case 'one_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					break;
				case 'two_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				case 'three_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					break;
				case 'four_column': 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					echo '<div class="">';
						dynamic_sidebar('Header-4');
					echo '</div>';
					break;
				case 'logo_menu':
					echo '<div class="kaya-left-side">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="kaya-right-side">';
						dynamic_sidebar('Header-2');
						echo '<nav id="site-navigation" class="main-navigation">';
						if( ! get_theme_mod( 'kaya_hide_mobile_button_menu', false ) ) {
							?><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button><?php
						}
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
						echo '</nav>';
					echo '</div>';
					break;
				case 'logo_left_right_content':
					echo '<div class="kaya-left-side">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="kaya-right-side">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				default: 
					echo '<div class="">';
						kaya_logo_display();
					echo '</div>';
					break;
			} ?>
			
		</div><!-- .container -->

		<?php if( 'logo_menu' !== get_theme_mod( 'kaya_header_columns', 'one_column' )) { ?>
		<nav id="site-navigation" class="main-navigation">
			<div class="container">
				<?php if( !get_theme_mod( 'kaya_hide_mobile_button_menu', false )) { ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button>
				<?php } ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div> <!-- .container -->
		</nav><!-- #site-navigation -->
		<?php } ?>
	<?php } ?>
	</header><!-- #masthead -->


	<?php 
	/* Determine content classes */
	$content_class = 'site-content ';
	if(!is_search() && ( 'on' == get_post_meta($postID, '_kaya_full_width_check', true)))  {
		$content_class .= 'full-width ';
	} else {
		$content_class .= 'normal-width ';
	}

	/* Sidebar classes */
	if(is_page()) {
		if(!get_post_meta($postID, 'kaya_sidebar_setting', true) || 'use_default' == get_post_meta($postID, 'kaya_sidebar_setting', true) ) {
			if ('left_sidebar' == get_theme_mod( 'kaya_page_sidebar', 'no_sidebar' )) 
				$content_class .= 'sidebar-left ';
			elseif ('right_sidebar' == get_theme_mod( 'kaya_page_sidebar', 'right_sidebar' )) 
				$content_class .= 'sidebar-right ';
			else
				$content_class .= 'no-sidebar ';
		}
		else {
			$sidebar_class_temp = get_post_meta($postID, 'kaya_sidebar_setting', true);
			switch($sidebar_class_temp) {
				case 'left_sidebar':
					$content_class .= 'sidebar-left ';
					break;
				case 'no_sidebar':
					$content_class .= 'no-sidebar ';
					break;
				case 'right_sidebar':
					$content_class .= 'sidebar-right ';
					break;
				default:
					$content_class .= 'no-sidebar ';
					break;
			}
		}
	}
	elseif(function_exists('is_woocommerce') && is_woocommerce()) {
		if ('left_sidebar' == get_theme_mod( 'kaya_woo_sidebar', 'no_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		elseif ('right_sidebar' == get_theme_mod( 'kaya_woo_sidebar', 'no_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
		else {
			$content_class .= 'no-sidebar ';
		}
	}
	elseif(is_archive()) { // use archive sidebar
		if ('left_sidebar' == get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		elseif ('right_sidebar' == get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
		else {
			$content_class .= 'no-sidebar ';
		}
	}
	elseif(is_single() || is_search()) { // use single post sidebar
		if ('left_sidebar' == get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		elseif ('right_sidebar' == get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
		else {
			$content_class .= 'no-sidebar ';
		}
	}
	//blog home page when using a page for the home
	elseif(is_home()) {

		if(!get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true) || 'use_default' == get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true)) {
			if ('left_sidebar' == get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
				$content_class .= 'sidebar-left ';
			}
			elseif ('no_sidebar' != get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' )) {
				$content_class .= 'sidebar-right ';
			}
			else {
				$content_class .= 'no-sidebar ';
			}
		}
		else {
			$sidebar_class_temp = get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true);
			switch($sidebar_class_temp) {
				case 'left_sidebar':
					$content_class .= 'sidebar-left ';
					break;
				case 'no_sidebar':
					$content_class .= 'no-sidebar ';
					break;
				case 'right_sidebar':
					$content_class .= 'sidebar-right ';
					break;
				default:
					$content_class .= 'sidebar-right ';
					break;
			}
		}
	}
	
	//get hero area setting
	// set a default
	$page_hero_setting = false;

	// woocommerce
	if(function_exists('is_woocommerce') && (is_shop() || is_woocommerce() ) ) {
		if(get_theme_mod( 'kaya_page_hero_woocommerce', false )) {
			$content_class .= 'has-page-hero ';
			$page_hero_setting = true;
		}
	}
	//get hero area setting for pages
	elseif( is_home() || ( !is_single() && !is_archive() ) ) {
		
		if(is_home()) {
			$page_for_posts = get_option( 'page_for_posts' );
			$page_hero_setting = get_post_meta($page_for_posts, 'kaya_page_hero_setting', true);
		}
		elseif (is_page()) {
			$page_hero_setting = get_post_meta($postID, 'kaya_page_hero_setting', true);
		}
		switch ($page_hero_setting ) {
			case 'no_page_hero':
				$page_hero_setting = false;
				break;
			case 'use_default':
				$page_hero_setting = get_theme_mod( 'kaya_page_hero', false );
				break;
			case 'use_page_hero':
				$page_hero_setting = true;
				break;
			default: 
				$page_hero_setting = get_theme_mod( 'kaya_page_hero', false );
		}
		if( $page_hero_setting ) {
			$content_class .= 'has-page-hero ';
		}
	}

	// get hero area setting for single blogs
	elseif( (is_single() && 'post' == get_post_type()) ) {
		$page_hero_blog = get_theme_mod( 'kaya_page_hero_blogs', false );
		if( $page_hero_blog ) {
			$content_class .= 'has-page-hero ';
			$page_hero_setting = true;
		}
	}
	// get hero area setting for blog archives
	elseif( ('post' == get_post_type()) && is_archive() ) {
		$page_hero_blog = get_theme_mod( 'kaya_page_hero_blog_archive', false );
		if( $page_hero_blog ) {
			$content_class .= 'has-page-hero ';
			$page_hero_setting = true;
		}
	}


	// display page hero
	if(function_exists('is_woocommerce') && is_woocommerce()) {
		if($page_hero_setting) { ?>
			<header id="page-hero-area">
				<div class="container">
					<?php
					woocommerce_breadcrumb();
					if(is_shop()) {
						echo '<h1 class="page-title">Shop Our Products</h1>';
					}
					elseif(is_archive()) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}
					else {
						echo '<h1 class="page-title">' . get_the_title() . '</h1>';
					}
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
				</div>
			</header>
		<?php }
	}
	elseif(!is_single() && !is_archive()) { 
		if($page_hero_setting) { ?>
			<header id="page-hero-area">
				<div class="container">
					<?php
						if(is_page()) {
							if( get_post_meta($postID, '_kaya_hide_title_check', true) !== 'on') {
								echo '<h1>' . esc_html(get_the_title()) . '</h1>';
							}
							echo get_post_meta($postID, '_kaya_page_hero_content', true);
						}
						elseif(is_home()) {
							if(get_post_meta($page_for_posts, '_kaya_hide_title_check', true) !== 'on') {
								echo '<h1>' . esc_html(get_the_title($page_for_posts)) . '</h1>';
							}
							echo get_post_meta($page_for_posts, '_kaya_page_hero_content', true); 
						}
						elseif(is_archive()) {
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
						}
						elseif(is_404()) {
							echo '<h1>' . esc_html(get_theme_mod( 'kaya_404_title', 'Sorry, that page could not be found' )) . '</h1>';
						}
					?>
				</div>
			</header>
		<?php }
	} else { // blog: single or archive
		if($page_hero_setting) {
			?>
			<header id="page-hero-area">
				<div class="container">
					<?php 
					if(is_archive()) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
					}
					else {
						the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); 
						?>
						<p class="entry-meta">
							<?php kaya_posted_on(); ?>
						</p><!-- .entry-meta -->
						<?php
					}
					?>
				</div>
			</header>
		<?php
		}
	} ?>

	<?php 
	// if the page template is from Elementor, fix the issue that Elementor doesn't define a landmark
	if( is_page_template( array('elementor_canvas', 'elementor_header_footer', 'elementor_theme') ) ) { ?>
		<div role="main" id="content" tabindex="-1" class="<?php  echo esc_html($content_class); ?>">

	<?php } else { ?>
		<div role="region" id="content" tabindex="-1" class="<?php  echo esc_html($content_class); ?>">

	<?php }
	