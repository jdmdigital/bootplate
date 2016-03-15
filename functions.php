<?php
/**
 *            /// 
 *           (o 0)
 * ======o00o-(_)-o00o======
 * Bootplate v0.5 Main Functions
 * @link https://github.com/jdmdigital/bootplate
 * Made with love by @jdmdigital
 * =========================
 * 
 * Bootplate WordPress Theme, Copyright 2016 JDM Digital, LLC
 * Bootplate is distributed under the terms of the GNU GPL
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.

 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */
 
define('VERSION', 0.5);
define("REPO", 'https://github.com/jdmdigital/bootplate');
 
// get_wpversion()
if(!function_exists('get_wpversion')){
	function get_wpversion() {
		return get_bloginfo('version');
	}
}

if(!function_exists('bootplate_version')) {
	function bootplate_info($data = 'version') {
		$version 	= VERSION;
		$repo 		= REPO;
		$branch		= BRANCH;
		
		if($data == 'repo') {
			return $repo;
		} elseif($data == 'branch') {
			return $branch;
		} else {
			return $version;
		}
		
	}
}

if ( ! isset( $content_width ) ) {
	$content_width = 1140;
}

if ( !function_exists('bootplate_setup') ) {
	function bootplate_setup(){
		
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title. NO hard-coded <title> tag in HEAD.
		add_theme_support( 'title-tag' );
		
		//Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1140, 600 );
		add_image_size('tablet', 980, 515);
		add_image_size('mobile', 768, 404);
		
		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary' => __( 'Primary Menu' ),
			'blogcats'  => __( 'Blog Categories Menu' ),
			'footer'  => __( 'Footer Links Menu' ),
			'social'  => __( 'Social Links Menu' ),
		) );
		
		// Include Bootstrap Nav Walker
		require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

		// Switch default core markup to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'caption'
		) );
		
		// Add Quote and Link Post Format Support
		add_theme_support( 'post-formats', array(
			'quote', 'link'
		) );
		
		
		//$color_scheme  = bootplate_get_color_scheme();
		//$default_color = trim( $color_scheme[0], '#' );

		// Setup the WordPress core custom background feature.
		/*add_theme_support( 'custom-background', apply_filters( 'bootplate_custom_background_args', array(
			'default-color'      => $default_color,
			'default-attachment' => 'fixed',
		) ) );*/
		
		
		// Style the Editor to resemble the frontend
		add_editor_style( array( 'css/editor-style.css' ) );
		
		
	}// END setup function
} // END function_exists( 'bootplate_setup' )
add_action( 'after_setup_theme', 'bootplate_setup' );

/**
 * Register widget areas.
 */
