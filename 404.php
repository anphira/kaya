<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.10
 */

$postID = get_queried_object_id();

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				<?php
	$page_hero_setting = get_post_meta($postID, 'kaya_page_hero_setting', true);
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
	if((get_post_meta($postID, '_kaya_hide_title_check', true) !== 'on') && (true != $page_hero_setting)) { ?>
	<header class="entry-header">
		<h1><?php echo esc_html(get_theme_mod( 'kaya_404_title', 'Sorry, we couldn\'t find that page')); ?></h1>
	</header><!-- .entry-header -->
	<?php } ?>

				<div class="page-content">
					<p><?php echo wp_kses_post( get_theme_mod( 'kaya_404_content', 'You tried to reach a page which could not be found.<br /><br />Please <a href="/">click here to visit the home page</a> or use the main menu to navigate to your desired location.' ) ); ?></p>

					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
