<?php $post_id = get_the_ID(); ?>
<header class="entry-header hero"
        style="background-image: url(<?php echo get_post_meta( $post_id, 'post_imageheader', true);?>); background-size: cover;">
    <div class="container">
        <h1 class="page-title text-center">
            <?php
            echo get_the_title($post_id);
            if (!empty($post_caption)) echo "<small>$post_caption</small>";
            ?>
        </h1>
        <div class="entry-meta">
            <?php /*
            progressus_posted_on();
            progressus_posted_by();*/
            ?>
        </div>
    </div>
</header>
