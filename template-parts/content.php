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
    <header class="entry-header">
		<?php
		if ( ! is_singular() ) :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
            <div class="entry-meta">
                <?php
                    progressus_posted_on();
                    progressus_posted_by();
                ?>
            </div>
        <?php endif; ?>
	</header>

	<div class="entry-content">
	    <?php
        progressus_post_thumbnail();

        if ( progressus_show_excerpt() ) : ?>

            <div class="entry-summary" itemprop="text">
                <?php the_excerpt(); ?>
            </div>

        <?php else : ?>

            <div class="entry-content" itemprop="text">
                <?php
                the_content();

                wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'progressus' ),
                'after'  => '</div>',
                ) );
                ?>
            </div>

		<?php
        endif;

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'progressus' ),
			'after'  => '</div>',
		) );
		?>
	</div>

    <?php printf('<p class="more-link"><a href="%s">%s</a></p>',
        esc_url(get_permalink()), __('Continue reading', 'progressus')); ?>

<!--	<footer class="entry-footer">-->
        <?php //progressus_entry_footer(); ?>
<!--	</footer>-->

</article><!-- #post-<?php the_ID(); ?> -->
