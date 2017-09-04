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

        // Additional image sizes
        add_image_size('large-retina', 1280, 1280, false);

        // Additional shortcodes
        add_shortcode('youtube', 'pbi_youtube_shortcode_handler');

        // Remove content processing
        remove_filter('the_content', 'wpautop');
        remove_filter('the_excerpt', 'wpautop');

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
 * Admin meta box
 */
function pbi_post_information_writer() {
    ?>
        <p>
            <b>Immagini:</b> <code>[image id=""]</code><br />
            Parametri opzionali:
                <code>size="small|medium|large|thumbnail"</code>,
                <code>link="true|false"</code>,
                <code>didascaly=""</code>,
                <code>class="alignleft|aligncenter|alignright"</code>.
        </p>

        <p>
            <b>Youtube:</b> <code>[youtube id=""]</code><br />
            Parametri opzionali:
            <code>class="alignleft|aligncenter|alignright"</code>.
        </p>

        <p><a href="https://docs.google.com/document/d/1WbKZUuIZZ8uA_x0S_G5-6A3RVTY1C1Vg8QSmwIL5ESE/edit?usp=sharing">Guida contenuti Piranha Bytes Italia</a> su Google Docs.</p>
    <?php
}

function pbi_register_meta_box() {
    add_meta_box(
        'pbi_post_information',
        'Informazioni per la redazione',
        'pbi_post_information_writer',
        'post',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'pbi_register_meta_box');

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
    if(is_single() && have_posts()) {
        // Single post, must unroll loop
        the_post();
        $section_class = pbi_get_section_class_from_categories(get_the_terms(get_the_ID(), 'category'));
        rewind_posts();

        return $section_class;
    }

    else if(is_page()) {
        $page_class_name = get_field('game_wrapper_class');
        if($page_class_name) {
            return trim($page_class_name);
        }
    }

    else if(is_category()) {
        return pbi_get_section_class_from_categories(array(get_queried_object()));
    }

    // Default
    return 'main';
}

/* Gets a page's permalink from its slug */
function pbi_page_permalink_from_slug($slug) {
    $pages = get_posts(array(
        'name'        => $slug,
        'post_type'   => 'page',
        'post_status' => 'publish',
        'numberposts' => 1
    ));
    if($pages) {
        return get_permalink($pages[0]);
    }
    else {
        return '#not-found';
    }
}

/* Gets a category's permalink from its slug */
function pbi_category_link_from_slug($slug) {
    $term_link = get_term_link($slug, 'category');
    if(is_wp_error($term_link)) {
        return '#';
    }
    return $term_link;
}

/* Checks whether the current page if a subpage of another page (by slug) */
function pbi_is_subpage($parent_slug) {
    if(!is_page()) {
        // Is this even a page?
        return false;
    }
    
    global $post;
    if(!$post->post_parent) {
        return false;
    }

    $parent = get_post($post->post_parent);
    return ($parent->post_name == $parent_slug);
}

function pbi_comment_renderer($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    
    switch($comment->comment_type){
        case '' : ?>

<div <?php comment_class('row'); ?> id="comment-<?php comment_ID(); ?>">
    <div class="comment-avatar col-xs-3 col-sm-2">
        <?php echo get_avatar($comment, 80, null, get_comment_author()); ?><br />
        <?php comment_author_link(); ?>
    </div>

    <div class="comment-content col-xs-9 col-sm-10">
        <div class="comment-meta">
            <div class="comment-date">
                <a class="comment-permalink" name="comment-<?php echo comment_ID(); ?>" href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>"><?php echo get_comment_date(); ?> alle <?php echo get_comment_time(); ?></a>
            </div>
            <div class="comment-links">
                <?php comment_reply_link(array_merge($args, array(
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'reply_text' => 'Rispondi',
                ))); ?>
                <?php edit_comment_link('(Modifica commento)', ''); ?>
            </div>
        </div>

        <div class="comment-body">
            <?php comment_text(); ?>
        </div>
    </div>

            <?php
            break;
    }
}

/* SHORTCODES */

function pbi_youtube_shortcode_handler($atts, $content = null) {
    $a = shortcode_atts(array(
        'id' => '',
        'width' => 600,
        'class' => null
    ), $atts, 'youtube');
    
    if(!$a['id']) {
        return 'No ID given';
    }
    if(!is_int($a['width'])) {
        return 'Non-integer width';
    }

    $ret = '<div class="video-player youtube';
    if($a['class']) {
        $ret .= ' ' . $a['class'];
    }
    $ret .= '"><div><iframe width="' . $a['width'] . '" height="' . intval($a['width'] * 0.5625) . '" src="https://www.youtube-nocookie.com/embed/' . $a['id'] . '?rel=0" frameborder="0" allowfullscreen="allowfullscreen"></iframe></div></div>';

    return $ret;
}
