<?php
/*
 * Piranha Bytes Italia, template
 */

/*
 * Theme setup
 */
if(!function_exists('pbi_setup')){
    function pbi_setup() {
        // Theme support
        add_theme_support('post-thumbnails');
        add_theme_support('automatic-feed-links');

        // Remove unused crap
        remove_action('wp_head', 'feed_links_extra', 3);
        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action('wp_head', 'parent_post_rel_link');
        remove_action('wp_head', 'start_post_rel_link');
        remove_action('wp_head', 'adjacent_posts_rel_link');
        remove_action('wp_head', 'wp_generator');

        remove_action('wp_head', 'print_emoji_detection_script', 7);
        remove_action('wp_print_styles', 'print_emoji_styles');
    }
}
add_action('after_setup_theme', 'pbi_setup');

add_filter('show_admin_bar', '__return_false');

function pbi_filter_get_the_terms($terms, $postId, $taxonomy) {
    // Filtering categories on category archive
    if(!is_category() || $taxonomy != 'category') {
        return $terms;
    }

    $queried_term = get_queried_object();

    return array_filter($terms, function($l) use ($queried_term) {
        return ($l->term_id != $queried_term->term_id);
    });
}
add_filter('get_the_terms', 'pbi_filter_get_the_terms', 10, 3);

/*
 * Auxiliary functions
 */

 const CATEGORY_CLASS_MAP = array(
    'gothic-saga' => 'gothic1',
    'gothic2' => 'gothic2',
    // TODO: add Notte del Corvo
    'gothic3' => 'gothic3',
    'risen-saga' => 'risen1',
    'risen2' => 'risen2',
    'risen3' => 'risen3',
    'elex' => 'elex'
);

function pbi_reduce_category_to_section_class($term) {
    while(!array_key_exists($term->slug, CATEGORY_CLASS_MAP)) {
        if($term->parent) {
            $term = get_term($term->parent, 'category');
            if(is_wp_error($term) || $term == null) {
                return null;
            }
        }
        else {
            // Got to root, but cannot be mapped
            return null;
        }
    }

    return CATEGORY_CLASS_MAP[$term->slug];
}

function pbi_get_section_class_from_categories($terms) {
    // Each term votes for one section
    $votes = array();
    foreach($terms as $t) {
        $mapped_class = pbi_reduce_category_to_section_class($t);
        if($mapped_class == null) {
            continue;
        }

        if($votes[$mapped_class])
            $votes[$mapped_class] += 1;
        else
            $votes[$mapped_class] = 1;
    }

    if(sizeof($votes) == 0) {
        return 'main';
    }

    // Sort by value (votes) and pick first
    asort($votes);
    foreach($votes as $section => $count) {
        return $section;
    }
}

/* Gets the current post's section class */
function pbi_get_section_class() {
    if(is_singular() && have_posts()) {
        // Single post, must unroll loop
        the_post();
        $section_class = pbi_get_section_class_from_categories(get_the_terms(get_the_ID(), 'category'));
        rewind_posts();

        return $section_class;
    }

    else if(is_category()) {
        return pbi_get_section_class_from_categories(array(get_queried_object()));
    }

    // Default
    return 'main';
}

/* Gets a page's permalink from its slug */
function pbi_page_permalink_from_slug($slug) {
    return get_permalink(get_page_by_path($slug));
}
