<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Progressus
 */
?>

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