function bootplate_widgets_init() {
	register_sidebar( array(
		'name'          => 'Footer Widget 1',
		'id'            => 'footer-1',
		'description'   => 'The first footer widget area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Widget 2',
		'id'            => 'footer-2',
		'description'   => 'The second footer widget area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Widget 3',
		'id'            => 'footer-3',
		'description'   => 'The third footer widget area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Footer Widget 4',
		'id'            => 'footer-4',
		'description'   => 'The fourth footer widget area.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Blog Sidebar',
		'id'            => 'blog-sidebar',
		'description'   => 'Used for sidebar for blog post listings.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => 'Page Sidebar',
		'id'            => 'page-sidebar',
		'description'   => 'Used for pages using the Page - Sidebar (left or right) template.',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	//include(get_template_directory() . '/inc/widgets.php');
	//register_widget( 'bootplate_listgroup_widget' );
	
}
add_action( 'widgets_init', 'bootplate_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bootplate_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.5' );
	
	if(file_exists(get_template_directory_uri() . '/style.min.css')) {
		wp_enqueue_style( 'bootplate', get_template_directory_uri() . '/style.min.css', array('bootstrap'), '' );
	} else {
		wp_enqueue_style( 'bootplate', get_stylesheet_uri(), array('bootstrap'), '' );
	}
	// Load the IE-specific stylesheet.
	wp_enqueue_style( 'bootplate-ie', get_template_directory_uri() . '/css/ie.css', array( 'bootplate' ), '' );
	wp_style_add_data( 'bootplate-ie', 'conditional', 'lt IE 9' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', '', '', true );
	wp_enqueue_script( 'jquery' );
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js', array('jquery'), '', true );
	wp_enqueue_script( 'bootplate-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery', 'modernizr'), '', true );
	wp_enqueue_script( 'bootplate-main', get_template_directory_uri() . '/js/main.js', array('jquery', 'modernizr', 'bootplate-plugins'), bootplate_info('version'), true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootplate_scripts' );

// Get rid of bloated styles
function jdm_deregister_styles() {
	wp_deregister_style( 'contact-form-7' );
	wp_deregister_style('shorty');
	wp_deregister_style('front-css-yuzo_related_post');
}
add_action( 'wp_print_styles', 'jdm_deregister_styles', 100 );

require get_template_directory() . '/inc/template-tags.php';

// Nicer Search - Creates a specific /search/ page instead of index.php?s=, which confuses google.
if(!function_exists('jdm_nice_search_redirect')) {
	function jdm_nice_search_redirect() {
		global $wp_rewrite;
		if ( !isset( $wp_rewrite ) || !is_object( $wp_rewrite ) || !$wp_rewrite->using_permalinks() )
			return;
	
		$search_base = $wp_rewrite->search_base;
		if ( is_search() && !is_admin() && strpos( $_SERVER['REQUEST_URI'], "/{$search_base}/" ) === false ) {
			wp_redirect( home_url( "/{$search_base}/" . urlencode( get_query_var( 's' ) ) ) );
			exit();
		}
	}
	add_action( 'template_redirect', 'jdm_nice_search_redirect' );
}


if ( ! function_exists( 'jdm_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 * based on: Twenty Fifteen 1.0
 */
function jdm_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<div class="navigation comment-navigation" role="navigation">
		<ul class="pager">
			<?php
				if ( $prev_link = get_previous_comments_link( '<span class="bp-left-open"></span>' ) ) {
					printf( '<li class="pager-prev" title="Older Comments">%s</li>', $prev_link );
				} else {
					echo '<li class="pager-prev disabled" title="Older Comments"><a><span class="bp-left-open"></span></a></li>';
				}

				if ( $next_link = get_next_comments_link( '<span class="bp-right-open"></span>' ) ) {
					printf( '<li class="pager-next" title="Newer Comments">%s</li>', $next_link );
				} else {
					echo '<li class="pager-next disabled" title="Newer Comments"><a><span class="bp-right-open"></span></a></li>';
				}
			?>
		</ul><!-- .nav-links -->
	</div><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if(!function_exists('is_comment_child')) {
	function is_comment_child( $comment_ID = 0 ) { // recursive depth check
		global $wpdb;
		$comment = get_comment( $comment_ID );
		$parent = $comment->comment_parent;
		if ( ( 0 == $parent ) || ( bootplate_comment_parent_trashed( $comment ) ) ) // must NOT use '===' because empty result, where we do not have a comment parent at all because it has been deleted, needs to evaluate as true
			return false;
		else return true ;
	}
	
	// Function: Do parents actually exist?
	function bootplate_comment_parents_exist( $comment_ID = 0 ) { // explicit check for comments with deleted parents
		global $wpdb;
		$comment = get_comment( $comment_ID );
		$parent = $comment->comment_parent;
		if ( $parent == '' ) return false;
		elseif ( bootplate_comment_parent_trashed( $comment ) ) return false;
		elseif ( 0 == $parent ) return true;
		else return bootplate_comment_parents_exist( $parent );
	}

	// Function: Is parent in the trash?
	function bootplate_comment_parent_trashed( $comment ) { // check if comment's immediate parent is in trash
		global $wpdb;
		$parent = $comment->comment_parent;
		if ( '' == $parent ) return false; // no parent, no trash
		$approval = get_comment( $parent ); // have to do this in two steps for PHP4 compatibility
		$approval = $approval->comment_approved;
		if ( $approval == 'trash' ) return true;
		else return false;
	}
	
	function bootplate_comment_classes ($col = 1) {
		if(is_comment_child(get_comment_ID())) {
			if($col == 1) {
				echo 'col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs';
			} else {
				echo 'col-md-9 col-sm-9';
			}
		} else {
			if($col == 1) {
				echo 'col-md-2 col-sm-2 hidden-xs';
			} else {
				echo 'col-md-10 col-sm-10';
			}
		}
	}
	
}

if(!function_exists('bootplate_comments')) {
	function bootplate_comments($comment, $args, $depth) {
		//$tag       = 'div';
        $add_below = 'artcomm';
		 
    ?>

	<article id="comment-<?php comment_ID(); ?>" class="row artcomm">
		<div class="<?php bootplate_comment_classes(1); ?>">
			<figure class="thumbnail">
				<?php echo get_avatar( $comment, 80 ); ?>
				<?php //printf( __( '<figcaption class="text-center">%s</figcaption>' ), get_comment_author_link() ); ?>
			</figure>
		</div>
		<div class="<?php bootplate_comment_classes(2); ?>">
			<div class="panel panel-default arrow left">
				<div class="panel-body">
					<header class="text-left">
						<div class="comment-user"><b><?php comment_author(); ?></b></div>
						<time class="comment-date" datetime="<?php printf( __('%1$s %2$s'), get_comment_date(),  get_comment_time() ); ?>"><?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></time>
					</header>
					<div class="comment-post<?php if ( $comment->comment_approved == '0' ) {echo ' in-moderation'; } ?>">
						<?php comment_text(); ?>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="text-right text-info no-margin-bottom">Your comment is awaiting moderation.</p>
					<?php else : ?>
					<!--<p class="text-right"><a href="#" class="btn btn-info btn-sm">reply</a></p>-->
					<p class="text-right no-margin-bottom"><?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => 2 ) ) ); ?>  <?php edit_comment_link( __( 'edit' ), '  ', '' ); ?></p>
					<?php endif; ?>
				</div><!--/panel-body-->
			</div><!--/.panel-default-->
		</div><!--/.col-md-10-->
	</article><!-- /.artcomm -->	

	<?php // End function
    }
}

if(!function_exists('bootplate_comments_end')) {
	function bootplate_comments_end() {
		echo '<!--bootplate_comment_end-->';
	}
}// end if !exists

/*
 * Retrieve paginated link for archive post pages BUT use Bootstrap class name.
 * Based on paginate_links() in wp-includes/general-template.php#L1988
 */
if(!function_exists('bootplate_paginate_links')) {
	function bootplate_paginate_links( $args = '' ) {
		global $wp_query, $wp_rewrite;
	
		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode( get_pagenum_link() );
		$url_parts    = explode( '?', $pagenum_link );
	
		// Get max pages and current page out of the current query, if available.
		$total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
		$current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	
		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';
	
		// URL base depends on permalink settings.
		$format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';
	
		$defaults = array(
			'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
			'format' => $format, // ?page=%#% : %#% is replaced by the page number
			'total' => $total,
			'current' => $current,
			'show_all' => false,
			'prev_next' => true,
			'prev_text' => __('&laquo; Previous'),
			'next_text' => __('Next &raquo;'),
			'end_size' => 1,
			'mid_size' => 2,
			'type' => 'plain',
			'add_args' => array(), // array of query args to add
			'add_fragment' => '',
			'before_page_number' => '',
			'after_page_number' => ''
		);
	
		$args = wp_parse_args( $args, $defaults );
	
		if ( ! is_array( $args['add_args'] ) ) {
			$args['add_args'] = array();
		}
	
		// Merge additional query vars found in the original URL into 'add_args' array.
		if ( isset( $url_parts[1] ) ) {
			// Find the format argument.
			$format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
			$format_query = isset( $format[1] ) ? $format[1] : '';
			wp_parse_str( $format_query, $format_args );
	
			// Find the query args of the requested URL.
			wp_parse_str( $url_parts[1], $url_query_args );
	
			// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
			foreach ( $format_args as $format_arg => $format_arg_value ) {
				unset( $url_query_args[ $format_arg ] );
			}
	
			$args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
		}
	
		// Who knows what else people pass in $args
		$total = (int) $args['total'];
		if ( $total < 2 ) {
			return;
		}
		$current  = (int) $args['current'];
		$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
		if ( $end_size < 1 ) {
			$end_size = 1;
		}
		$mid_size = (int) $args['mid_size'];
		if ( $mid_size < 0 ) {
			$mid_size = 2;
		}
		$add_args = $args['add_args'];
		$r = '';
		$page_links = array();
		$dots = false;
	
		if ( $args['prev_next'] && $current && 1 < $current ) :
			$link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current - 1, $link );
			if ( $add_args )
				$link = add_query_arg( $add_args, $link );
			$link .= $args['add_fragment'];
	
			/**
			 * Filter the paginated links for the given archive pages.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link The paginated link URL.
			 */
			$page_links[] = '<a class="prev page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['prev_text'] . '</a>';
		endif;
		for ( $n = 1; $n <= $total; $n++ ) :
			if ( $n == $current ) :
				$page_links[] = "<span class='page-numbers current'><span class='sr-only'>(current) </span>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
				$dots = true;
			else :
				if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
					$link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
					$link = str_replace( '%#%', $n, $link );
					if ( $add_args )
						$link = add_query_arg( $add_args, $link );
					$link .= $args['add_fragment'];
	
					/** This filter is documented in wp-includes/general-template.php */
					$page_links[] = "<a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a>";
					$dots = true;
				elseif ( $dots && ! $args['show_all'] ) :
					$page_links[] = '<span class="page-numbers dots">' . __( '&hellip;' ) . '</span>';
					$dots = false;
				endif;
			endif;
		endfor;
		if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) ) :
			$link = str_replace( '%_%', $args['format'], $args['base'] );
			$link = str_replace( '%#%', $current + 1, $link );
			if ( $add_args )
				$link = add_query_arg( $add_args, $link );
			$link .= $args['add_fragment'];
	
			/** This filter is documented in wp-includes/general-template.php */
			$page_links[] = '<a class="next page-numbers" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '">' . $args['next_text'] . '</a>';
		endif;
		switch ( $args['type'] ) {
			case 'array' :
				return $page_links;
	
			case 'list' :
				$r .= "<ul class='pagination pagination-lg'>\n\t<li>";
				$r .= join("</li>\n\t<li>", $page_links);
				$r .= "</li>\n</ul>\n";
				break;
	
			default :
				$r = join("\n", $page_links);
				break;
		}
		return $r;
	} // end bootplate_paginate_links()
}// end if !exists

