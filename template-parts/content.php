<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Progressus
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php if (!is_singular()) : ?>
        <header class="entry-header">
            <?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
            <div class="entry-meta">
                <?php
                progressus_posted_on();
                progressus_posted_by();
                ?>
            </div>
        </header>
    <?php endif; ?>

    <div class="entry-content">
        <?php
        if (!is_singular()) :
            progressus_post_thumbnail();

            if (progressus_show_excerpt()) : ?>
                <div class="entry-summary" itemprop="text">
                    <?php the_excerpt(); ?>
                </div>
            <?php else : ?>
                <div class="entry-content" itemprop="text">
                    <?php the_content(); ?>
                </div>
            <?php endif;
                wp_link_pages(array(
                    'before' => '<div class="page-links">' . __('Pages:', 'progressus'),
                    'after' => '</div>',
                ));
        else : ?>
            <div class="entry-content" itemprop="text">
                <?php the_content(); ?>
            </div>
        <?php endif; ?>
    </div>

    <?php if (!is_singular()) printf('<p class="more-link"><a href="%s">%s</a></p>',
        esc_url(get_permalink()), __('Continue reading', 'progressus')); ?>

    <!--	<footer class="entry-footer">-->
    <?php //progressus_entry_footer();
    ?>
    <!--	</footer>-->

</article><!-- #post-<?php the_ID(); ?> -->
