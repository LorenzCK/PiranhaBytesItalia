<?php
/*
 * Piranha Bytes Italia, template
 */

/*
 * Theme setup
 */
if(!function_exists('pbi_setup')){
    function pbi_setup() {
        // This theme uses post thumbnails
        add_theme_support('post-thumbnails');

        // Remove unused crap
        remove_action('wp_head', 'feed_links');
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'index_rel_link');
        remove_action('wp_head', 'parent_post_rel_link');
        remove_action('wp_head', 'start_post_rel_link');
        remove_action('wp_head', 'adjacent_posts_rel_link');
        remove_action('wp_head', 'wp_generator');

        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );
    }
}
add_action('after_setup_theme', 'pbi_setup');

add_filter('show_admin_bar', '__return_false');

/*
 * Auxiliary functions
 */

/* Gets the current post's section class */
function pbi_get_section_class() {
    return 'gothic1';
}

/* Gets a page's permalink from its slug */
function pbi_page_permalink_from_slug($slug) {
    return get_permalink(get_page_by_path($slug));
}