// Detect and USE functions from a few subtitle plugins
/* Supports:
 * WP Subtitle (recommended) - https://wordpress.org/plugins/wp-subtitle/
 * KIA Subtitle - https://wordpress.org/plugins/kia-subtitle/
 * Secondary Title - https://wordpress.org/plugins/secondary-title/
 */
 
// Returns BOOL if a subtitle plugin is installed and active.
// Optional param $info.
// Use have_bootplate_subtitle('name') to return the name of the active plugin
// Leave blank to return a BOOL (if ANY is installed an active)
if(!function_exists('have_bootplate_subtitle')) {
	function have_bootplate_subtitle($info = ''){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if($info == 'name') {
			$subtitleplugin = '';
			if(is_plugin_active('wp-subtitle/wp-subtitle.php')) {
				$subtitleplugin = 'wp-subtitle';
			} elseif (is_plugin_active('kia-subtitle/kia-subtitle.php')) {
				$subtitleplugin = 'kia-subtitle';
			} elseif (is_plugin_active('secondary-title/secondary-title.php')) {
				$subtitleplugin = 'secondary-title';
			}
		} else {
			
			if(is_plugin_active('wp-subtitle/wp-subtitle.php')) {
				$subtitleplugin = true;
			} elseif (is_plugin_active('kia-subtitle/kia-subtitle.php')) {
				$subtitleplugin = true;
			} elseif (is_plugin_active('secondary-title/secondary-title.php')) {
				$subtitleplugin = true;
			} else {
				$subtitleplugin = false;
			}
			
		}
		
		return $subtitleplugin;
		
	}
}

