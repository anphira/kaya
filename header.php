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

<!-- Load Customizer CSS settings -->
<style>

body, p, button, input, select, textarea {
	color: <?php echo get_theme_mod( 'kaya_text_color' ) ?>;
}
h1, h2, h3, h4, h5, h6 {
	color: <?php echo get_theme_mod( 'kaya_heading_color' ) ?>;
}
body a, body a:visited {
	color: <?php echo get_theme_mod( 'kaya_link_color' ) ?>;
}
body a:hover, body a:focus, body a:active {
	color: <?php echo get_theme_mod( 'kaya_link_hover_color' ) ?>;
}
#masthead {
	background: <?php echo get_theme_mod( 'kaya_header_background_color' ) ?>;
}
#colophon {
	background: <?php echo get_theme_mod( 'kaya_footer_background_color' ) ?>;
}
#colophon .site-info {
	background: <?php echo get_theme_mod( 'kaya_lower_footer_background_color' ) ?>;
}
nav {
	background: <?php echo get_theme_mod( 'kaya_menu_background_color' ) ?>;
}

<?php 
$kaya_grid_width = get_theme_mod( 'kaya_grid_width' ); 
$kaya_grid_width = ($kaya_grid_width > 320) ? $kaya_grid_width : 1640;
?>
<?php if(get_theme_mod( 'kaya_content_in_grid' ) == true) { ?>
	#content {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
<?php if(get_theme_mod( 'kaya_header_in_grid' ) == true) { ?>
	#masthead .container, nav .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
<?php if(get_theme_mod( 'kaya_footer_in_grid' ) == true) { ?>
	#colophon .container {
		max-width: <?php echo $kaya_grid_width; ?>px;
		margin: auto;
	}
<?php } ?>
.vc_row.vc_row-fluid, .footer-columns.container {
	max-width: <?php echo $kaya_grid_width; ?>px;
}



</style>
<!-- End Load Customizer CSS settings -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'kaya' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="container">
			<?php 
			switch(get_theme_mod( 'kaya_header_columns' )) {
				case 'one_column': 
					echo '<div class="footer-one-column">';
						echo '<div class="site-branding">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</div><!-- .site-branding -->';
					echo '</div>';
					break;
				case 'two_column': 
					echo '<div class="footer-two-column">';
						echo '<div class="site-branding">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</div><!-- .site-branding -->';
					echo '</div>';
					echo '<div class="footer-two-column">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					break;
				case 'three_column': 
					echo '<div class="footer-three-column">';
						echo '<div class="site-branding">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</div><!-- .site-branding -->';
					echo '</div>';
					echo '<div class="footer-three-column">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="footer-three-column">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					break;
				case 'four_column': 
					echo '<div class="footer-four-column">';
						echo '<div class="site-branding">';
							if ( get_theme_mod( 'kaya_logo' ) ) :
								echo '<img src="', esc_url(get_theme_mod( 'kaya_logo' )), '" alt="' , esc_attr( get_bloginfo( 'name', 'display' ) ) , '" >';
							else :
								echo '<h1 class="site-title">' , bloginfo( 'name' ) , '</h1>';
							endif;
						echo '</div><!-- .site-branding -->';
					echo '</div>';
					echo '<div class="footer-four-column">';
						dynamic_sidebar('Header-2');
					echo '</div>';
					echo '<div class="footer-four-column">';
						dynamic_sidebar('Header-3');
					echo '</div>';
					echo '<div class="footer-four-column">';
						dynamic_sidebar('Header-4');
					echo '</div>';
					break;
			} ?>
			
		</div><!-- .container -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'kaya' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div> <!-- .container -->
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content <?php if(get_post_meta($post->ID, '_kaya_full_width_check', true) == 'on') echo 'full-width'; else echo 'normal-width'; ?>">
