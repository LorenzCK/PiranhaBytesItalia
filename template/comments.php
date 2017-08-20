
<hr />

<?php if(get_comments_number() > 0) { ?>

    <h2 id="comments">Commenti</h2>

    <div class="comment-list">
        <?php wp_list_comments(array('callback' => 'pbi_comment_renderer', 'style' => 'div' )); ?>
    </div>

<?php } ?>

<?php
if(comments_open()) {
    comment_form(array(
        'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
        'title_reply_after'  => '</h2>'
    ));
}
else {
?>

    <p>Non è possibile scrivere nuovi commenti in questo articolo.</p>

<?php
}
?>
