<?php
/**
 * Custom template tags for Bootplate
 */

/* 	
 *	Returns the Bootstrap class names for the widget columns in the footer based on how many are actually active.
 *	Returns empty string '' if no dynamic sidebars are active.
 */
if(!function_exists('get_bootplate_widget_footer_cols')) {
	function get_bootplate_widget_footer_cols() {
		$got1 = is_active_sidebar('footer-1');
		$got2 = is_active_sidebar('footer-2');
		$got3 = is_active_sidebar('footer-3');
		$got4 = is_active_sidebar('footer-4');
		if($got1 || $got2 || $got3 || $got4) {
			$gotsome = true;
		} else {
			$gotsome = false;
		}
		if($got1 && $got2 && $got3 && $got4) {
			$gotall = true;
		} else {
			$gotall = false;
		}
		
		if($gotall) {
			$classes = 'col-sm-6 col-lg-3';
		} elseif(($got1 && $got2 && !$got3 && !$got4) || (!$got1 && !$got2 && $got3 && $got4)) {
			$classes = 'col-sm-6';
		} elseif(($got1 && $got2 && $got3) && !$got4) {
			$classes = 'col-sm-4';
		} elseif ($got1 && $got2 && $got3 && $got4) {
			$classes = 'col-sm-6 col-lg-3';
		} else {
			$classes = 'col-md-12';
		}
		
		if($gotsome) {
			return $classes;
		} else {
			return '';
		}
	}
}


if ( ! function_exists( 'bootplate_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 */
function bootplate_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<ul class="pager comment-navigation" role="navigation">
		<?php
			if ( $prev_link = get_previous_comments_link( 'Older Comments' ) ) :
				printf( '<div class="pager-prev">%s</div>', $prev_link );
			endif;
			if ( $next_link = get_next_comments_link( 'Newer Comments' ) ) :
				printf( '<div class="pager-next">%s</div>', $next_link );
			endif;
		?>
	</ul><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if ( ! function_exists( 'bootplate_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the categories, tags.
 */
function bootplate_entry_meta() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		printf( '<span class="sticky-post">%s</span>', 'Featured' );
	}

	$format = get_post_format();
	if ( current_theme_supports( 'post-formats', $format ) ) {
		printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
			sprintf( '<span class="screen-reader-text">%s </span>', 'Format', 'Used before post format.' ),
			esc_url( get_post_format_link( $format ) ),
			get_post_format_string( $format )
		);
	}

	if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			get_the_date(),
			esc_attr( get_the_modified_date( 'c' ) ),
			get_the_modified_date()
		);

		printf( '<span class="posted-on"><span class="screen-reader-text">%1$s </span><a href="%2$s" rel="bookmark">%3$s</a></span>',
			'Posted on', 'Used before publish date.',
			esc_url( get_permalink() ),
			$time_string
		);
	}

	if ( 'post' == get_post_type() ) {
		if ( is_singular() || is_multi_author() ) {
			printf( '<span class="byline"><span class="author vcard"><span class="screen-reader-text">%1$s </span><a class="url fn n" href="%2$s">%3$s</a></span></span>',
				'Author', 'Used before post author name.',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				get_the_author()
			);
		}

		$categories_list = get_the_category_list( ', ', 'Used between list items, there is a space after the comma.' );
		if ( $categories_list && bootplate_categorized_blog() ) {
			printf( '<span class="cat-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				'Categories', 'Used before category names.',
				$categories_list
			);
		}

		$tags_list = get_the_tag_list( '', ', ', 'Used between list items, there is a space after the comma.');
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class="screen-reader-text">%1$s </span>%2$s</span>',
				'Tags', 'Used before tag names.',
				$tags_list
			);
		}
	}

	if ( is_attachment() && wp_attachment_is_image() ) {
		// Retrieve attachment metadata.
		$metadata = wp_get_attachment_metadata();

		printf( '<span class="full-size-link"><span class="screen-reader-text">%1$s </span><a href="%2$s">%3$s &times; %4$s</a></span>',
			'Full size', 'Used before full size attachment link.',
			esc_url( wp_get_attachment_url() ),
			$metadata['width'],
			$metadata['height']
		);
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf('Leave a comment<span class="screen-reader-text"> on %s</span>', get_the_title() ) );
		echo '</span>';
	}
}
endif;

/**
 * Determine whether blog/site has more than one category.
 *
 * @return bool True if there is more than one category, false otherwise.
 */
function bootplate_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'bootplate_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'bootplate_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so bootplate_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so bootplate_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in {@see bootplate_categorized_blog()}.
 */
function bootplate_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'bootplate_categories' );
}
add_action( 'edit_category', 'bootplate_category_transient_flusher' );
add_action( 'save_post',     'bootplate_category_transient_flusher' );

if ( ! function_exists( 'bootplate_post_thumbnail' ) ) :
/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index views, or a div
 * element when on single views.
 */
function bootplate_post_thumbnail() {
	if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<div class="post-thumbnail">
		<?php the_post_thumbnail(); ?>
	</div><!-- .post-thumbnail -->

	<?php else : ?>

	<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
		<?php
			the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
		?>
	</a>

	<?php endif; // End is_singular()
}
endif;

if ( ! function_exists( 'bootplate_get_link_url' ) ) :
/**
 * Return the post URL.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @see get_url_in_content()
 *
 * @return string The Link format URL.
 */
function bootplate_get_link_url() {
	$has_url = get_url_in_content( get_the_content() );

	return $has_url ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}
endif;

if ( ! function_exists( 'bootplate_excerpt_more' ) && ! is_admin() ) {
/**
 * Replace "[...]" (appended to automatically generated excerpts) with ... and a 'Continue reading' link.
 * @return string 'more' link prepended with an ellipsis.
 */
function bootplate_excerpt_more( $more ) {
	$link = sprintf( '<a href="%1$s" class="more-link">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( 'more %s', '<span class="sr-only screen-reader-text">' . get_the_title( get_the_ID() ) . '</span>' )
		);
	return '&hellip; ' . $link;
}
add_filter( 'excerpt_more', 'bootplate_excerpt_more' );

}

/* Restrict Excerpt Length (set to 55)
 * @since v1.6
 * See: https://github.com/jdmdigital/bootplate/issues/89
 */
if(!function_exists('bootplate_excerpt_length')) {
	function bootplate_excerpt_length( $length ) {
		return 55;
	}
	add_filter( 'excerpt_length', 'bootplate_excerpt_length', 999 );
}
