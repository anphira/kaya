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
 * @package Kaya
 */

get_header(); ?>

<?php 
		$values = get_post_custom( $post->ID );
		$var = $values['kaya_sidebar_setting'][0];
?>

<?php if ((get_theme_mod( 'kaya_page_sidebar' ) == 'left_sidebar') && ($var !== 'no_sidebar')) get_sidebar(); ?>

	<div id="primary" class="content-area <?php 
		if ( $var !== 'no_sidebar') {
			if( (get_theme_mod( 'kaya_page_sidebar' ) !== 'no_sidebar') ) {
				echo 'has-sidebar';
			}
		} ?>">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->


<?php if ((get_theme_mod( 'kaya_page_sidebar' ) == 'right_sidebar') && ($var !== 'no_sidebar')) get_sidebar(); ?>
<?php get_footer();