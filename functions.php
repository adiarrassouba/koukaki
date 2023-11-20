<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/custom-style.scss' );
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css');
}

add_action( 'wp_enqueue_scripts', 'theme_enqueue_script' );
function theme_enqueue_script() {
    wp_register_script( 'jQuery', 'https://code.jquery.com/jquery-3.7.1.min.js', null, null, true );
    wp_register_script( 'skrollr', 'https://cdnjs.cloudflare.com/ajax/libs/skrollr/0.6.30/skrollr.min.js', null, null, true );
    wp_register_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js', null, null, true );
    wp_register_script( 'script', get_stylesheet_directory_uri() . '/script.js', null, null, true);

    wp_enqueue_script('jQuery');
    wp_enqueue_script('skrollr');
    wp_enqueue_script('swiper-js');
    wp_enqueue_script('script');
}

// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}