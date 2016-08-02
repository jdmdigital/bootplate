<?php
/**
 *            /// 
 *           (o 0)
 * ======o00o-(_)-o00o======
 * Bootplate v1.8 Main Functions
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
 
define('VERSION', 1.8);
define("REPO", 'https://github.com/jdmdigital/bootplate');
define("BRANCH", '');
 
// get_wpversion()
if(!function_exists('get_wpversion')){
	function get_wpversion() {
		return get_bloginfo('version');
	}
}

if(!function_exists('bootplate_info')) {
	function bootplate_info($data = 'version') {
		$version 	= VERSION;
		$repo 		= REPO;
		$branch		= BRANCH;
		
		if($data == 'repo') {
			return $repo;
		} elseif($data == 'branch') {
			if($branch != '') {
				return $branch;
			} else {
				return $repo;
			}
		} elseif ($data == 'stringver') {
			return sprintf('%1', $version);
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
			'primary' 		=> __( 'Primary Menu', 'bootplate' ),
			'primary-left'	=> __( 'Primary Menu (left)', 'bootplate' ),
			//'blogcats'  	=> __( 'Blog Categories Menu', 'bootplate' ), - Not using this since v1.1
			'footer'  		=> __( 'Footer Links Menu', 'bootplate' ),
			'social'  		=> __( 'Social Links Menu', 'bootplate' ),
		) );
		
		// Include Bootstrap Nav Walker
		require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

		// Switch default core markup to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'caption', 'gallery'
		) );
		
		// Add Quote and Link Post Format Support
		add_theme_support( 'post-formats', array(
			'quote', 'link'
		) );
		
		load_theme_textdomain( 'bootplate', get_template_directory().'/languages' );
		
		// Make translation ready
		load_theme_textdomain('bootplate', get_template_directory(). '/languages');
		$locale = get_locale();
		$locale_file = get_template_directory() . "/languages/".$locale.".php";
		if ( is_readable($locale_file) ) {
	  		require_once($locale_file);
		}
		
		
		// Style the Editor to resemble the frontend
		add_editor_style( array( 'css/editor-style.css') );
		
	}// END setup function
} // END function_exists( 'bootplate_setup' )
add_action( 'after_setup_theme', 'bootplate_setup' );

/**
 * Register widget areas.
 */
