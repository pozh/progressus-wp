<?php
/**
 * Helper functions
 *
 * @package progressus
 */


if (!function_exists('progressus_show_excerpt')) {
    /**
     * Figure out if we should show the blog excerpts or full posts
     */
    function progressus_show_excerpt()
    {
        global $post;
        $settings = wp_parse_args(get_option('progressus_settings', array()));

        $show_excerpt = is_array($settings) && 'full' == $settings['post_content'] ? false : true;

        // Check the post format
        // And if it  isn't standard, show the full content
        $format = (false !== get_post_format()) ? get_post_format() : 'standard';
        if ('standard' !== $format)
            $show_excerpt = false;

        // Check to see if the more tag is being used
        // If found, show the full content
        if (strpos($post->post_content, '<!--more-->')) $show_excerpt = false;

        // If we're on a search results page, show the excerpt
        if (is_search()) $show_excerpt = true;

        return $show_excerpt;
    }
}

if (!function_exists('progressus_comments_title')) {
    /**
     * Return caption for the Comments section,
     * based on the given number of comments
     */
    function progressus_comments_title($comment_count) {
        if ( '1' === $comment_count ) {
            printf(
            /* translators: 1: title. */
                esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'progressus' ),
                '<span>' . get_the_title() . '</span>'
            );
        } else {
            printf( // WPCS: XSS OK.
            /* translators: 1: comment count number, 2: title. */
                esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'progressus' ) ),
                number_format_i18n( $comment_count ),
                '<span>' . get_the_title() . '</span>'
            );
        }
    }
}
