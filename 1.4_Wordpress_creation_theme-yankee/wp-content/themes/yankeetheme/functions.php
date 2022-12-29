<?php

// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');


function yankee_register_assets()
{
    // declaration de jquery
    wp_enqueue_script('jquery');

    // declaration du JS
    wp_enqueue_script(
        'yankee',
        get_template_directory_uri() . '/js/script.js',
        array('jquery'),
        '1.0',
        true,
    );

    // declaration du style.css a la racine du site
    wp_enqueue_style(
        'yankeestyle',
        get_stylesheet_uri(),
        array(),
        '1.0',
    );

    // declaration du header.css
    wp_enqueue_style(
        'yankeeheader',
        get_template_directory_uri() . '/css/header.css',
        array(),
        '1.0',
    );
    // declaration du top.css pour le part "top"
    wp_enqueue_style(
        'yankeetop',
        get_template_directory_uri() . '/css/parts/top.css',
        array('yankeeheader'),
        '1.0',
    );
    // declaration du front-page.css
    wp_enqueue_style(
        'yankeefrontpage',
        get_template_directory_uri() . '/css/front-page.css',
        array('yankeetop'),
        '1.0',
    );
    // declaration du blog.css
    wp_enqueue_style(
        'yankeeblog',
        get_template_directory_uri() . '/css/blog.css',
        array('yankeefrontpage'),
        '1.0',
    );
    // declaration du content-card.css
    wp_enqueue_style(
        'yankeecontentcard',
        get_template_directory_uri() . '/css/parts/content-card.css',
        array('yankeeblog'),
        '1.0',
    );
}

add_action('wp_enqueue_scripts', 'yankee_register_assets');


// Ajout des element pour creer la barre de menu
register_nav_menus(
    array(
        'main' => 'Menu principal',
        'footerservice' => 'Menu Service',
        'footer' => 'Bas de page',
    ),
);
