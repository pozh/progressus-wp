<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Progressus
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div class="navbar navbar-expand-lg fixed-top headroom ontop-now animated">
        <div class="container">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <?php
                if (has_custom_logo()) {
                    $custom_logo_id = get_theme_mod( 'custom_logo' );
                    $image_url = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                    printf('<img src="%s" alt=""/>', $image_url[0]);
                }
                else { ?>
                    <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                <?php } ?>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-collapse" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <?php _e('Menu', 'progressus'); ?>
            </button>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container' => 'div',
                'container_class' => 'navbar-collapse collapse',
                'container_id' => 'primary-collapse',
                'menu_class' => 'nav navbar-nav ml-auto',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </div>
