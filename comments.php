&mdash;

<h3><?php comments_number('', 'One comment', '% comments'); ?></h3>


<ol class="comment-list">
    <?php
        wp_list_comments( array(
            'style'       => 'ol',
            'short_ping'  => true,
            'avatar_size' => 46,
        ) );
    ?>
</ol>

<?php comment_form(); ?>