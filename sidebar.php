<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.9.1
 */

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php 
	if(is_active_sidebar('everywhere-top-sidebar')) {
		dynamic_sidebar('everywhere-top-sidebar');
	}
	if ( is_single() ) {
		if( is_active_sidebar( 'single-post-sidebar' ) ) {
			dynamic_sidebar( 'single-post-sidebar' );
		}
	} 
	elseif ( (get_post_type() == 'post' || is_home()) && is_active_sidebar( 'posts-sidebar' ) ) {
		dynamic_sidebar( 'posts-sidebar' );
	} 
	elseif ( get_post_type() == 'page' && is_active_sidebar( 'pages-sidebar' ) ) {
		dynamic_sidebar( 'pages-sidebar' );
	}
	if(is_active_sidebar('everywhere-bottom-sidebar')) {
		dynamic_sidebar('everywhere-bottom-sidebar');
	} ?>
</aside><!-- #secondary -->
