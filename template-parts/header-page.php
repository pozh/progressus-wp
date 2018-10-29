<header class="entry-header hero"
        style="background-image: url(<?php echo get_post_meta( $post->ID, 'post_imageheader', true);?>); background-size: cover;">
    <div class="container">
        <?php
        $post_id = get_the_ID();
        $post_title = get_post_meta($post_id, 'post_headtitle', true);
        if (empty($post_title)) $post_title = get_the_title($post_id);
        $post_caption = get_post_meta($post_id, 'post_headcaption', true);
        ?>
        <h1 class="page-title text-center">
            <?php
            echo $post_title;
            if (!empty($post_caption)) echo "<small>$post_caption</small>";
            ?>
        </h1>
    </div>
</header>
