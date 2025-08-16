<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 2.5
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<p class="result-type">Result type: <?php echo esc_html( get_post_type_object( get_post_type() )->labels->singular_name ); ?></p>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php kaya_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php kaya_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
