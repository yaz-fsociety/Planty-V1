<?php

// Enqueue parent theme styles
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles() {
    // Get the stylesheet directory of the parent theme
    $parent_style = 'parent-style';

    // Enqueue the parent stylesheet
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');

    // Enqueue the child theme stylesheet, making sure it's loaded after the parent's stylesheet
    wp_enqueue_style('child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
}

function add_admin_link_to_menu( $items, $args ) {
    // Si l'utilisateur est connecté
    if ( is_user_logged_in() ) {
        // Ajout du lien Admin au menu
        if ( $args->menu == 'principal' ) {
            $items .= '<li class="menu-item"><a href="http://localhost:8888/Planty/admin/">Admin</a></li>';
        }
    }

    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_admin_link_to_menu', 10, 2 );

