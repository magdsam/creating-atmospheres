<?php

/*
Plugin Name: Exhibits Custom Post Type
Description: Custom post type for creatingatmospheres.com
Version: 1.0
*/

/**
 * The code to register a WordPress Custom Post Type (CPT) `ca_exhibits`
 * with a custom Taxonomy `ca_exhibits_t<oe`
 * @package ca_exhibits
 */

add_action('init', function () {
    // Post type should be prefixed, singular, and no more than 20 characters.
    register_post_type('ca_exhibit', array(
        // Label should be plural and L10n ready.
        'label'       => __('Exhibits', 'ca_exhibits'),
        'public'      => true,
        'hierarchical' => false,
        'has_archive' => true,
        'rewrite'     => array(
            // Slug should be plural and L10n ready.
            'slug'        => _x('exhibits', 'CPT permalink slug', 'ca_exhibits'),
            'with_front'  => false,
        ),

        // Add support for the new block based editor (Gutenberg) by exposing this CPT via the REST API.
        'show_in_rest' => true,

        /**
         * 'title', 'editor', 'thumbnail' 'author', 'excerpt','custom-fields',
         * 'page-attributes' (menu order),'revisions' (will store revisions),
         * 'trackbacks', 'comments', 'post-formats',
         */
        'supports' => array(
                    'title',
                    'editor',
                    'revisions',
                    'thumbnail',
                    'excerpt',
                    'custom-fields',
                    'page-attributes'
                    ),

        // Url to icon or choose from built-in https://developer.wordpress.org/resource/dashicons/.
        'menu_icon'   => 'dashicons-awards',
    ));

    register_taxonomy(
        'ca_exhibits_category',
        'ca_exhibits',
        array(
            // Label should be plural and L10n ready.
            'label'             => __('Kategorien', 'ca_exhibits'),
            'show_admin_column' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'rewrite'           => array(
                // Slug should be singular and L10n ready..
                'slug' => _x('exhibit-type', 'Custom Category slug', 'ca_exhibit'),
                'with_front' => false,
            ),
        )
    );
});
