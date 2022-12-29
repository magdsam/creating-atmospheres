<?php

/*
Plugin Name: Students Custom Post Type
Description: Custom post type for creatingatmospheres.com
Version: 1.0
*/

/**
 * The code to register a WordPress Custom Post Type (CPT) `ca_students`
 * with a custom Taxonomy `ca_students_tag`
 * @package ca_students
 */

add_action('init', function () {
    // Post type should be prefixed, singular, and no more than 20 characters.
    register_post_type('ca_student', array(
        // Label should be plural and L10n ready.
        'label'       => __('Students', 'ca_students'),
        'public'      => true,
        'hierarchical' => false,
        'has_archive' => true,
        'rewrite'     => array(
            // Slug should be plural and L10n ready.
            'slug'        => _x('students', 'CPT permalink slug', 'ca_students'),
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
        'menu_icon'   => 'dashicons-groups',
    ));

    register_taxonomy(
        'ca_students_category',
        'ca_students',
        array(
            // Label should be plural and L10n ready.
            'label'             => __('Kategorien', 'ca_students'),
            'show_admin_column' => true,
            'show_in_rest' => true,
            'hierarchical' => true,
            'rewrite'           => array(
                // Slug should be singular and L10n ready..
                'slug' => _x('students', 'Custom Category slug', 'ca_student'),
                'with_front' => false,
            ),
        )
    );
});
