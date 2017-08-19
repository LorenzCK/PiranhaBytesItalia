<?php
get_header();
?>

<h1><?php single_term_title('', true); ?></h1>

<?php
get_template_part('loop');
?>

<?php
get_footer();
?>
