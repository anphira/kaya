<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kaya
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">



<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaya' ); ?></a>

	<header id="masthead" class="site-header <?php if(get_theme_mod( 'kaya_sticky_header' ) == true ) echo 'sticky-header'; ?>" role="banner">
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
						echo '<div class="site-branding"><a href="',  esc_url( home_url() )  , '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</a></div><!-- .site-branding -->';
					echo '</div>';
					break;
				case 'two_column': 
					echo '<div class="columns-6">';
						echo '<div class="site-branding"><a href="', esc_url( home_url() ) , '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</a></div><!-- .site-branding -->';
					echo '</div>';
					echo '<div class="columns-6 last">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				case 'three_column': 
					echo '<div class="columns-4">';
						echo '<div class="site-branding"><a href="' . esc_url( home_url() ) . '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif; 
						echo '</a></div><!-- .site-branding -->';
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
						echo '<div class="site-branding"><a href="', esc_url( home_url() ) , '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</a></div><!-- .site-branding -->';
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
						echo '<div class="site-branding"><a href="', esc_url( home_url() ) , '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</a></div><!-- .site-branding -->';
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
						echo '<div class="site-branding"><a href="', esc_url( home_url() ) , '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</a></div><!-- .site-branding -->';
					echo '</div>';
					echo '<div class="columns-9 last">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				default: 
					echo '<div class="columns-12 last">';
						echo '<div class="site-branding"><a href="',  esc_url( home_url() )  , '">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</a></div><!-- .site-branding -->';
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

	<div id="content" class="site-content <?php if(get_post_meta($post->ID, '_kaya_full_width_check', true) == 'on') echo 'full-width'; else echo 'normal-width'; ?>">
