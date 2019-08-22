<?php


/////////////////
// Admin
add_action('login_url', ['StarterTheme\Admin', 'login_url']);


/////////////////
// Editor (admin)
add_action('admin_init', ['StarterTheme\Editor', 'admin_init']);


/////////////////
// Shortcodes


/////////////////
// Theme
add_action('wp_enqueue_scripts', ['StarterTheme\Theme', 'wp_enqueue_scripts']);
add_action('after_setup_theme', ['StarterTheme\Theme', 'register_nav_menus']);
add_action('after_setup_theme', ['StarterTheme\Theme', 'add_image_sizes']);
add_filter('image_size_names_choose', ['StarterTheme\Theme', 'image_size_names_choose']);
add_filter('max_srcset_image_width', ['StarterTheme\Theme', 'max_srcset_image_width']);
add_filter('timber_context', ['StarterTheme\Theme', 'timber_context']);


/////////////////
// Post types


/////////////////
// Widgets
add_action('widgets_init', ['StarterTheme\Widgets', 'widgets_init']);
add_filter('timber_context', ['StarterTheme\Widgets', 'timber_context']);

// Social
add_action('widgets_init', ['StarterTheme\Widgets\Social', 'register']);


///////////////////////
// Divers

// Empêche d'avoir des accents dans les noms des medias
add_filter('sanitize_file_name', 'remove_accents');
