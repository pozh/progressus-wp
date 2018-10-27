<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Progressus
 */
?>

<footer id="footer" class="footers-container">

    <div class="footer">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('footer')) dynamic_sidebar('footer'); ?>
            </div>
        </div>
    </div>

    <?php if (is_active_sidebar('footer-extra')): ?>
    <div class="footer-extra">
        <div class="container">
            <div class="row">
                <?php dynamic_sidebar( 'footer-extra' ); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
