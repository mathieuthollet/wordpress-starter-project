<?php

/////////////////
// Editor (admin)
add_action('admin_init', ['STARTER_THEME\Editor', 'admin_init']);


/////////////////
// Shortcodes


/////////////////
// Theme
add_action('wp_enqueue_scripts', ['STARTER_THEME\Theme', 'wp_enqueue_scripts']);
add_action('after_setup_theme', ['STARTER_THEME\Theme', 'register_nav_menus']);
add_action('after_setup_theme', ['STARTER_THEME\Theme', 'add_image_sizes']);
add_filter('image_size_names_choose', ['STARTER_THEME\Theme', 'image_size_names_choose']);
add_filter('max_srcset_image_width', ['STARTER_THEME\Theme', 'max_srcset_image_width']);
add_filter('wp_nav_menu_items', ['STARTER_THEME\Theme', 'add_search_link_to_wp_menu'], 10, 2);
add_filter('timber_context', ['STARTER_THEME\Theme', 'timber_context']);


/////////////////
// Post types


/////////////////
// Widgets


///////////////////////
// Divers

// Empêche d'avoir des accents dans les noms des medias
add_filter('sanitize_file_name', 'remove_accents');
