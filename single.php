<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 2.0
 */

get_header(); ?>

	<?php if ('left_sidebar' == get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' )) get_sidebar(); ?>
	<div id="primary" class="content-area <?php if( get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' ) !== 'no_sidebar' ) echo 'has-sidebar'; ?>">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			$comment_setting = get_theme_mod( 'kaya_post_comments', 'off' );
			if ( ( 'on' == $comment_setting ) && (comments_open() || get_comments_number() )) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	<?php if ('right_sidebar' == get_theme_mod( 'kaya_post_sidebar', 'right_sidebar' )) get_sidebar(); ?>

	<?php if(get_theme_mod( 'kaya_show_related_posts', false)) : ?>
	<div id="related-posts" class="clear mb50">
		<h2>Related Articles</h2>
		<?php 
		$terms = get_the_terms( get_the_ID(), 'category' );
		if( empty( $terms ) ) $terms = array();
		$term_list = wp_list_pluck( $terms, 'slug' );

		$related_args = array(
			'post_type' => 'post',
			'post_status' => 'publish',
			'posts_per_page' => 3,
			'post__not_in' => array( get_the_ID() ),
			'tax_query' => array(
				array(
					'taxonomy' => 'category',
					'field' => 'slug',
					'terms' => $term_list
				)
			)
		);
		$related = new WP_Query( $related_args );

		$counter = 0;

		if( $related->have_posts() ) :
				
			while( $related->have_posts() ): $related->the_post(); ?>

				<div class="kaya-columns-4 <?php if(2 == $counter) { echo 'last'; } ?>">
					<?php the_post_thumbnail( 'related-posts-image' ); ?>
					<div class="max-height-related-posts mt15">
						<h3 class="mb0"><?php the_title(); ?></h3>
						<?php kaya_the_excerpt(); ?>
					</div>
					<?php if(!get_theme_mod('kaya_turn_off_read_more', false)) { ?>
						<a class="button mt20" href="<?php the_permalink(); ?>">Read more<span class="screen-reader-text"> <?php echo get_the_title(); ?></span></a>
					<?php } ?>
					
				</div>
				
				<?php 
				$counter++;
			endwhile;
		endif;
		wp_reset_postdata();
		?>
	</div>
	<?php endif; ?>

<?php
get_footer();
