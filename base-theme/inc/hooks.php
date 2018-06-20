<?php

/////////////////
// Editor (admin)
add_action('admin_init', ['BASE_THEME\Editor', 'admin_init']);


/////////////////
// Shortcodes


/////////////////
// Theme
add_action('wp_enqueue_scripts', ['BASE_THEME\Theme', 'wp_enqueue_scripts']);
add_action('after_setup_theme', ['BASE_THEME\Theme', 'register_nav_menus']);
add_action('after_setup_theme', ['BASE_THEME\Theme', 'add_image_sizes']);
add_filter('image_size_names_choose', ['BASE_THEME\Theme', 'image_size_names_choose']);
add_filter('max_srcset_image_width', ['BASE_THEME\Theme', 'max_srcset_image_width']);
add_filter('wp_nav_menu_items', ['BASE_THEME\Theme', 'add_search_link_to_wp_menu'], 10, 2);


/////////////////
// Post types


/////////////////
// Widgets


///////////////////////
// Divers

// Empêche d'avoir des accents dans les noms des medias
add_filter('sanitize_file_name', 'remove_accents');
