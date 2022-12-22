<?php
/**
 *
 * Read more about this project at:
 * https://github.com/underlost/_headless
 *
 * @package  _Headless
 */

require_once 'inc/globals.php';

// Post type meta settings
require get_template_directory() . '/inc/post_type/post-meta.php';
require get_template_directory() . '/inc/post_type/attachment-meta.php';
require get_template_directory() . '/inc/gallery-metabox/gallery.php';

// Frontend origin.
require_once 'inc/frontend-origin.php';

// ACF commands.
require_once 'inc/class-acf-commands.php';

// Logging functions.
require_once 'inc/log.php';

// CORS handling.
require_once 'inc/cors.php';

// Admin modifications.
require_once 'inc/admin.php';

// Add Menus.
require_once 'inc/menus.php';

// Add Headless Settings area.
require_once 'inc/acf-options.php';

// Add GraphQL resolvers.
require_once 'inc/graphql/resolvers.php';