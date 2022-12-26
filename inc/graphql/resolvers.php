<?php
/**
 * Add GraphQL resolvers
 *
 * @package  Seattle
 */

// check if WPGraphQL plugin is active.
if ( function_exists( 'register_graphql_field' ) ) {
    // Add header menu resolver.
    require_once 'resolvers/metafields.php';
    require_once 'resolvers/header-menu.php';
    require_once 'resolvers/gallery.php';
    
}
