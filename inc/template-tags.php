<?php
/**
 * Custom template tags for this theme.
 *
 * @package Blue_Planet
 */
if ( ! function_exists( 'blue_planet_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function blue_planet_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link comments">';
		comments_popup_link( esc_html__( '0 comment', 'blue-planet' ), esc_html__( '1 Comment', 'blue-planet' ), esc_html__( '% Comments', 'blue-planet' ) );
		echo '</span>';
	}

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 */
function blue_planet_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so blue_planet_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so blue_planet_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in blue_planet_categorized_blog.
 */
function blue_planet_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
}
add_action( 'edit_category', 'blue_planet_category_transient_flusher' );
add_action( 'save_post',     'blue_planet_category_transient_flusher' );

if ( ! function_exists( 'blue_planet_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function blue_planet_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'blue-planet' ) );
		if ( $categories_list && blue_planet_categorized_blog() ) {
			printf( '<span class="cat-links">%s</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'blue-planet' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">%s</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'blue-planet' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;
