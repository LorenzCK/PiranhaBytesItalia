<?php
get_header();

if(have_posts()) :
    the_post();
?>

<h1><?php the_title(); ?></h1>

<hr class="top-edge" />

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php get_template_part('content'); ?>

</article>

<?php
    comments_template();
?>

<hr class="bottom-edge" />

<php
endif;

get_footer();
?>
