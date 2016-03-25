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
	
	// Add Bootplate Credit Setting
	$wp_customize->add_setting(
		'bootplate_credit'
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
	
	
	// Add Copyright Setting
	$wp_customize->add_setting(
		'copyright_textbox',
		array(
			'default' => 'Default copyright text',
		)
	);
	
	// Add Copyright Setting Control
	$wp_customize->add_control(
		'copyright_textbox',
		array(
			'label' => 'Copyright text',
			'description' => 'This isn\'t used yet. This is a description.',
			'section' => 'example_section_one',
			'type' => 'text',
		)
	);
	
	

} // END bootplate_customize_register()
add_action( 'customize_register', 'bootplate_customize_register' );


