<header class="entry-header hero"
        style="background-image: url(<?php echo get_post_meta( $post->ID, 'post_imageheader', true);?>); background-size: cover;">
    <div class="container">
        <?php
        if ( 'post' === get_post_type() ) :
        ?>
        <div class="entry-meta">
            <?php
            progressus_posted_on();
            progressus_posted_by();
            ?>
        </div><!-- .entry-meta -->
        <?php endif; ?>
    </div>
</header>
