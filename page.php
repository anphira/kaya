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
 * @version 0.5
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
		$sidebar_setting = get_theme_mod( 'kaya_page_sidebar' );
		break;
	default: 
		$sidebar_setting = get_theme_mod( 'kaya_page_sidebar' );
}


	if ($sidebar_setting == 'left_sidebar') get_sidebar(); ?>

	<div id="primary" class="content-area <?php 
		if( ($sidebar_setting !== 'no_sidebar') ) {
				echo 'has-sidebar';
		} ?>">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( (get_theme_mod( 'kaya_page_comments' ) == 'on' ) && (comments_open() || get_comments_number() )) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php if ($sidebar_setting == 'right_sidebar') get_sidebar(); ?>
<?php get_footer();