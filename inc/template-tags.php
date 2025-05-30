<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @author  Anphira
 * @since   0.1
 * @package Kaya
 * @version 2.4
 */

if ( ! function_exists( 'kaya_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function kaya_posted_on() {

	// only display meta info if not hidden by option in theme customizer
	if( !get_theme_mod( 'kaya_post_hide_meta_info', false) ) {
	
		$time_string = '<time class="entry-date published" datetime="%1$s">' . get_the_date( '' ) . '</time>';
		$updated_on = '';

		if ( get_theme_mod( 'kaya_post_use_last_updated_date', false ) && get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$updated_string = '<time class="post-last-modified-td" itemprop="dateModified" datetime="' . get_the_modified_date( '' ) . '">' . get_the_modified_date( '' ) . '</time>';
			$updated_on = sprintf(
				/* translators: %s: post date. */
				esc_html_x( ', updated on %s', 'updated date', 'kaya' ), $updated_string);
		}
		$time_string = sprintf( $time_string,
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( 'Posted on %s', 'post date', 'kaya' ), $time_string);

		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s.', 'post author', 'kaya' ),
			'<span itemprop="author" class="author vcard">' . esc_html( get_the_author() ) . '</span>');

		// show reading time if the option has been selected in theme customizer
		if( get_theme_mod( 'kaya_post_show_reading_time', false ) ) {
			echo '<span>' . $posted_on . '</span>' . $updated_on . '<span class="byline"> ' . $byline . '</span><br><span class="reading-time">Reading time ';
			do_action('kaya_reading_time');
			echo ' minutes.</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		else {
			echo '<span>' . $posted_on . '</span>' . $updated_on . '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

}
endif;

if ( ! function_exists( 'kaya_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function kaya_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'kaya' ) );
		if ( $categories_list && kaya_categorized_blog() ) {
			/* translators: 1: list of categories. */
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'kaya' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'kaya' ) );
		if ( $tags_list ) {
			/* translators: 1: list of tags. */
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'kaya' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kaya' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'kaya' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function kaya_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'kaya_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'kaya_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so kaya_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so kaya_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in kaya_categorized_blog.
 */
function kaya_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'kaya_categories' );
}
add_action( 'edit_category', 'kaya_category_transient_flusher' );
add_action( 'save_post',     'kaya_category_transient_flusher' );