// Detects the kind of subtitle plugin used, and uses their display function
/* Supports:
 * WP Subtitle (recommended) - https://wordpress.org/plugins/wp-subtitle/
 * KIA Subtitle - https://wordpress.org/plugins/kia-subtitle/
 * Secondary Title - https://wordpress.org/plugins/secondary-title/
 */
if(!function_exists('bootplate_subtitle')) {
	function bootplate_subtitle(){
		global $post;
		//$id = get_the_ID();	
		if(have_bootplate_subtitle('name') == 'wp-subtitle') {
			echo get_the_subtitle($post->ID, '<p>', '</p>', false);
		} elseif(have_bootplate_subtitle('name') == 'kia-subtitle') {
			echo '<p>'.get_the_subtitle($post->ID).'</p>';
		} elseif(have_bootplate_subtitle('name') == 'secondary-title') {
			echo get_secondary_title($post->ID, '<p>', '</p>');
		}
		
	}
}

if(!function_exists('have_bootplate_btns')) {
	function have_bootplate_btns() {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if(is_plugin_active('jdm-cta-buttons/jdm-cta-buttons.php')) {
			return true;
		} else {
			return false;
		}
	}
}

// Customize Get_Avatar Classes
if(!function_exists('change_avatar_css')) {
	function change_avatar_css($class) {
		$class = str_replace("class='avatar", "class='img-responsive img-thumbnail", $class) ;
		return $class;
	}
	add_filter('get_avatar','change_avatar_css');
}

