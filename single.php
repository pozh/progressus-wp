<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Progressus
 */

get_header();
get_template_part('template-parts/header', 'blog');
?>

	<div id="primary" class="content-area container mt-5">
		<main id="main" class="site-main">

		<?php
		while ( have_posts() ) :
            the_title('<h1 class="post-title">', '</h1>');
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
			the_post_navigation();

			/**
             * If comments are open or we have at least one comment,
             * load up the comment template.
             */
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
