<?php
get_header();
?>

<?php
if(have_posts()) {
    the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h1><?php the_title(); ?></h1>

    <?php get_template_part('content'); ?>

</article>

<?php comments_template(); ?>

<!-- Comments here -->

<?php
}
else {
?>

<h1>???</h1>

<p>Contenuto non trovato.</p>

<?php
}
?>

<?php
get_footer();
?>
