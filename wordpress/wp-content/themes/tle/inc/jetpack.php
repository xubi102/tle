<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package xc
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function xc_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'xc_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function xc_jetpack_setup
add_action( 'after_setup_theme', 'xc_jetpack_setup' );

function xc_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function xc_infinite_scroll_render