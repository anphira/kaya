<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 0.7.11
 */

?>

<article itemscope itemtype="http://schema.org/Article" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
		<?php
		$kaya_single_hide = get_theme_mod( 'kaya_post_hide_single_featured_image', 0 );
		$kaya_archive_hide = get_theme_mod( 'kaya_post_hide_archive_featured_image', 0 );
		if( is_single() && ! $kaya_single_hide ) {
			the_post_thumbnail();
		}
		elseif( ( is_archive() || is_home() ) && ! $kaya_archive_hide  ) {
			the_post_thumbnail();
		}
		
		if ( is_single() ) {
			$page_hero_blog = get_theme_mod( 'kaya_page_hero_blogs', false );
			if(!$page_hero_blog) {
				the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' );
			}
		}
		else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php kaya_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if(!is_single() && get_theme_mod( 'kaya_blog_excerpt', '' ) != '') {
			the_excerpt( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kaya' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}
		else {
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'kaya' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		}

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kaya' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php kaya_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
