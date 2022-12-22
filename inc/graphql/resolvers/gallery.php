<?php

/**
 * Gallery Images GraphQL resolver.
 *
 * @package _Headless
 */

/**
 * Get header menu items
 */

add_action('graphql_register_types', function () {
  register_graphql_object_type(
    'galleryImage',
    [
      'description' => __('Gallery Image', '_headless'),
      'fields'      => [
        'id'       => [
          'type'        => 'String',
          'description' => 'user id'
        ],
        'sourceUrl' => [
          'type'        => 'String',
          'description' => 'image url'
        ],
        'altText' => [
          'type'        => 'String',
          'description' => 'image alt text'
        ],
        'caption' => [
          'type'        => 'String',
          'description' => 'image caption'
        ],
        'title' => [
          'type'        => 'String',
          'description' => 'image title'
        ],
        'description' => [
          'type'        => 'String',
          'description' => 'image description'
        ],
      ],
    ]
  );

  $post_types = \WPGraphQL::get_allowed_post_types();

  if (!empty($post_types) && is_array($post_types)) {
    foreach ($post_types as $post_type) {
      $post_type_object = get_post_type_object($post_type);

      register_graphql_field($post_type_object->graphql_single_name, 'galleryImages', [
        'type'        => ['list_of' => 'galleryImage'],
        'description' => __('Images from image galery', 'wp-graphql'),
        'resolve'     => function ($post) {
          $images_array = [];
          $images = get_post_meta($post->ID, 'seattle_gallery_id', true);

          foreach ($images as $image_ID) {
            $image = [
              'id' => $image_ID,
              'sourceUrl' => wp_get_attachment_url($image_ID),
              'altText' => get_post_meta($image_ID, '_wp_attachment_image_alt', true),
              'caption' => get_post($image_ID)->post_excerpt,
              'title' => get_post($image_ID)->post_title,
              'description' => get_post($image_ID)->post_content,
            ];

            $images_array[] = $image;
          }

          return $images_array;
        }
      ]);
    }
  }
});