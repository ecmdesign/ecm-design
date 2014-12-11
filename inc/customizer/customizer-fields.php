<?php
/**
 * Customizer Fields
 *
 * @package _s
 */

/**
 * Panels
 */
function _s_customizer_add_panels( $wp_customize ) {
	/* Client Setup */
	$wp_customize->add_panel( 'client_setup', array(
		'capability'	=> 'edit_theme_options',
		'title'			=> 'Client Setup',
	) );
}
add_action( 'customize_register', '_s_customizer_add_panels' );

/**
 * Sections
 */
function _s_customizer_add_sections( $wp_customize ) {
	/* Global Settings */
	$wp_customize->add_section( 'global_settings', array(
		'title'			=> 'Global Settings',
		'description'	=> 'Various site-wide settings can be configured below.',
		'panel'			=> 'client_setup',
		'priority'		=> 1,
	) );

	/* Social Media */
	$wp_customize->add_section( 'social_media', array(
		'title'			=> 'Social Media',
		'description'	=> 'Add links to your social media profiles below.',
		'panel'			=> 'client_setup',
		'priority'		=> 2,
	) );

	/* Contact Info */
	$wp_customize->add_section( 'contact_info', array(
		'title'			=> 'Contact Info',
		'description'	=> 'Contact information can be configured below.',
		'panel'			=> 'client_setup',
		'priority'		=> 3,
	) );
}
add_action( 'customize_register', '_s_customizer_add_sections' );

/**
 * Fields
 */
function _s_customizer_add_fields( $wp_customize ) {
	/* Global Settings */
	$wp_customize->add_setting( 'analytics_code' );
	$wp_customize->add_control( 'analytics_code', array(
		'label'			=> 'Analytics Code',
		'description'	=> 'Add your Google Analytics ID here to enable page tracking (e.g. UA-000000-01).',
		'section'		=> 'global_settings',
		'type'			=> 'text',
	) );

	/* Social Media */
	$wp_customize->add_setting( 'facebook_url' );
	$wp_customize->add_control( 'facebook_url', array(
		'label'			=> 'Facebook URL',
		'description'	=> 'Add a link to your Facebook page here.',
		'section'		=> 'social_media',
		'type'			=> 'url',
	) );
	$wp_customize->add_setting( 'twitter_url' );
	$wp_customize->add_control( 'twitter_url', array(
		'label'			=> 'Twitter URL',
		'description'	=> 'Add a link to your Twitter page here.',
		'section'		=> 'social_media',
		'type'			=> 'url',
	) );
	$wp_customize->add_setting( 'gplus_url' );
	$wp_customize->add_control( 'gplus_url', array(
		'label'			=> 'Google+ URL',
		'description'	=> 'Add a link to your Google+ page here.',
		'section'		=> 'social_media',
		'type'			=> 'url',
	) );
	$wp_customize->add_setting( 'linkedin_url' );
	$wp_customize->add_control( 'linkedin_url', array(
		'label'			=> 'LinkedIn URL',
		'description'	=> 'Add a link to your LinkedIn page here.',
		'section'		=> 'social_media',
		'type'			=> 'url',
	) );

	/* Contact Info */
	$wp_customize->add_setting( 'street_address' );
	$wp_customize->add_control( 'street_address', array(
		'label'			=> 'Street Address',
		'description'	=> 'Add the street address of the business.',
		'section'		=> 'contact_info',
		'type'			=> 'text',
	) );
	$wp_customize->add_setting( 'city_state_zip' );
	$wp_customize->add_control( 'city_state_zip', array(
		'label'			=> 'City, State & Zip Code',
		'description'	=> 'Add the city, state and zip code of the business.',
		'section'		=> 'contact_info',
		'type'			=> 'text',
	) );
	$wp_customize->add_setting( 'phone_number' );
	$wp_customize->add_control( 'phone_number', array(
		'label'			=> 'Phone Number',
		'description'	=> 'Add the phone number of the business.',
		'section'		=> 'contact_info',
		'type'			=> 'text',
	) );
	$wp_customize->add_setting( 'contact_email' );
	$wp_customize->add_control( 'contact_email', array(
		'label'			=> 'Contact Email',
		'description'	=> 'Add the contact email address of the business.',
		'section'		=> 'contact_info',
		'type'			=> 'text',
	) );
}
add_action( 'customize_register', '_s_customizer_add_fields' );
