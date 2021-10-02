<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.0
 */

get_header(); 


?>



<?php 
//get sidebar setting
$sidebar_setting = get_post_meta($post->ID, 'kaya_sidebar_setting', true);
switch ($sidebar_setting ) {
	case 'left_sidebar':
	case 'no_sidebar':
	case 'right_sidebar':
		break;
	case 'use_default':
		$sidebar_setting = get_theme_mod( 'kaya_page_sidebar', 'right_sidebar' );
		break;
	default: 
		$sidebar_setting = get_theme_mod( 'kaya_page_sidebar', 'right_sidebar' );
}


	if ('left_sidebar' == $sidebar_setting) {
		get_sidebar(); 
	}

	$has_sidebar = '';
	if( ($sidebar_setting !== 'no_sidebar') ) {
		$has_sidebar = 'has-sidebar';
	}
	?>

	<div id="primary" class="content-area <?php echo $has_sidebar; ?>">
		<main id="main" class="site-main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				$comments_value = get_theme_mod( 'kaya_page_comments', 'off' );
				if ( ( 'on' == $comments_value ) && (comments_open() || get_comments_number() )) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php 
if ('right_sidebar' == $sidebar_setting) {
	get_sidebar();
}
get_footer();