<?php
if(have_posts()) {
    while(have_posts()) {
        the_post();

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

    <div class="content">
    <?php the_content(); ?>
    </div>

</article>

<?php

    }
}
?>
