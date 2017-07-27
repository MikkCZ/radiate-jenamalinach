<?php
/* Remove unnecessary header information */
function remove_header_info() {
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );
}
add_action( 'init', 'remove_header_info' );

/* Remove wp version meta tag and from rss feed */
add_filter('the_generator', '__return_false');

/* Remove wp version param from any enqueued scripts */
function remove_wp_ver_css_js( $src ) {
	if ( strpos( $src, '?ver=' ) ) {
		$src = remove_query_arg( 'ver', $src );
	}
	return $src;
}
add_filter( 'style_loader_src', 'remove_wp_ver_css_js', 10, 2 );
add_filter( 'script_loader_src', 'remove_wp_ver_css_js', 10, 2 );

/* Disable ping back scanner and complete xmlrpc class. */
add_filter( 'wp_xmlrpc_server_class', '__return_false' );
add_filter( 'xmlrpc_enabled', '__return_false' );

/* Remove xpingback header */
function remove_x_pingback( $headers ) {
    unset( $headers['X-Pingback'] );
    return $headers;
}
add_filter( 'wp_headers', 'remove_x_pingback' );

/* Load child theme languages */
load_theme_textdomain( 'radiate', get_stylesheet_directory() . '/languages' );

/* Register band photo for setting it into the header (overrides radiate_custom_header_setup in inc/custom-header.php) */
function radiate_jenamalinach_custom_header_setup() {
    add_theme_support( 'custom-header', apply_filters( 'radiate_custom_header_args', array(
        'default-image'             => get_stylesheet_directory_uri().'/images/headers/maliny-web.jpg',
        'width'                     => 2000,
        'height'                    => 360,
	) ) );

    register_default_headers( array(
	    'maliny-web' => array(
	    	'url' => get_stylesheet_directory_uri().'/images/headers/maliny-web.jpg',
	    	'thumbnail_url' => get_stylesheet_directory_uri().'/images/headers/maliny-web-thumbnail.jpg',
	    	'description' => 'Je na malinách'
	    ),
		'maliny-web2' => array(
	    	'url' => get_stylesheet_directory_uri().'/images/headers/maliny-web2.jpg',
	    	'thumbnail_url' => get_stylesheet_directory_uri().'/images/headers/maliny-web2-thumbnail.jpg',
	    	'description' => 'Je na malinách'
	    )
      )
    );
}
add_action( 'after_setup_theme', 'radiate_jenamalinach_custom_header_setup', 9 ); // priority default - 1
function unregister_default_radiate_headers() {
    unregister_default_headers( 'header-image-one' );
}
add_action( 'after_setup_theme', 'unregister_default_radiate_headers', 11 ); // priority default + 1

/* Override Radiate original custom.js causing header image to slide up when scrolling */
/*function radiate_jenamalinach_scripts() {
	wp_enqueue_script( 'radiate-jenamalinach-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array( 'jquery' ), false, true );
	wp_dequeue_script( 'radiate-custom-js' );
}
add_action( 'wp_enqueue_scripts', 'radiate_jenamalinach_scripts', 11 ); // priority default + 1*/


/* Enqueue Radiate original stylesheet */
function radiate_css() {
	wp_enqueue_style('radiate', get_template_directory_uri().'/style.css');
}
add_action('wp_enqueue_scripts', 'radiate_css');
