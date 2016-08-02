<?php
/**
 * Bootplate v1.6 Customizer functionality
 *
 * @package WordPress
 * @subpackage Bootplate
 * @since Bootplate 1.2
 */

/* To retreive these settings:
 * get_theme_mod( 'copyright_textbox', 'No copyright information has been saved yet.' ); ?>
 * get_theme_mod( 'formal_name_textbox', 'No formal name.' ); ?>
 * if( get_theme_mod( 'bootplate_credit' ) == 1) { show it} ?>
 * if( get_theme_mod( 'main-nav-type', 'nav-right' ) == 'nav-right')  ?>
 * if( get_theme_mod( 'main-nav-position', 'default-scroll' ) == 'default-scroll') 
 * if( get_theme_mod( 'themeslug_logo' )) { echo esc_url( get_theme_mod( 'bootplate_logo' ) );}
 * if(get_theme_mod( 'bootplate_enable_search', '') == 1) {}
 */
 
function bootplate_customize_register( $wp_customize ) {
	// ==Add General Settings Section
	$wp_customize->add_section(
		'general_settings_section',
		array(
			'title' => 'General Settings',
			'description' => 'A few general Bootplate settings.',
			'priority' => 35,
		)
	);
	
	// Add Navigation Type Setting
	$wp_customize->add_setting(
		'main_nav_type',
		array(
			'default' => 'default-scroll',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Type Control  - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'main_nav_type',
		array(
			'label' => 'Main Nav Type',
			'description' => 'Select the TYPE of main (top) navigation you would like.',
			'section' => 'general_settings_section',
			'type' => 'select',
			'choices' => array(
				'default-scroll' => 'Scroll (default)',
				'navbar-fixed-top' => 'Fixed to Top',
				'navbar-fixed-bottom' => 'Fixed to Bottom',
			),
		)
	);
	
	// Add Navigation Position Setting
	$wp_customize->add_setting(
		'main_nav_position',
		array(
			'default' => 'nav-right',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Position Control  - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'main_nav_position',
		array(
			'label' => 'Main Nav Position',
			'description' => 'Select the POSITION of main (top) navigation(s) you would like.',
			'section' => 'general_settings_section',
			'type' => 'select',
			'choices' => array(
				'nav-right' => 'Right Nav (default)',
				'nav-left' => 'Left Nav',
				'nav-split' => 'Split Nav (right and left navs)',
			),
		)
	);
	
	// Add Navigation Style Setting
	$wp_customize->add_setting(
		'main_nav_style',
		array(
			'default' => 'navbar-inverse',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Style Control - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'main_nav_style',
		array(
			'label' => 'Main Nav Style',
			'description' => 'Select the STYLE of main (top) navigation. If you select w/ Logo or w/ Logo Bug and Text, please be sure to upload a logo below.',
			'section' => 'general_settings_section',
			'type' => 'select',
			'choices' => array(
				'navbar-inverse' => 'Navbar Dark (default)',
				'navbar-inverse-logo' => 'Navbar Dark w/ Logo',
				'navbar-inverse-logo-bug' => 'Navbar Dark w/ Logo Bug and Text',
				'navbar-light' => 'Navbar Light',
				'navbar-light-logo' => 'Navbar Light w/ Logo',
				'navbar-light-logo-bug' => 'Navbar Light w/ Logo Bug and Text'
			),
		)
	);
	
	// Add Logo Bug Setting with sanitize
	$wp_customize->add_setting(
		'bootplate_logo',
		array ( 
			'default' => '',
    		'sanitize_callback' => 'esc_url_raw'
    	)
	);
	
	// Add Logo Bug Upload Control
	$wp_customize->add_control( 
		new WP_Customize_Image_Control( $wp_customize, 'bootplate_logo', 
			array(
				'label'    => 'Upload Logo',
				'description' => 'Upload a full logo (ideally, 218px x 48px) or Logo Bug (48px x 48px), if you selected a Nav Style above that includes a logo.  Otherwise, this is ignored.',
				'section'  => 'general_settings_section',
				'settings' => 'bootplate_logo',
			) 
		) 
	);
	
	// Add Formal Company Name Setting
	$wp_customize->add_setting(
		'formal_name_textbox',
		array(
			'default' => 'Awesome, LLC',
			'sanitize_callback' => 'bootplate_sanitize_text',
		)
	);
	
	// Add Formal Company Name Setting Control
	$wp_customize->add_control(
		'formal_name_textbox',
		array(
			'label' => 'Formal Name',
			'description' => 'Formal Company Name is used as part of the &copy; copyright in the footer.',
			'section' => 'general_settings_section',
			'type' => 'text',
		)
	);
	
	// Add Google Analytics UID Setting
	$wp_customize->add_setting(
		'ga_uid_textbox',
		array(
			'default' => '',
			'sanitize_callback' => 'bootplate_sanitize_text',
		)
	);
	// Add Google Analytics UID Setting Control
	$wp_customize->add_control(
		'ga_uid_textbox',
		array(
			'label' => 'Google Analytics UID',
			'description' => 'To add Google Analytics, simply paste the UID here.  It\'ll look something like <b>UA-87878787-1</b>.',
			'section' => 'general_settings_section',
			'type' => 'text',
		)
	);
	
	// Bootplate Social Sharing Enable
	$wp_customize->add_setting(
		'bootplate_enable_social_share',
		array(
			'sanitize_callback' => 'bootplate_sanitize_checkbox',
		)
	);
	
	// Bootplate Social Sharing Enable Control
	$wp_customize->add_control(
		'bootplate_enable_social_share',
		array(
			'label' => 'Enable Social Share:',
			'description' => 'Enable Social Sharing on Single Posts? Check to enable.',
			'section' => 'general_settings_section',
			'type' => 'checkbox',
		)
	);
	
	// Bootplate URL in Comments Enable
	$wp_customize->add_setting(
		'bootplate_enable_comments_url',
		array(
			'sanitize_callback' => 'bootplate_sanitize_checkbox',
		)
	);
	
	// Bootplate Social Sharing Enable Control
	$wp_customize->add_control(
		'bootplate_enable_comments_url',
		array(
			'label' => 'Enable URL in Comments:',
			'description' => 'Enable the Website URL in Comments template? Check to enable.',
			'section' => 'general_settings_section',
			'type' => 'checkbox',
		)
	);
	
	// Add Bootplate Back-to-Top Enable
	$wp_customize->add_setting(
		'bootplate_enable_totop',
		array(
			'sanitize_callback' => 'bootplate_sanitize_checkbox',
		)
	);
	
	// Add Bootplate Back-to-Top Enable Control
	$wp_customize->add_control(
		'bootplate_enable_totop',
		array(
			'label' => 'Enable Back-to-Top',
			'description' => 'Show a back-to-top link after 500px scrolled?',
			'section' => 'general_settings_section',
			'type' => 'checkbox',
		)
	);
	
	// Add Bootplate Search Icon Enable
	$wp_customize->add_setting(
		'bootplate_enable_search',
		array(
			'sanitize_callback' => 'bootplate_sanitize_checkbox',
		)
	);
	
	// Add Bootplate Search Icon Enable Control
	$wp_customize->add_control(
		'bootplate_enable_search',
		array(
			'label' => 'Enable Search Icon',
			'description' => 'Show the search icon in the navigation?  Check to enable.',
			'section' => 'general_settings_section',
			'type' => 'checkbox',
		)
	);
	
	// Add Bootplate Credit Setting
	$wp_customize->add_setting(
		'bootplate_credit',
		array(
			'sanitize_callback' => 'bootplate_sanitize_checkbox',
		)
	);
	
	// Add Bootplate Credit Setting Control
	$wp_customize->add_control(
		'bootplate_credit',
		array(
			'label' => 'Display Bootplate Credit Link',
			'description' => 'Show &quot;Built with love and Bootplate&quot; at the very bottom.  Check to enable.',
			'section' => 'general_settings_section',
			'type' => 'checkbox',
		)
	);
	
	// ==Add Performance Section
	$wp_customize->add_section(
		'performance_settings_section',
		array(
			'title' => 'Performance',
			'description' => 'Boost loading speed performance.  <b>NOTE:</b> You shouldn\'t see any obvious changes in the preview.',
			'priority' => 36,
		)
	);
	
	// Add Navigation Type Setting
	$wp_customize->add_setting(
		'minify_bootplate_css',
		array(
			'default' => 'unmin-bootplate-css',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Type Control  - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'minify_bootplate_css',
		array(
			'label' => 'Minify Bootplate CSS',
			'description' => 'Use the minified style.min.css file (9KB smaller)?',
			'section' => 'performance_settings_section',
			'type' => 'select',
			'choices' => array(
				'unmin-bootplate-css' => 'Unminify Style.css (59KB)',
				'min-bootplate-css' => 'Minify Style.min.css (50KB)',
			),
		)
	);
	
	// Add Navigation Type Setting
	$wp_customize->add_setting(
		'minify_bootplate_js',
		array(
			'default' => 'unmin-bootplate-js',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Type Control  - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'minify_bootplate_js',
		array(
			'label' => 'Minify Bootplate JS',
			'description' => 'Use the minified Javascript files (26KB smaller)?',
			'section' => 'performance_settings_section',
			'type' => 'select',
			'choices' => array(
				'unmin-bootplate-js' => 'Unminify JS Files (82KB total)',
				'min-bootplate-js' => 'Minify JS Files (56KB total)',
			),
		)
	);
	
	// Add Navigation Type Setting
	$wp_customize->add_setting(
		'cdn_jquery',
		array(
			'default' => 'jquery_cdn',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Type Control  - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'cdn_jquery',
		array(
			'label' => 'Use jQuery CDN?',
			'description' => 'Load jQuery from Google\'s CDN or local version?',
			'section' => 'performance_settings_section',
			'type' => 'select',
			'choices' => array(
				'no_jquery_cdn' => 'Local jQuery',
				'jquery_cdn' => 'jQuery CDN',
			),
		)
	);
	
	// Add Navigation Type Setting
	$wp_customize->add_setting(
		'enable_browser_cache',
		array(
			'default' => 'no_browser_cache',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Type Control  - Don't forget to update the sanitize_select callback
	$wp_customize->add_control(
		'enable_browser_cache',
		array(
			'label' => 'Enable Browser Cache?',
			'description' => 'Setting removes all the version query strings from resources so browsers can cache them (faster).',
			'section' => 'performance_settings_section',
			'type' => 'select',
			'choices' => array(
				'no_browser_cache' => 'Disabled (No Cache)',
				'browser_cache' => 'Enable (Cache; Faster)',
			),
		)
	);

} // END bootplate_customize_register()
add_action( 'customize_register', 'bootplate_customize_register' );

//bootplate_sanitize_text
function bootplate_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}
//bootplate_sanitize_select
// Needs to be updated as new options are avaliable
function bootplate_sanitize_select( $input ) {
    $valid = array(
        'navbar-inverse' => 'Navbar Dark (default)',
		'navbar-inverse-logo' => 'Navbar Dark w/ Logo',
		'navbar-inverse-logo-bug' => 'Navbar Dark w/ Logo Bug and Text',
		'navbar-light' => 'Navbar Light',
		'navbar-light-logo' => 'Navbar Light w/ Logo',
		'navbar-light-logo-bug' => 'Navbar Light w/ Logo Bug and Text',
		'default-scroll' => 'Scroll (default)',
		'navbar-fixed-top' => 'Fixed to Top',
		'navbar-fixed-bottom' => 'Fixed to Bottom',
		'nav-right' => 'Right Nav (default)',
		'nav-left' => 'Left Nav',
		'nav-split' => 'Split Nav (right and left navs)',
		'unmin-bootplate-css' => 'Unminify Style.css (59KB)',
		'min-bootplate-css' => 'Minify Style.min.css (50KB)',
		'unmin-bootplate-js' => 'Unminify JS Files (77KB total)',
		'min-bootplate-js' => 'Minify JS Files (54KB total)',
		'no_jquery_cdn' => 'Local jQuery',
		'jquery_cdn' => 'jQuery CDN',
		'no_browser_cache' => 'Disabled (No Cache)',
		'browser_cache' => 'Enable (Cache, Faster)'
    );
	
	if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}
//bootplate_sanitize_checkbox
function bootplate_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
