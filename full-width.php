<?php
/**
 * Template Name: Full width
 *
 * The template for pages without a sidebar
 *
 * @link https://developer.wordpress.org/themes/template-files-section/page-template-files/
 *
 * @package Progressus
 */

get_header();
get_template_part('template-parts/header', 'page');
?>

<div id="primary" class="content-area container mt-5">
    <?php
    while (have_posts()) :
        the_post();
        get_template_part('template-parts/content', 'page');

        // If comments are open or we have at least one comment, load up the comment template.
        if (comments_open() || get_comments_number()) :
            comments_template();
        endif;
    endwhile;
    ?>
</div>

<?php
get_footer();
