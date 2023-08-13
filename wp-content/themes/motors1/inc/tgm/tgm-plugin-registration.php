<?php

require_once dirname(__FILE__) . '/tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'stm_require_plugins' );

function stm_require_plugins() {
	$plugins_path = get_template_directory() . '/inc/tgm/plugins';
	$plugins = array(
		array(
			'name'               => 'STM Post Type',
			'slug'               => 'stm-post-type',
			'source'             => $plugins_path . '/stm-post-type.zip',
			'required'           => true,
			'force_activation'   => true,
			'version'			 => '2.5.1'
		),
		array(
			'name'               => 'STM Vehicles Listing',
			'slug'               => 'stm_vehicles_listing',
			'source'             => $plugins_path . '/stm_vehicles_listing.zip',
			'required'           => true,
			'force_activation'   => true,
			'version'			 => '3.1'
		),
		array(
			'name'               => 'Custom Icons by Stylemixthemes',
			'slug'               => 'custom_icons_by_stylemixthemes',
			'source'             => $plugins_path . '/custom_icons_by_stylemixthemes.zip',
			'required'           => true,
			'force_activation'   => true,
			'version'			 => '1.0'
		),
		array(
			'name'               => 'STM Importer',
			'slug'               => 'stm_importer',
			'source'             => $plugins_path . '/stm_importer.zip',
			'required'           => true,
			'force_activation'   => true,
			'version'			 => '2.5'
		),
		array(
			'name'               => 'WPBakery Visual Composer',
			'slug'               => 'js_composer',
			'source'             => $plugins_path . '/js_composer.zip',
			'required'           => true,
			'force_activation'   => true,
			'version'            => '4.12.1',
			'external_url'       => 'http://vc.wpbakery.com'
		),
		array(
			'name'               => 'Revolution Slider',
			'slug'               => 'revslider',
			'source'             => $plugins_path . '/revslider.zip',
			'required'           => false,
			'version'            => '5.2.6',
			'external_url'       => 'http://www.themepunch.com/revolution/'
		),
		array(
            'name'              => 'Breadcrumb NavXT',
            'slug'              => 'breadcrumb-navxt',
            'required'          => true,
            'force_activation'  => false,
        ),
        array(
            'name'              => 'Bookly Lite',
            'slug'              => 'bookly-responsive-appointment-booking-tool',
            'required'          => true,
            'force_activation'  => false,
        ),
        array(
            'name'              => 'Contact Form 7',
            'slug'              => 'contact-form-7',
            'required'          => true,
            'force_activation'  => false,
        ),
        array(
            'name'              => 'Woocommerce',
            'slug'              => 'woocommerce',
            'required'          => true,
            'force_activation'  => false,
        ),
        array(
			'name'         => 'Instagram Feed',
			'slug'         => 'instagram-feed',
			'required'     => false,
			'external_url' => 'http://smashballoon.com/instagram-feed/'
		),
		array(
			'name'         => 'MailChimp for WordPress',
			'slug'         => 'mailchimp-for-wp',
			'required'     => false,
			'external_url' => 'https://mc4wp.com/'
		)
	);

	if(stm_is_motorcycle()) {
		$plugins[] = array(
			'name'     => 'AddToAny Share Buttons',
			'slug'     => 'add-to-any',
			'required' => false
		);
	}

	/*If plans*/
	if(stm_is_listing()) {
		$plugins[] = array(
			'name'     => 'Subscriptio',
			'slug'     => 'subscriptio',
			'source'             => $plugins_path . '/subscriptio.zip',
			'version'            => '2.2.2',
			'required'           => true,
		);
	}

	$config = array(
		'id' => 'tgm_message_update_new',
		'strings' => array(
			'nag_type' => 'update-nag'
		)
	);

	tgmpa( $plugins, $config );

}