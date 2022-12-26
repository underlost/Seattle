<?php
/**
 * Register menus
 *
 * @package  Seattle
 */

function register_menus() {
    register_nav_menu( 'header-menu', __( 'Header Menu', 'seattle' ) );
    register_nav_menu('footer-menu', __('Footer Menu', 'seattle'));
    register_nav_menu('featured-menu', __('Featured Links', 'seattle'));
}
add_action( 'after_setup_theme', 'register_menus' );
