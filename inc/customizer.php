<?php
/**
 * Bootplate Customizer functionality
 *
 * @package WordPress
 * @subpackage Bootplate
 * @since Bootplate 0.6
 */

/* To retreive these settings:
 * <?php echo get_theme_mod( 'copyright_textbox', 'No copyright information has been saved yet.' ); ?>
 * <?php echo get_theme_mod( 'formal_name_textbox', 'No formal name.' ); ?>
 * <?php if( get_theme_mod( 'bootplate_credit' ) == 1) { show it} ?>
 * <?php if( get_theme_mod( 'main-nav-type', 'Scroll (default)' ) == 'Scroll (default)') echo ''; ?>
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
	
	// Add Navigation Type Control
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
	
	// Add Navigation Style Setting
	$wp_customize->add_setting(
		'main_nav_style',
		array(
			'default' => 'navbar-inverse',
			'sanitize_callback' => 'bootplate_sanitize_select',
		)
	);
	
	// Add Navigation Style Control
	$wp_customize->add_control(
		'main_nav_style',
		array(
			'label' => 'Main Nav Style',
			'description' => 'Select the STYLE of main (top) navigation you would like.',
			'section' => 'general_settings_section',
			'type' => 'select',
			'choices' => array(
				'navbar-inverse' => 'Navbar Dark',
				'navbar-inverse-logo' => 'Navbar Dark w/ Logo',
				'navbar-style-default' => 'Navbar Light',
				'navbar-style-light-logo' => 'Navbar Light w/ Logo',
			),
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
        'navbar-inverse' => 'Navbar Dark',
		'navbar-inverse-logo' => 'Navbar Dark w/ Logo',
		'navbar-style-default' => 'Navbar Light',
		'navbar-style-light-logo' => 'Navbar Light w/ Logo',
		'default-scroll' => 'Scroll (default)',
		'navbar-fixed-top' => 'Fixed to Top',
		'navbar-fixed-bottom' => 'Fixed to Bottom',
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
