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

    <header class="entry-header head-inner"
            style="background-image: url(<?php echo get_post_meta( $post->ID, 'post_imageheader', true);?>); background-size: cover;">
        <div class="container">
            <div class="row">
                <?php
                $post_id = get_the_ID();
                $post_title = get_post_meta($post_id, 'post_title', true);
                if (empty($post_title)) $post_title = the_title();
                $post_caption = get_post_meta($post_id, 'post_caption', true);
                ?>
                <h1 class="page-title text-center">
                    <?php
                    echo $post_title;
                    if (!empty($post_caption)) echo "<small>$post_caption</small>";
                    ?>
                </h1>
            </div>
        </div>
    </header>

    <?php
    // TODO: import appropriate header, which one - depends on the type of the page.
    ?>

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

</article><!-- #post-<?php the_ID(); ?> -->
