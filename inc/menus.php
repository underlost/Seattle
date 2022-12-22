<?php
/**
 * Register menus
 *
 * @package  _Headless
 */

function register_menus() {
    register_nav_menu( 'header-menu', __( 'Header Menu', '_headless' ) );
    register_nav_menu('footer-menu', __('Footer Menu', '_headless'));
    register_nav_menu('featured-menu', __('Featured Links', '_headless'));
}
add_action( 'after_setup_theme', 'register_menus' );
