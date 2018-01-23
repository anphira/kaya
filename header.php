<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.6.6
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php echo get_post_meta($post->ID, '_kaya_google_experiments_code', true); ?>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php if(get_theme_mod( 'kaya_add_to_head' ) !== '')
	echo htmlspecialchars_decode(get_theme_mod( 'kaya_add_to_head' ));
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if(get_theme_mod( 'kaya_add_to_body_top' ) !== '')
	echo htmlspecialchars_decode(get_theme_mod( 'kaya_add_to_body_top' ));
?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaya' ); ?></a>

	<?php if( get_post_meta($post->ID, '_kaya_hide_header_check', true) == '') { ?>
	<header id="masthead" class="site-header <?php if(get_theme_mod( 'kaya_transparent_header' ) == true ) echo 'transparent-header'; ?>" role="banner">
		<?php if(get_theme_mod( 'kaya_top_header' ) == true) { ?>
			<div class="top-header">
				<div class="container">
					<div class="columns-6">
						<?php dynamic_sidebar('top-header-1'); ?>
					</div>
					<div class="columns-6 last">
						<?php dynamic_sidebar('top-header-2'); ?>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		<?php } ?>
		<div class="container">
			<?php 
			switch(get_theme_mod( 'kaya_header_columns' )) {
				case 'one_column': 
					echo '<div class="columns-12 last">';
						kaya_logo_display();
					echo '</div>';
					break;
				case 'two_column': 
					echo '<div class="columns-6">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="columns-6 last">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				case 'three_column': 
					echo '<div class="columns-4">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="columns-4">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="columns-4 last">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					break;
				case 'four_column': 
					echo '<div class="columns-3">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="columns-3">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="columns-3">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					echo '<div class="columns-3 last">';
						dynamic_sidebar('Header-4');
					echo '</div>';
					break;
				case 'logo_menu':
					echo '<div class="columns-3">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="columns-9 last">';
						dynamic_sidebar('Header-2');
						echo '<nav id="site-navigation" class="main-navigation" role="navigation">';
						if(get_theme_mod( 'kaya_hide_mobile_button_menu' ) == false) {
							?><button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button><?php
						}
						wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); 
						echo '</nav>';
					echo '</div>';
					break;
				case 'logo_left_right_content':
					echo '<div class="columns-3">';
						kaya_logo_display();
					echo '</div>';
					echo '<div class="columns-9 last">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				default: 
					echo '<div class="columns-12 last">';
						kaya_logo_display();
					echo '</div>';
					break;
			} ?>
			
		</div><!-- .container -->

		<?php if(get_theme_mod( 'kaya_header_columns' ) !== 'logo_menu') { ?>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<?php if(get_theme_mod( 'kaya_hide_mobile_button_menu' ) == false) { ?>
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button>
				<?php } ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div> <!-- .container -->
		</nav><!-- #site-navigation -->
		<?php } ?>
	</header><!-- #masthead -->
	<?php } ?>


	<?php 
	/* Determine content classes */
	$content_class = 'site-content ';
	if(!is_search() && get_post_meta($post->ID, '_kaya_full_width_check', true) == 'on')  {
		$content_class .= 'full-width ';
	} else {
		$content_class .= 'normal-width ';
	}
	if(is_page()) {
		if(!get_post_meta($post->ID, '_kaya_sidebar_setting', true) || 'use_default' == get_post_meta($post->ID, '_kaya_sidebar_setting', true) ) {
			if (get_theme_mod( 'kaya_page_sidebar' ) == 'left_sidebar') 
				$content_class .= 'sidebar-left ';
			if (get_theme_mod( 'kaya_page_sidebar' ) == 'right_sidebar') 
				$content_class .= 'sidebar-right ';
		}
		else {
			$sidebar_class_temp = get_post_meta($post->ID, '_kaya_sidebar_setting', true);
			switch($sidebar_class_temp) {
				case 'left_sidebar':
					$content_class .= 'sidebar-left ';
					break;
				case 'no_sidebar':
					break;
				case 'right_sidebar':
					$content_class .= 'sidebar-right ';
					break;
				default:
					break;
			}
		}
	}
	else { // use post sidebar
		if ('left_sidebar' == get_theme_mod( 'kaya_post_sidebar' )) {
			$content_class .= 'sidebar-left ';
		}
		if ('right_sidebar' == get_theme_mod( 'kaya_post_sidebar' )) {
			$content_class .= 'sidebar-right ';
		}
	}
	

	//get page hero area setting
	$page_hero_setting = get_post_meta($post->ID, 'kaya_page_hero_setting', true);
	switch ($page_hero_setting ) {
		case 'no_page_hero':
			$page_hero_setting = false;
			break;
		case 'use_default':
			$page_hero_setting = get_theme_mod( 'kaya_page_hero' );
			break;
		case 'use_page_hero':
			$page_hero_setting = true;
			break;
		default: 
			$page_hero_setting = get_theme_mod( 'kaya_page_hero' );
	}
	if($page_hero_setting) {
		$content_class .= 'has-page-hero ';
	}

	if($page_hero_setting && !is_single()) { ?>
	<div id="page-hero-area">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<?php
				if(is_page()) {
					echo get_post_meta($post->ID, '_kaya_page_hero_content', true); 
				}
				elseif(is_home()) {
					echo get_post_meta(get_option( 'page_for_posts' ), '_kaya_page_hero_content', true); 
				}
			?>
		</div>
	</div>
	<?php } ?>

	<div id="content" class="<?php  echo $content_class; ?>">
