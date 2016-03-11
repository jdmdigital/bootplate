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
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
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
				if(is_mobile()) {
					// mobile version
					if ( $prev_link = get_previous_comments_link( 'Older' ) ) {
						printf( '<li class="pager-prev">%s</li>', $prev_link );
					} else {
						echo '<li class="pager-prev disabled"><a>Older</a></li>';
					}
	
					if ( $next_link = get_next_comments_link( 'Newer' ) ) {
						printf( '<li class="pager-next">%s</li>', $next_link );
					} else {
						echo '<li class="pager-next disabled"><a>Newer</a></li>';
					}
				} else {
					// tablet and desktop version
					if ( $prev_link = get_previous_comments_link( 'Older Comments' ) ) {
						printf( '<li class="pager-prev">%s</li>', $prev_link );
					} else {
						echo '<li class="pager-prev disabled"><a>Older Comments</a></li>';
					}
	
					if ( $next_link = get_next_comments_link( 'Newer Comments' ) ) {
						printf( '<li class="pager-next">%s</li>', $next_link );
					} else {
						echo '<li class="pager-next disabled"><a>Newer Comments</a></li>';
					}
				}
				
				
			?>
		</ul><!-- .nav-links -->
	</div><!-- .comment-navigation -->
	<?php
	endif;
}
endif;

if(!function_exists('bootplate_comments')) {
	function bootplate_comments($comment, $args, $depth) {
    	$commentUnicorn = false;
		//$tag       = 'div';
        $add_below = 'comment';
		 
    ?>
	<article id="comment-<?php comment_ID() ?>" class="row">
		<div class="col-md-2 col-sm-2 hidden-xs">
			<figure class="thumbnail">
				<?php echo get_avatar( $comment, 400 ); ?>
				<?php printf( __( '<figcaption class="text-center">%s</figcaption>' ), get_comment_author_link() ); ?>
			</figure>
		</div>
		<div class="col-md-10 col-sm-10">
			<div class="panel panel-default arrow left">
				<div class="panel-body">
					<header class="text-left">
						<div class="comment-user"><i class="bp-github"></i> <?php comment_author(); ?></div>
						<time class="comment-date" datetime="<?php printf( __('%1$s %2$s'), get_comment_date(),  get_comment_time() ); ?>"><i class="bp-info"></i> <?php printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></time>
					</header>
					<div class="comment-post<?php if ( $comment->comment_approved == '0' ) {echo ' in-moderation'; } ?>">
						<?php comment_text(); ?>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="text-right">Your comment is awaiting moderation.</p>
					<?php else : ?>
					<!--<p class="text-right"><a href="#" class="btn btn-info btn-sm">reply</a></p>-->
					<p class="text-right"><?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => 2 ) ) ); ?>  <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>" class="btn btn-info btn-sm"><?php edit_comment_link( __( 'Edit' ), '  ', '' ); ?></a></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</article>
	
	
	<?php if($commentUnicorn) : 
		// Just removing this for now. $unicorn is ALWAYS false
	?>
    <div <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 400 ); ?>
			<?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?>
		</div>
    
		<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br />
    	<?php endif; ?>

    	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        	<?php
        	/* translators: 1: date, 2: time */
        	printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a>
			
			<?php edit_comment_link( __( '(Edit)' ), '  ', '' );
        	?>
    	</div>

    	<?php comment_text(); ?>

    	<div class="reply">
        	<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => 2 ) ) ); ?>
    	</div>
	</div>
	<?php endif; ?>
	
    
	<?php // End function
    }
}

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
// Used in serps (I think)
if(!function_exists('result_type')) {
	function result_type() {
		global $post, $page;
		if(is_page()) {
			echo 'Page';
		} elseif (is_post()) {
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
				<p><small>optional credit: <a href="'.bootplate_info('repo').'" target="_blank" rel="nofollow">Bootplate v'.bootplate_info('version').'</a></small></p>
			</div>
		</div><!--/#bootplate-credit-->
		';
	}; 
	add_action( 'bootplate_credits', 'action_bootplate_credits', 10, 0 ); 
}

remove_action('wp_head', 'wp_generator');


