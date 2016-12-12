<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kaya
 */

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php if ( (get_post_type() == 'post' || is_home()) && is_active_sidebar( 'posts-sidebar' ) ) {
		dynamic_sidebar( 'posts-sidebar' );
	} ?>
	<?php if ( get_post_type() == 'page' && is_active_sidebar( 'pages-sidebar' ) ) {
		dynamic_sidebar( 'pages-sidebar' );
	} ?>
</aside><!-- #secondary -->
