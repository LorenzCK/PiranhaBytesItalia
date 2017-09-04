<?php
get_header();
?>

<h1><?php
$queried_object = get_queried_object();
if($queried_object && $queried_object->taxonomy == 'category' && !$queried_object->parent) {
    // Root category, show as "News" to avoid repetition
    echo 'Notizie';
}
else {
    single_term_title('', true);
}
?></h1>

<hr class="top-edge" />

<?php
get_template_part('loop');
?>

<hr class="bottom-edge" />

<?php
get_footer();
?>
