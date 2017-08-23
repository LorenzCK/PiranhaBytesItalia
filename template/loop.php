<?php
if(have_posts()) {
    while(have_posts()) {
        the_post();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php the_terms(get_the_ID(), 'category', '<div class="sections">Sezioni:&nbsp;', ', ', '</div>'); ?>

    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

    <?php get_template_part('content'); ?>

</article>

<?php
    }
}
?>

<hr />

<?php
wp_pagenavi();
?>
