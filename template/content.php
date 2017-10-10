<div class="content">
<?php the_content('[ Leggi il resto dell’articolo! ]'); ?>
</div>

<?php if(!is_page()) : ?>
<div class="metadata">
    <div class="publish-date">Pubblicato <span><?php the_time(get_option('date_format')); ?></span></div>
    <?php the_tags('<div class="tags">Tag:&nbsp;', ', ', '</div>'); ?>
    <div class="comments"><?php if(!is_singular()) { echo '<a href="'; the_permalink(); echo '#comments">'; } ?><?php comments_number('Nessun commento', 'Un commento', '% commenti'); ?><?php if(!is_singular()) { echo '</a>'; } ?></div>
    <?php edit_post_link('Modifica articolo', '<div class="edit">', '</div>'); ?>
</div>
<?php endif; ?>
