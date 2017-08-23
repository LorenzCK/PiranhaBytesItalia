<?php
get_header();
?>

<h1><?php single_term_title('', true); ?></h1>

<hr class="top-edge" />

<?php
get_template_part('loop');
?>

<hr class="bottom-edge" />

<?php
get_footer();
?>
