<?php

/**
 * Theme filters.
 */

namespace App;

/**
 * Add "… Continued" to the excerpt.
 *
 * @return string
 */
add_filter('excerpt_more', function () {
    return sprintf(' &hellip; <a href="%s">%s</a>', get_permalink(), __('Continued', 'sage'));
});


/**
 * Add Adobe Fonts Link
 */
add_filter( 'wp_head', function () {
    echo '<link rel="stylesheet" href="https://use.typekit.net/fgy8vid.css">';
});

/**
 * Show Adobe font in editor
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style('adobe-fonts', 'https://use.typekit.net/fgy8vid.css');
});

