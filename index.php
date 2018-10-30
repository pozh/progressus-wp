<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Progressus
 */

get_header();

?>
    <header class="entry-header hero"
            style="background-image: url(<?php echo get_header_image(); ?>); background-size: cover;">
        <div class="container">
            <h1 class="page-title text-center">
                <?php bloginfo('name'); ?>
                <small><?php bloginfo('description'); ?></small>
            </h1>
        </div>
    </header>

    <div id="primary" class="content-area container my-7 ">
        <main id="main" class="site-main">

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();

                    /**
                     * Include the Post-Type-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                     */
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                the_posts_navigation();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
