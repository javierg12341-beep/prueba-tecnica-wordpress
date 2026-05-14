<?php

add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'main-menu' => 'Menú principal',
    ]);
});

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style(
        'tailwind-style',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        filemtime(get_template_directory() . '/assets/css/main.css')
    );

    wp_enqueue_script(
        'main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        [],
        filemtime(get_template_directory() . '/assets/js/main.js'),
        true
    );

     wp_enqueue_script(
        'nav-js',
        get_template_directory_uri() . '/assets/js/nav.js',
        [],
        filemtime(get_template_directory() . '/assets/js/nav.js'),
        true
    );

    wp_enqueue_script(
        'carrousel-js',
        get_template_directory_uri() . '/assets/js/carrousel.js',
        [],
        filemtime(get_template_directory() . '/assets/js/carrousel.js'),
        true
    );

    wp_enqueue_script(
        'accordion-js',
        get_template_directory_uri() . '/assets/js/accordion.js',
        [],
        filemtime(get_template_directory() . '/assets/js/accordion.js'),
        true
    );
});


// Quitar editor de bloques de Gutenberg para las paginas seleccionadas
add_filter('use_block_editor_for_post', function ($enabled, $post) {

    if (!$post) {
        return $enabled;
    }

    $template = get_page_template_slug($post->ID);

    if ($template === 'page-home.php') {
        return false;
    }

    return $enabled;

}, 10, 2);