// Add Image Class(es) - EX: .img-rounded or .img-circle
if(!function_exists('add_image_class')) {
	function add_image_class($class){
		$class .= ' img-responsive img-fluid';
		return $class;
	}
	add_filter('get_image_tag_class','add_image_class');
}

// Echos the result type
// Used in serps (I think) - BROKEN
if(!function_exists('result_type')) {
	function result_type() {
		global $post, $page;
		if(is_page()) {
			echo 'Page';
		} elseif (is_single()) {
			$format = get_post_format();
			if(!$format){
				echo 'Post';
			} else {
				echo ucfirst($format);
			}
		} else {
			echo 'Media';
		}
	}
}

//require get_template_directory() . '/inc/customizer.php';

require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/custom_subtitles.php';

// add a favicon to front-end head 
/*function site_favicons() {
	echo '
	<link rel="Shortcut Icon" type="image/x-icon" href="'.get_template_directory_uri().'/img/favicon.ico" />
	';
}
add_action('wp_head', 'site_favicons');*/

// add a different favicon for the admin site
/*function admin_favicon() {
	echo '
	<!-- favicons here-->
	';
}
add_action('admin_head', 'admin_favicons');*/

// Remove WP Links in Admin
if(!function_exists('jdm_remove_wp_admin_links')){
	function jdm_remove_wp_admin_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('about');
		$wp_admin_bar->remove_menu('wporg');
		$wp_admin_bar->remove_menu('documentation');
		$wp_admin_bar->remove_menu('support-forums');
		$wp_admin_bar->remove_menu('feedback');
		//$wp_admin_bar->remove_menu('view-site');
	}
	add_action( 'wp_before_admin_bar_render', 'jdm_remove_wp_admin_links' );
}

// Remove WP Icon from Admin Bar
if(!function_exists('jdm_remove_wp_logo_adminbar')){
	function jdm_remove_wp_logo_adminbar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
	}
	 
	add_action( 'wp_before_admin_bar_render', 'jdm_remove_wp_logo_adminbar' );
}

// Change "Howdy, Admin" because it's lame
if(!function_exists('jdm_no_wp_howdy')) {
	function jdm_no_wp_howdy( $wp_admin_bar ) {
		$user_id = get_current_user_id();
		$current_user = wp_get_current_user();
		$profile_url = get_edit_profile_url( $user_id );
	 
		if ( 0 != $user_id ) {
			/* Add the "My Account" menu */
			$avatar = get_avatar( $user_id, 28 );
			$howdy = sprintf( '%1$s', $current_user->display_name );
			$class = empty( $avatar ) ? '' : 'with-avatar';
		 
			$wp_admin_bar->add_menu( array(
				'id' => 'my-account',
				'parent' => 'top-secondary',
				'title' => $howdy . $avatar,
				'href' => $profile_url,
				'meta' => array(
				'class' => $class,
				),
			) );
		}
	}
	add_action( 'admin_bar_menu', 'jdm_no_wp_howdy', 11 );
}

// customize admin footer text
function custom_admin_footer() {
	echo '<a href="'.bootplate_info('repo').'" target="_blank" rel="nofollow">Bootplate v'.bootplate_info('version').'</a>, by <a href="http://jdmdigital.co" target="_blank">JDM Digital</a>. Using <a href="http://wordpress.org" target="_blank">WordPress'. ' v'. get_wpversion().'</a>';
} 
add_filter('admin_footer_text', 'custom_admin_footer');

// define bootstrap_credits callback 
if(!function_exists('action_bootplate_credits')) {
	function action_bootplate_credits(  ) { 
		echo '
		<div id="bootplate-credit">
			<div class="container text-center">
				<p><small>Made with <span class="sr-only">love</span><a href="http://jdmdigital.co" target="_blank" rel="nofollow"><span class="bp-heart"></span></a> and <a href="'.bootplate_info('repo').'" target="_blank" rel="nofollow">Bootplate v'.bootplate_info('version').'</a></small></p>
			</div>
		</div><!--/#bootplate-credit-->
		';
	}; 
	add_action( 'bootplate_credits', 'action_bootplate_credits', 10, 0 ); 
}

remove_action('wp_head', 'wp_generator');