function bootplate_widgets_init() {
	register_sidebar( array(
		'name'          => __('Footer Widget 1', 'bootplate'),
		'id'            => 'footer-1',
		'description'   => __('The first footer widget area.', 'bootplate'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __('Footer Widget 2', 'bootplate'),
		'id'            => 'footer-2',
		'description'   => __('The second footer widget area.', 'bootplate'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __('Footer Widget 3', 'bootplate'),
		'id'            => 'footer-3',
		'description'   => __('The third footer widget area.', 'bootplate'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __('Footer Widget 4', 'bootplate'),
		'id'            => 'footer-4',
		'description'   => __('The fourth footer widget area.', 'bootplate'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __('Blog Sidebar', 'bootplate'),
		'id'            => 'blog-sidebar',
		'description'   => __('Used for sidebar for blog post listings.', 'bootplate'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __('Page Sidebar Right', 'bootplate'),
		'id'            => 'page-sidebar-right',
		'description'   => __('Used for pages using the Page - Sidebar RIGHT template.', 'bootplate'),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => __('Page Sidebar Left', 'bootplate'),
		'id'            => 'page-sidebar-left',
		'description'   => __('Used for pages using the Page - Sidebar LEFT template.', 'bootplate'),
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
 * Updated in v1.7
 */
function bootplate_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), null, 'all' );
	
	// See Issue 49 - https://github.com/jdmdigital/bootplate/issues/49
	$child_style 	= get_stylesheet();
	if(!isset($child_style) || $child_style == '') {
		$has_child_style	= false;
	} else {
		$has_child_style	= true;
	}
	
	if( get_theme_mod( 'minify_bootplate_css', 'unmin-bootplate-css' ) == 'min-bootplate-css') {$mincss = true;} else { $mincss = false; }
	if( get_theme_mod( 'minify_bootplate_js', 'unmin-bootplate-js' ) == 'min-bootplate-js') {$minjs = true;} else { $minjs = false; }
	
	if(is_child_theme() && $has_child_style) {
		// Load Parent.css instead of the full style.css file (or the minified version).
		if($mincss) {
			wp_enqueue_style( 'bootplate', get_template_directory_uri() . '/css/parent.min.css', array('bootstrap'), bootplate_resource_version() );
		} else {
			wp_enqueue_style( 'bootplate', get_template_directory_uri() . '/css/parent.css', array('bootstrap'), bootplate_resource_version() );
		}
		if($mincss) {
			wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.min.css', array( 'bootstrap' ), bootplate_resource_version() );
		} else {
			wp_enqueue_style( $child_style, get_stylesheet_directory_uri() . '/style.css', array( 'bootstrap' ), bootplate_resource_version() );
		}
	} else {
		// Using Parent Theme. Load full style.css (or the minified version).
		if($mincss) {
			wp_enqueue_style( 'bootplate', get_template_directory_uri() . '/style.min.css', array('bootstrap'), bootplate_resource_version() );
		} else {
			wp_enqueue_style( 'bootplate', get_stylesheet_uri(), array('bootstrap'), bootplate_resource_version() );
		}

	}
	
	// Load the IE-specific stylesheet.
	wp_enqueue_style( 'bootplate-ie', get_template_directory_uri() . '/css/ie.css', array( 'bootplate' ), null );
	wp_style_add_data( 'bootplate-ie', 'conditional', 'lt IE 9' );
	
	if(function_exists('jdmfab_show_admin_buttons')) {
		wp_deregister_script( 'jdm-fab' );
	}
	
	wp_deregister_script( 'html5shiv-maxcdn' );
	wp_register_script( 'html5shiv-maxcdn', '//oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js', '', null, false );
	wp_enqueue_script( 'html5shiv-maxcdn' );
	wp_script_add_data( 'html5shiv-maxcdn', 'conditional', 'lt IE 9' );
	
	wp_deregister_script( 'respond-js' );
	wp_register_script( 'respond-js', '//oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js', '', null, false );
	wp_enqueue_script( 'respond-js' );
	wp_script_add_data( 'respond-js', 'conditional', 'lt IE 9' );

	if( get_theme_mod( 'cdn_jquery', 'jquery_cdn' ) == 'jquery_cdn') {
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', '', null, true );
		wp_enqueue_script( 'jquery' );
		
		wp_deregister_script( 'jquery-form' );
		wp_register_script( 'jquery-form', '//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.51/jquery.form.min.js', array('jquery'), null, true );

	} else {
		wp_enqueue_script( 'jquery' ); // latest version from core
	}
	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null, true );
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr-custom.js', array('jquery'), null, true );
	
	if($minjs) {
		wp_enqueue_script( 'bootplate-plugins', get_template_directory_uri() . '/js/plugins.min.js', array('jquery', 'modernizr'), bootplate_resource_version(), true );
	} else {
		wp_enqueue_script( 'bootplate-plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery', 'modernizr'), bootplate_resource_version(), true );
	}
	
	if(is_child_theme()) {
		$child_js = $child_style.'-main';
		if($minjs) {
			wp_enqueue_script( $child_js, get_stylesheet_directory_uri() . '/js/main.min.js', array('jquery', 'modernizr', 'bootplate-plugins'), bootplate_resource_version(), true );
		} else {
			wp_enqueue_script( $child_js, get_stylesheet_directory_uri() . '/js/main.js', array('jquery', 'modernizr', 'bootplate-plugins'), bootplate_resource_version(), true );
		}
	} else {
		// Using Parent Theme. Load full style.css (or the minified version).
		if($minjs) {
			wp_enqueue_script( 'bootplate', get_template_directory_uri() . '/js/main.min.js', array('jquery', 'modernizr', 'bootplate-plugins'), bootplate_resource_version(), true );
		} else {
			wp_enqueue_script( 'bootplate', get_template_directory_uri() . '/js/main.js', array('jquery', 'modernizr', 'bootplate-plugins'), bootplate_resource_version(), true );
		}

	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bootplate_scripts' );

// Get rid of bloated styles
function bootplate_deregister_styles() {
	wp_deregister_style( 'contact-form-7' );
	wp_deregister_style('jdm-fab');
}
add_action( 'wp_print_styles', 'bootplate_deregister_styles', 100 );


// Remove Version Query String
if(!function_exists('bootplate_remove_ver_css_js')) {
	function bootplate_remove_ver_css_js( $src ) {
		if ( strpos( $src, 'ver=' ) )
			$src = remove_query_arg( 'ver', $src );
		return $src;
	}
}
if( get_theme_mod( 'enable_browser_cache', 'no_browser_cache' ) == 'browser_cache') {
	add_filter( 'style_loader_src', 'bootplate_remove_ver_css_js', 9999 );
	add_filter( 'script_loader_src', 'bootplate_remove_ver_css_js', 9999 );
}

if(!function_exists('bootplate_resource_version')) {
	function bootplate_resource_version() {
		if( get_theme_mod( 'enable_browser_cache', 'no_browser_cache' ) == 'browser_cache') {
			return null;
		} else {
			//return bootplate_info('stringver');
			return VERSION;
		}
	}
}

// Remove oEmbed Gist Action
global $oe_gist;
remove_action( 'wp_head', array( $oe_gist, 'wp_head' ), 100 );


require get_template_directory() . '/inc/template-tags.php';

/* Function to detect if child theme has the appropriate file
 * Arg $url = fully-qualified URL
 * Returns TRUE if the file doesn't have 404/500 headers (non-existant) else FALSE
 * @since Bootplate v 1.5
*/
if(!function_exists('bootplate_file_exists')) {
	function bootplate_file_exists($url = '') {
		if($url != '') {
			$file_headers = get_headers($url);
			$header_code = substr($file_headers[0], 9, 3);
			//if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
			if($header_code == '404' || $header_code == '500') {
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}
}

// LoadCSS - Async Load of child theme's body.css (below the fold styles)
// Rewritten in v1.5
if(!function_exists('bootplate_async_css')) {
	function bootplate_async_css() {
		if(get_theme_mod( 'minify_bootplate_css', 'unmin-bootplate-css' ) == 'min-bootplate-css') {$bodycss = 'body.min.css';} else {$bodycss = 'body.css';}
		if(get_theme_mod( 'minify_bootplate_js', 'unmin-bootplate-js' ) == 'min-bootplate-js') {$loadjs = 'loadcss.min.js';} else {$loadjs = 'loadcss.js';}
		
		$childdir  = get_stylesheet_directory_uri();
		$parentdir = get_template_directory_uri();
		
		// Default to child theme dir
		$bodycss_dir	= $childdir.'/css/'.$bodycss;
		$loadjs_dir 	= $childdir.'/js/'.$loadjs;
		
		// Check for body css
		if(!bootplate_file_exists($bodycss_dir)) {$bodycss_dir = $parentdir.'/css/'.$bodycss;}
		
		// Check for loadcss js
		if(!bootplate_file_exists($loadjs_dir)) {$loadjs_dir = $parentdir.'/js/'.$loadjs;}
		
		echo '
		<!-- bootplate_async_css v1.5 -->
		<link rel="preload" href="'.$bodycss_dir.'" as="style" onload="this.rel=\'stylesheet\'" type="text/css" />
		<noscript><link rel="stylesheet" href="'.$bodycss_dir.'" type="text/css" /></noscript>
		<script src="'.$loadjs_dir.'" type="text/javascript"></script>
		
		';
	}
}

/* Basic Bootplate SEO tags in header
 * Does nothing if SEO plugin is installed and activated
 * @since Bootplate v0.5
 *
 * TESTS FOR:
 *  - SEO Ultimate: https://wordpress.org/plugins/seo-ultimate/ 
 *  - Yoast: https://wordpress.org/plugins/wordpress-seo/
 *  - Stallion: https://wordpress.org/plugins/stallion-wordpress-seo-plugin/
 *  - Squirrley: https://wordpress.org/plugins/squirrly-seo/
 *  - seo-wizard: https://wordpress.org/plugins/seo-wizard/
 *  - WP Meta SEO: https://wordpress.org/plugins/wp-meta-seo/
 */
if(!function_exists('have_seo')) {
	function have_seo($info = 'have'){
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if(is_plugin_active('seo-ultimate/seo-ultimate.php')) {
			$seoplugin = true;
			$pluginname = 'seo-ultimate';
		} elseif(is_plugin_active('wordpress-seo/wp-seo.php')) {
			$seoplugin = true;
			$pluginname = 'wordpress-seo';
		} elseif(is_plugin_active('stallion-wordpress-seo-plugin/stallion-wordpress-seo-plugin.php')) {
			$seoplugin = true;
			$pluginname = 'stallion-wordpress-seo-plugin';
		} elseif(is_plugin_active('squirrly-seo/squirrly.php')) {
			$seoplugin = true;
			$pluginname = 'squirrly-seo';
		} elseif(is_plugin_active('seo-wizard/wp-seo-wizard.php')) {
			$seoplugin = true;
			$pluginname = 'seo-wizard';
		} elseif(is_plugin_active('wp-meta-seo/wp-meta-seo.php')) {
			$seoplugin = true;
			$pluginname = 'wp-meta-seo';
		} else {
			$seoplugin = false;
			$pluginname = '';
		}
		
		if(isset($info) && $info == 'name'){
			return $pluginname;
		} else {
			return $seoplugin;
		}
		
	}
}

if(!function_exists('bootplate_meta')) {
	function bootplate_meta(){
		if(!have_seo()) {
			// Let's do the work
			global $post, $page;
			
			$metadescription = bootplate_get_meta_description();		
			
			echo '<meta name="description" content="'.$metadescription.'" />'."\r\n";
			echo '	<meta name="author" content="'.get_bootplate_formal_name().'" />'."\r\n";
			echo '	<meta itemprop="name" content="'.esc_url(get_home_url()).'" />'."\r\n";
			echo '	<meta itemprop="description" content="'.$metadescription.'" />'."\r\n";
			echo '	<meta property="og:site_name" content="'.get_bloginfo('name').'" />'."\r\n";;
			echo '	<meta property="og:title" content="'.esc_url(get_home_url()).'" />'."\r\n";
			echo '	<meta property="og:description" content="'.$metadescription.'" />'."\r\n";
			echo '	<meta property="og:url" content="'.get_home_url().'" />'."\r\n";
			echo '	<meta name="apple-mobile-web-app-capable" content="yes">'."\r\n";
			echo '	<meta name="apple-mobile-web-app-status-bar-style" content="black">'."\r\n";		
			echo '	<meta name="apple-mobile-web-app-title" content="'.get_bloginfo('name').'">'."\r\n";
			echo '	<meta name="robots" content="noodp"/>'."\r\n";
		} else {
			// Let the plugin do the work, but add the apple-mobile-web-app stuff
			echo '<meta name="apple-mobile-web-app-capable" content="yes">'."\r\n";
			echo '	<meta name="apple-mobile-web-app-status-bar-style" content="black">'."\r\n";		
			echo '	<meta name="apple-mobile-web-app-title" content="'.get_bloginfo('name').'">'."\r\n";
		}
	}
}

// Returns content for a meta description
if(!function_exists('bootplate_get_meta_description')) {
	function bootplate_get_meta_description() {
		$maxlength = 155;
		$rawcontent = get_the_content();
		if(empty($rawcontent)) {
			$rawcontent = htmlentities(get_bloginfo('description'));
		} else {
			$rawcontent = apply_filters('the_content_rss', strip_tags($rawcontent));
			$rawcontent = preg_replace('/\[.+\]/','', $rawcontent);
			$chars = array("", "\n", "\r", "chr(13)",  "\t", "\0", "\x0B");
			$rawcontent = htmlentities(str_replace($chars, " ", $rawcontent));
		}
		if (strlen($rawcontent) < $maxlength) {
			return $rawcontent;
		} else {
			$desc = substr($rawcontent,0,$maxlength);
			return $desc;
		}
	}
}

// AMP CSS Action
// Depends on https://github.com/Automattic/amp-wp/
if(!function_exists('bootplate_amp_css')) {	
	function bootplate_amp_css( $amp_template ) {
		/*include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		if(is_plugin_active('amp/amp.php')) {
			add_action( 'amp_post_template_css', 'bootplate_amp_css' );		
		}*/
		// only CSS here please...
		?>
		/* Bootplate Styles */
		html body{font-family: "Helvetica Neue",Helvetica,Arial,sans-serif; color: #555; font-size: 18px; font-weight: 300; line-height: 1.4;}
		body nav.amp-wp-title-bar {background-color: #6f5499;}
		body .amp-wp-meta, body .amp-wp-meta a, body a{color: #6f5499;}
		body .amp-wp-title{color:#000;}
		body .amp-wp-content{color:#333;}
		body blockquote{background: #eeeeee none repeat scroll 0 0; border-left: 4px solid #888; color: #222;}
		<?php
	}
	add_action( 'amp_post_template_css', 'bootplate_amp_css' );		
	
}

// Nicer Search - Creates a specific /search/ page instead of index.php?s=, which confuses google.
if(!function_exists('bootplate_nice_search_redirect') && !function_exists('bootplate_change_ssb_search')) {
	function bootplate_nice_search_redirect() {
		global $wp_rewrite;
		if ( !isset( $wp_rewrite ) || !is_object( $wp_rewrite ) || !$wp_rewrite->using_permalinks() )
			return;
		$search_base = $wp_rewrite->search_base;
		if ( is_search() && !is_admin() && strpos( $_SERVER['REQUEST_URI'], "/{$search_base}/" ) === false ) {
			wp_redirect( home_url( "/{$search_base}/" . urlencode( get_query_var( 's' ) ) ) );
			exit();
		}
	}
	
	// For Yoast SEO URL Fix: https://github.com/jdmdigital/bootplate/issues/31
	// The returned string must always include {search_term} to indicate where the search term should be used.
	// @returns string new searchURL
	function bootplate_change_ssb_search() {
		global $wp_rewrite;
		if ( !isset( $wp_rewrite ) || !is_object( $wp_rewrite ) || !$wp_rewrite->using_permalinks() )
			return;
		$search_base = $wp_rewrite->search_base;
		return home_url("/{$search_base}/").'{search_term}';
		//return 'http://mysite.com/?search={search_term}';
 	}
	
	// Add_Action ONLY if the Enable Search is = 1
	if(get_theme_mod( 'bootplate_enable_search', '') == 1) {
		if(function_exists('wpseo_init')) {
			// For Yoast SEO URL Fix: https://github.com/jdmdigital/bootplate/issues/31
			add_filter('wpseo_json_ld_search_url', 'bootplate_change_ssb_search' ); 
		}
		add_action( 'template_redirect', 'bootplate_nice_search_redirect' );
	}
}


if ( ! function_exists( 'bootplate_comment_nav' ) ) :
/**
 * Display navigation to next/previous comments when applicable.
 * based on: Twenty Fifteen 1.0
 */
function bootplate_comment_nav() {
	// Are there comments to navigate through?
	if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
	?>
	<div class="navigation comment-navigation" role="navigation">
		<ul class="pager">
			<?php
				if ( $prev_link = get_previous_comments_link( '<span class="bp-left-open"></span>' ) ) {
					printf( '<li class="pager-prev" title="'.__('Older Comments', 'bootplate').'">%s</li>', $prev_link );
				} else {
					echo '<li class="pager-prev disabled" title="'.__('Older Comments', 'bootplate').'"><a><span class="bp-left-open"></span></a></li>';
				}

				if ( $next_link = get_next_comments_link( '<span class="bp-right-open"></span>' ) ) {
					printf( '<li class="pager-next" title="'.__('Newer Comments', 'bootplate').'">%s</li>', $next_link );
				} else {
					echo '<li class="pager-next disabled" title="'.__('Newer Comments', 'bootplate').'"><a><span class="bp-right-open"></span></a></li>';
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
		if(get_comment_author_url() != '' && get_theme_mod( 'bootplate_enable_comments_url', '') == 1) {
			$commentlink 	= true;
			$commentlinkurl	= get_comment_author_url();
		} else {
			$commentlink 	= false;
		}
		 
    ?>

	<article id="comment-<?php comment_ID(); ?>" class="row artcomm">
		<div class="<?php bootplate_comment_classes(1); ?>">
			<figure class="thumbnail">
				<?php echo get_avatar( $comment, 80 ); ?>
			</figure>
		</div>
		<div class="<?php bootplate_comment_classes(2); ?>">
			<div class="panel panel-default arrow left">
				<div class="panel-body">
					<header class="text-left">
						<div class="comment-user">
							<?php if($commentlink) : ?>
							<a href="<?php echo $commentlinkurl; ?>" target="_blank" rel="nofollow"><b><?php comment_author(); ?></b></a>
							<?php else : ?>
							<b><?php comment_author(); ?></b>
							<?php endif; ?>
						</div>
						<time class="comment-date" datetime="<?php printf( __('%1$s %2$s', 'bootplate'), get_comment_date(),  get_comment_time() ); ?>"><?php printf( __('%1$s at %2$s', 'bootplate'), get_comment_date(),  get_comment_time() ); ?></time>
					</header>
					<div class="comment-post<?php if ( $comment->comment_approved == '0' ) {echo ' in-moderation'; } ?>">
						<?php comment_text(); ?>
					</div>
					<?php if ( $comment->comment_approved == '0' ) : ?>
					<p class="text-right text-info no-margin-bottom"><?php  _e('Your comment is awaiting moderation.', 'bootplate'); ?></p>
					<?php else : ?>
					<p class="text-right no-margin-bottom"><?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => 2 ) ) ); ?>  <?php edit_comment_link( __( 'edit', 'bootplate' ), '  ', '' ); ?></p>
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
			'prev_text' => __('&laquo; Previous', 'bootplate'),
			'next_text' => __('Next &raquo;', 'bootplate'),
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
				$page_links[] = "<span class='page-numbers current'><span class='sr-only screen-reader-text'>(current) </span>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</span>";
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
					$page_links[] = '<span class="page-numbers dots">' . __( '&hellip;', 'bootplate' ) . '</span>';
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

// Echo Breadcrumbs if Yoast SEO is installed
if(!function_exists('bootplate_breadcrumbs') ) {
	function bootplate_breadcrumbs() {
		if ( function_exists('yoast_breadcrumb') && function_exists('downey_bootplate_breadcrumbs') ) {
			echo downey_bootplate_breadcrumbs();
			//
		} elseif (function_exists('yoast_breadcrumb') && !function_exists('downey_bootplate_breadcrumbs')) {
			yoast_breadcrumb('<p id="breadcrumbs" class="breadcrumb">','</p>');
		} else {
			echo '<!--No theme-generated breadcrumbs-->';
		}
	} // END function bootplate_breadcrumbs()
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
		if(is_plugin_active('jdm-cta-buttons/jdm-cta-buttons.php') || is_plugin_active('bootplate-cta-buttons/bootplate-cta-buttons.php')) {
			return true;
		} else {
			return false;
		}
	}
}

/* Featured Image Functions
 * @since v0.6
 */

// Adds classes to <header>, usage: <header class="<php echo header_classes() endPHP >
// Will add .has-featured-image to header if there's a featured image set.
if(!function_exists('header_classes')) {
	function header_classes() {
		$id = get_the_id();
		$headerclasses = 'jumbotron jumbotron-fluid bg-custom';
		if(is_page_template('page-fullheight.php') || is_page_template('page-homepage.php') || is_page_template('page-search.php')) {
			$headerclasses .= ' full-height text-center';
		}
		if(is_page_template('page-thirdheight.php')) {
			$headerclasses .= ' full-height vh33';
		}
		if(is_page_template('page-twothirdheight.php')) {
			$headerclasses .= ' full-height vh66';
		}
		if ( has_post_thumbnail($id) ) {
			$headerclasses .= ' has-featured-image';
		}
		return $headerclasses;
	}
}
if(!function_exists('get_featured_image')) {
	function get_featured_image($id = 0, $size = 'full') {
		if($id == 0){
			$id = get_the_id();
		}
		
		if ( has_post_thumbnail($id) ) { 
			// Has one. return the img src.
			$imgsrc =  wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), $size);
			return $imgsrc[0]; 
		}
	}
}
if(!function_exists('the_featured_image')) {
	function the_featured_image($id = 0, $size = 'full') {
		if($id == 0){
			$id = get_the_id();
		}
		
		if ( has_post_thumbnail($id) ) {
			$alt = get_the_title();
			//$imgsrc = get_featured_image($id, $size);
			$imgsrc = get_the_post_thumbnail_url($id, $size);
			$featuredimg = '<p><img src="'.$imgsrc.'" class="featured-img img-responsive img-fluid" alt="'.$alt.'" /></p>';
			
			echo $featuredimg;
		}
	}
}
if(!function_exists('the_header_bgimg')) {
	function the_header_bgimg($size = 'full') {
		
		$id = get_the_id();
		
		if ( has_post_thumbnail($id) ) { 
			// Has one. return the img src.
			$imgsrc =  wp_get_attachment_image_src(get_post_thumbnail_id($id), $size);
			//echo ' style="background-image:url(\''.$imgsrc[0].'\'" '; 
			echo ' style="background-image:url('.$imgsrc[0].');"';
		}
	}
}

// Customize Get_Avatar Classes
if(!function_exists('bootplate_change_avatar_css')) {
	function bootplate_change_avatar_css($class) {
		$class = str_replace("class='avatar", "class='img-responsive img-thumbnail", $class) ;
		return $class;
	}
	add_filter('get_avatar','bootplate_change_avatar_css');
}

// Add Image Class(es) - EX: .img-rounded or .img-circle
if(!function_exists('bootplate_add_image_class')) {
	function bootplate_add_image_class($class){
		$class .= ' img-responsive img-fluid';
		return $class;
	}
	add_filter('get_image_tag_class','bootplate_add_image_class');
}

// Echos the result type
// Used in serps (I think) - BROKEN
if(!function_exists('bootplate_result_type')) {
	function bootplate_result_type() {
		global $post, $page;
		if(is_page()) {
			echo __('Page', 'bootplate');
		} elseif (is_single()) {
			$format = get_post_format();
			if(!$format){
				echo __('Post', 'bootplate');
			} else {
				echo ucfirst($format);
			}
		} else {
			echo __('Media', 'bootplate');
		}
	}
}

require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/custom_subtitles.php';


// Wraps oembed videos in Bootstrap responsive embed class
if(!function_exists('bootplate_oembed_filter')) {
	function bootplate_oembed_filter($html, $url, $attr, $post_ID) {
		$return = '<div class="embed-responsive embed-responsive-16by9">'.$html.'</div>';
		return $return;
	}
	add_filter( 'embed_oembed_html', 'bootplate_oembed_filter', 90, 4 ) ;
	add_filter( 'video_embed_html', 'bootplate_remove_wp_admin_links' ); // Jetpack
}


// Remove WP Links in Admin
if(!function_exists('bootplate_remove_wp_admin_links')){
	function bootplate_remove_wp_admin_links() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('about');
		$wp_admin_bar->remove_menu('wporg');
		$wp_admin_bar->remove_menu('documentation');
		$wp_admin_bar->remove_menu('support-forums');
		$wp_admin_bar->remove_menu('feedback');
		//$wp_admin_bar->remove_menu('view-site');
	}
	add_action( 'wp_before_admin_bar_render', 'bootplate_remove_wp_admin_links' );
	
}

// Remove WP Icon from Admin Bar
if(!function_exists('bootplate_remove_wp_logo_adminbar')){
	function bootplate_remove_wp_logo_adminbar() {
		global $wp_admin_bar;
		$wp_admin_bar->remove_menu('wp-logo');
	}
	 
	add_action( 'wp_before_admin_bar_render', 'bootplate_remove_wp_logo_adminbar' );
}

// Change "Howdy, Admin" because it's lame
if(!function_exists('bootplate_no_wp_howdy')) {
	function bootplate_no_wp_howdy( $wp_admin_bar ) {
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
	add_action( 'admin_bar_menu', 'bootplate_no_wp_howdy', 11 );
}

// @since v1.3
if(get_theme_mod( 'bootplate_enable_totop', '') == 1) {
	if(!function_exists('bootplate_totop_link')) {
		function bootplate_totop_link() {
			echo '<a id="pageup" class="back-to-top"><span class="bp-up-open glyphicon glyphicon-chevron-up"></span></a>';
		}
		add_action( 'wp_footer', 'bootplate_totop_link', 6 );
	}
}

/**
 * Disable the emoji's
 * Note: Emoticons will still work and emoji's will still work in browsers which have built in support for them. 
 * This function simply removes the extra code bloat used to add support for emoji's in older browswers.
 */
if (!function_exists('disable_emojis') && !function_exists('bootplate_disable_emoji_bloat')) {
	function bootplate_disable_emoji_bloat() {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );	
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );	
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		//add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	}
	add_action( 'init', 'bootplate_disable_emoji_bloat' );
}

// customize admin footer text
function bootplate_admin_footer() {
	if( get_theme_mod( 'bootplate_credit' ) == 1) {
		echo __('Built on', 'bootplate').' <a href="'.bootplate_info('repo').'" target="_blank" rel="nofollow" title="Bootplate v'.bootplate_info('version').' by JDM Digital">Bootplate v'.bootplate_info('version').'</a> and <a href="http://wordpress.org" target="_blank">WordPress'. ' v'. get_wpversion().'</a>';
	}
} 
add_filter('admin_footer_text', 'bootplate_admin_footer');

// define bootstrap_credits callback 
if(!function_exists('action_bootplate_credits')) {
	function action_bootplate_credits() { 
		if( get_theme_mod( 'bootplate_credit' ) == 1) {
			echo '
			<div id="bootplate-credit">
				<div class="container text-center">
					<p><small>'.__('Made with', 'bootplate').' <span class="sr-only screen-reader-text">'.__('love', 'bootplate').'</span><span class="bp-heart"></span> '.__('and', 'bootplate').' <a href="'.bootplate_info('branch').'" target="_blank" rel="nofollow" title="Bootplate v'.bootplate_info('version').' by JDM Digital">Bootplate v'.bootplate_info('version').'</a></small></p>
				</div>
			</div><!--/#bootplate-credit-->
			';
		} else {
			echo '';
		}
	}; 
	add_action( 'bootplate_credits', 'action_bootplate_credits', 10, 0 ); 
}

if(!function_exists('get_bootplate_formal_name')) {
	function get_bootplate_formal_name() {
		$companyname = get_theme_mod( 'formal_name_textbox', 'none' );
		if($companyname == 'none') {
			$companyname = get_bloginfo('name');
		}
		return $companyname;
	}
}

/* BOOL - Returns TRUE if nav_position is the same as passed var accroding to Customizer option
 * Defaults to 'nav-right'
 * returns FALSE if it doesn't or if the passed nav position isn't an option
 * @since Bootplate v0.7
 *
 * Usage: if(is_bootplate_nav_position('nav-right')) 
 */
if(!function_exists('is_bootplate_nav_position')) {
	function is_bootplate_nav_position($pos = 'nav-right') {
		$navtype = get_theme_mod( 'main_nav_position', 'nav-right' );
		
		if($navtype == $pos || $navtype == 'nav-split'){
			return true;
		} else {
			return false;
		}
	}
}

if(!function_exists('get_bootplate_nav_type')) {
	function get_bootplate_nav_type() {
		$navtype = get_theme_mod( 'main_nav_type', false );
		if($navtype){
			if($navtype == 'navbar-fixed-top'){
				// nav-fixedtop.php
				$navpart = 'fixedtop';
			} elseif($navtype == 'navbar-fixed-bottom'){
				// nav-fixedbottom.php
				$navpart = 'fixedbottom';
			} elseif($navtype == 'default-scroll') {
				// nav.php
				$navpart = '';
			} else {
				// nav-{whatever}.php
				$navpart = $navpart;
			}
		} else {
			// defaults to nav.php
			$navpart = '';
		}
		return $navpart;
	}
}

if(!function_exists('get_bootplate_nav_style')) {
	function get_bootplate_nav_style() {
		$navstyle = get_theme_mod( 'main_nav_style', 'not-set' );
		
		if ($navstyle == 'navbar-inverse') {
			$navclasses = 'navbar-dark bg-inverse navbar-inverse '.$navstyle;
		
		} elseif ($navstyle == 'navbar-inverse-logo') {
			$navclasses = 'navbar-dark bg-inverse navbar-inverse navbar-img-logo '.$navstyle;
			
		} elseif ($navstyle == 'navbar-inverse-logo-bug') {
			$navclasses = 'navbar-dark bg-inverse navbar-inverse navbar-imgtext-logo '.$navstyle;
		
		} elseif($navstyle == 'navbar-light') {
			$navclasses = 'navbar-default '.$navstyle;
			
		} elseif ($navstyle == 'navbar-light-logo') {
			$navclasses = 'navbar-default navbar-img-logo '.$navstyle;
			
		} elseif ($navstyle == 'navbar-light-logo-bug') {
			$navclasses = 'navbar-default navbar-imgtext-logo '.$navstyle;

		} else {
			// Default
			$navclasses = 'navbar-dark bg-inverse navbar-inverse bootplate-oops-nav-style '.$navstyle;
		}
		return $navclasses;
	}
}

if(!function_exists('bootplate_get_logo')) {
	function bootplate_get_logo(){
		$navtype = get_theme_mod( 'main_nav_style', 'default-logo' );
		if($navtype == 'navbar-inverse-logo' || $navtype == 'navbar-light-logo'){
			if( get_theme_mod('bootplate_logo', false)) {
				$logo = '<img src="'.esc_url(get_theme_mod('bootplate_logo')).'" alt="'.get_bloginfo( 'name' ).'" />';
			} else {
				$logo = '<img src="'.get_template_directory_uri().'/img/218x48.png" alt="'.get_bloginfo( 'name' ).'" />';
			}
		} elseif ($navtype == 'navbar-inverse-logo-bug' || $navtype == 'navbar-light-logo-bug') {
			if( get_theme_mod('bootplate_logo', false) ) {
				$logo = '<img src="'.esc_url(get_theme_mod('bootplate_logo')).'" alt="'.get_bloginfo( 'name' ).' Logo" />'.' '.get_bloginfo( 'name' );
			} else {
				$logo = '<img src="'.get_template_directory_uri().'/img/48x48.png" alt="'.get_bloginfo( 'name' ).'" />'.' '.get_bloginfo( 'name' );
			}
		} else {
			$logo = get_bloginfo( 'name' );
		}
		return $logo;
	}
}

if(!function_exists('get_bootplate_share')) {
	function get_bootplate_share() {
		if(get_theme_mod( 'bootplate_enable_social_share', '') == 1) {
			$url = get_permalink() ;
			$text = get_the_title();
			if(get_the_author_meta('twitter')) {$twitterhandle = '&via='.htmlentities(get_the_author_meta('twitter'));} else {$twitterhandle = '';}
			
			$html = '<div class="social-share margin-top">'."\r\n";
			$html .= '	<div class="btn-group btn-group-justified" role="group" aria-label="Share this post">'."\r\n";			
			$html .= '		<a class="mini btn btn-default btn-secondary" href="https://twitter.com/share?text='.urlencode(html_entity_decode($text, ENT_COMPAT, 'UTF-8')).'&url='.urlencode($url).htmlentities($twitterhandle).'" title="Twitter" role="button"><span class="bp-twitter"></span></a>'."\r\n";
			$html .= '		<a class="mini btn btn-default btn-secondary" href="http://www.facebook.com/share.php?u='.$url.'" title="Facebook" role="button"><span class="bp-facebook"></span></a>'."\r\n";
			$html .= '		<a class="mini btn btn-default btn-secondary" href="http://www.linkedin.com/shareArticle?mini=true&url='.urlencode($url).'&title='.urlencode(html_entity_decode($text, ENT_COMPAT, 'UTF-8')).'" title="LinkedIn" role="button"><span class="bp-linkedin"></span></a>'."\r\n";
			$html .= '		<a class="mini btn btn-default btn-secondary" href="https://plus.google.com/share?url='.urlencode($url).'" title="Google Plus" role="button"><span class="bp-gplus"></span></a>'."\r\n";
			$html .= '	</div>'."\r\n";
			$html .= '</div>'."\r\n";
			
			return $html;
		} // Returns nothing if not enabled in customizer (they might be using something else)
			return '';
	}
}

/* Add Google Analytics to Footer
 * See: https://github.com/jdmdigital/bootplate/issues/100 
 * @since 1.8
 */
if(!function_exists('bootplate_add_ga')) {
	function bootplate_add_ga() { 
		$ga = get_theme_mod( 'ga_uid_textbox', '' );
		$script = '';
		
		if($ga != '') {
			$script .= "
			<script>
				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
				ga('create', '".$ga."', 'auto');
				ga('send', 'pageview');
			</script>";
		} 
		
		echo $script;
	} 
	
	add_action('wp_footer', 'bootplate_add_ga', 900);
}

remove_action('wp_head', 'wp_generator');
