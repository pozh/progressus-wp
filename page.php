<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Progressus
 */

get_header();
?>

<div id="primary" class="content-area container mt-5">
    <?php
    while (have_posts()) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php progressus_post_thumbnail(); ?>

            <div class="entry-content content">
                <?php
                the_content();
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'progressus' ),
                    'after'  => '</div>',
                ) );
                ?>
            </div>
        </article>

    <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
    endwhile;
    ?>
    <?php get_sidebar(); ?>
</div>

<?php
get_footer();
