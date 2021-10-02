<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.0
 */

get_header(); ?>

	<?php if (get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' ) == 'left_sidebar') get_sidebar(); ?>
	<div id="primary" class="content-area <?php if( get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' ) !== 'no_sidebar' ) echo 'has-sidebar'; ?>">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'kaya' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if (get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' ) == 'right_sidebar') get_sidebar(); ?>

<?php
get_sidebar();
get_footer();
