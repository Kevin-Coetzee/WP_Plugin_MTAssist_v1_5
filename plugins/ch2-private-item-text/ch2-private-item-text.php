<?php
/*
Plugin Name: Chapter 2 - Private Item Text
Plugin URI:
Description: ''
Author: ylefebvre
Version: 1.0
Author URI: http://ylefebvre.ca/
 */

add_shortcode('private', 'ch2pit_private_shortcode');

function ch2pit_private_shortcode($atts, $content = null)
{
    if (is_user_logged_in()) {
        return '<div class="private">' . $content . '</div>';
    } else {
        $output = '<div class="register">';
        $output .= 'You need to become a member to access ';
        $output .= 'this content.</div>';
        return $output;
    }
}

add_action('wp_enqueue_scripts', 'ch2pit_que_stylesheet');

function ch2pit_que_stylesheet()
{
    wp_enqueue_style('privateshortcodestyle', plugins_url('stylesheet.css', __FILE__));
}
