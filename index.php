<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.5.1
 */

get_header(); ?>

	<?php 
	//get sidebar setting
	$sidebar_setting = get_post_meta( get_option( 'page_for_posts' ), 'kaya_sidebar_setting', true);
	
	switch ($sidebar_setting ) {
		case 'left_sidebar':
		case 'no_sidebar':
		case 'right_sidebar':
			break;
		case 'use_default':
			$sidebar_setting = get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' );
			break;
		default: 
			$sidebar_setting = get_theme_mod( 'kaya_archive_sidebar', 'right_sidebar' );
	}

	if ('left_sidebar' == $sidebar_setting) {
		get_sidebar(); 
	}

	$has_sidebar = '';
	if( ($sidebar_setting !== 'no_sidebar') ) {
		$has_sidebar = 'has-sidebar';
	}
	?>
	<div id="primary" class="content-area <?php echo esc_html($has_sidebar); ?>">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : 
				?>

				<?php
				$page_hero_blog = get_theme_mod( 'kaya_page_hero_blog_archive', false );
				if( ! $page_hero_blog ) { ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
				<?php } ?>

				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			echo '<nav class="paged-links clear">';
			echo paginate_links();
			echo '</nav>';

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; 
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php 
	if ('right_sidebar' == $sidebar_setting) {
		get_sidebar();
	}
	?>

<?php
get_footer();
