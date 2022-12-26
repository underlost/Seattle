<?php
/**
 *
 * Read more about this project at:
 * https://github.com/underlost/Seattle
 *
 * @package  Seattle
 */

require_once 'inc/globals.php';
require_once 'inc/utils.php';

if (!function_exists('_headless_setup')) :
  function _headless_setup()
  {
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats', array('aside', 'gallery', 'video'));
  }
endif;
add_action('after_setup_theme', '_headless_setup');

add_filter('manage_posts_columns', 'add_img_column');
add_filter('manage_posts_custom_column', 'manage_img_column', 10, 2);

function add_img_column($columns)
{
  $columns = array_slice($columns, 0, 1, true) + array('img' => 'Featured Image') + array_slice($columns, 1, count($columns) - 1, true);
  return $columns;
}

function manage_img_column($column_name, $post_id)
{
  if ($column_name == 'img') {
    echo get_the_post_thumbnail($post_id, 'thumbnail');
  }
  return $column_name;
}

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