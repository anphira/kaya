<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 1.0.1
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	$page_hero_setting = get_post_meta($post->ID, 'kaya_page_hero_setting', true);
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
	if( (!get_theme_mod('kaya_page_hide_heading_1', 0)) && 
		(get_post_meta($post->ID, '_kaya_hide_title_check', true) !== 'on') && (true != $page_hero_setting)) { ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	<?php } ?>

	<div class="entry-content">
		<?php
			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kaya' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'kaya' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
