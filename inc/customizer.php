<?php
/**
 * Progressus Theme Customizer
 *
 * @package Progressus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function progressus_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('blogname', array(
            'selector' => '.site-title a',
            'render_callback' => 'progressus_customize_partial_blogname',
        ));
        $wp_customize->selective_refresh->add_partial('blogdescription', array(
            'selector' => '.site-description',
            'render_callback' => 'progressus_customize_partial_blogdescription',
        ));
    }

    /**
     * Add our Theme settins Panel
     */
    $wp_customize->add_panel('theme_settings',
        array(
            'title' => __('Extra Settings'),
            'description' => esc_html__('Adjust theme settings.')
        )
    );
    $wp_customize->add_section('blog_layout_settings',
        array(
            'title' => __('Blog Layout Settings'),
            'description' => esc_html__('These are an example of Customizer Custom Controls.'),
            'panel' => 'theme_settings',
            'description_hidden' => 'false',
        )
    );
    $wp_customize->add_setting('progressus_settings[post_content]',
        array(
            'default' => 'excerpt',
            'type' => 'option',
        )
    );
    $wp_customize->add_control('blog_content_control',
        array(
            'label' => __( 'Content Type', 'progressus' ),
            'description' => __('For each article in the Posts Page show'),
            'type' => 'select',
            'section' => 'blog_layout_settings',
            'choices' => array(
                'full' => __( 'Full', 'progressus' ),
                'excerpt' => __( 'Excerpt', 'progressus' ),
            ),
            'settings' => 'progressus_settings[post_content]',
        )
    );

}

add_action('customize_register', 'progressus_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function progressus_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function progressus_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progressus_customize_preview_js()
{
    wp_enqueue_script('progressus-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'progressus_customize_preview_js');

