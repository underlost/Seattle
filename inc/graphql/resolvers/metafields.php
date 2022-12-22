<?php

/**
 * Metafields GraphQL resolver.
 *
 * @package _Headless
 */


add_action('graphql_register_types', function () {

  $post_types = \WPGraphQL::get_allowed_post_types();

  if (!empty($post_types) && is_array($post_types)) {
    foreach ($post_types as $post_type) {
      $post_type_object = get_post_type_object($post_type);

      register_graphql_field($post_type_object->graphql_single_name, 'nsfw', [
        'type' => 'Boolean',
        'description' => __('Flag as NSFW', 'wp-graphql'),
        'resolve' => function ($post) {
          $nsfw = get_post_meta($post->ID, 'nsfw', true);
          return !empty($nsfw) ? $nsfw : '';
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'featured', [
        'type' => 'Boolean',
        'description' => __('Flag as Featured', 'wp-graphql'),
        'resolve' => function ($post) {
          $featured = get_post_meta($post->ID, 'featured', true);
          return !empty($featured) ? $featured : '';
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'lightbox', [
        'type' => 'Boolean',
        'description' => __('Enable Lightbox', 'wp-graphql'),
        'resolve' => function ($post) {
          $lightbox = get_post_meta($post->ID, 'lightbox', true);
          return !empty($lightbox) ? $lightbox : '';
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'cardWidth', [
        'type' => 'String',
        'description' => __('Width of a post/image card', 'wp-graphql'),
        'resolve' => function ($post) {
          $layout = get_post_meta($post->ID, 'display-img-size', true);
          return !empty($layout) ? $layout : 'width-one-thirds';
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'cardHeight', [
        'type' => 'String',
        'description' => __('Height of a post/image card', 'wp-graphql'),
        'resolve' => function ($post) {
          $layout = get_post_meta($post->ID, 'display-img-height', true);
          return !empty($layout) ? $layout : 'height-square';
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'layout', [
        'type' => 'String',
        'description' => __('Layout of Post or page', 'wp-graphql'),
        'resolve' => function ($post) {
          $layout = get_post_meta($post->ID, 'layout', true);
          return !empty($layout) ? $layout : 'default';
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'location', [
        'type' => 'String',
        'description' => __('Optional Location', 'wp-graphql'),
        'resolve' => function ($post) {
          $location = get_post_meta($post->ID, 'location', true);
          return !empty($location) ? $location : null;
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'sourceName', [
        'type' => 'String',
        'description' => __('Optional source name', 'wp-graphql'),
        'resolve' => function ($post) {
          $source_name = get_post_meta($post->ID, 'source-name', true);
          return !empty($source_name) ? $source_name : null;
        }
      ]);

      register_graphql_field($post_type_object->graphql_single_name, 'sourceUrl', [
        'type' => 'String',
        'description' => __('Optional source URL', 'wp-graphql'),
        'resolve' => function ($post) {
          $source_url = get_post_meta($post->ID, 'source-url', true);
          return !empty($source_url) ? $source_url : null;
        }
      ]);

    }
  }
});