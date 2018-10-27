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
<div id="page" class="site">
    <div class="navbar navbar-expand-lg fixed-top headroom ontop-now animated">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span
                            class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php
                    if(has_custom_logo()) the_custom_logo();
                    else { ?>
                        <h1 class="site-title"><?php bloginfo('name'); ?></h1>
                    <?php } ?>
                </a>
            </div>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_id' => 'primary-menu',
                'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
                'container' => 'div',
                'container_class' => 'navbar-collapse collapse',
                'container_id' => 'bs-example-navbar-collapse-1',
                'menu_class' => 'nav navbar-nav ml-auto',
                'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                'walker' => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
    </div>

    <?php
    // TODO: import appropriate header below, which one - depends on the type of the page.
    ?>
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
