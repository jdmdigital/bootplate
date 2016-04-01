<?php
/**
 * Bootplate Customizer functionality
 *
 * @package WordPress
 * @subpackage Bootplate
 * @since Bootplate 0.8
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
	// Add Settings Section
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
				'description' => 'Upload a full logo (218x48) or Logo Bug (48x48), depending on the Nav Style chosen above.',
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
			'description' => 'Show the search icon in the navigation?',
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
			'description' => 'Show &quot;Built with love and Bootplate&quot; at the very bottom.',
			'section' => 'general_settings_section',
			'type' => 'checkbox',
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
		'nav-split' => 'Split Nav (right and left navs)'
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
