<?php


/////////////////
// Admin
add_action('loginUrl', ['StarterTheme\Admin', 'loginUrl']);


/////////////////
// Editor (admin)
add_action('admin_init', ['StarterTheme\Editor', 'adminInit']);
add_filter('upload_mimes', ['StarterTheme\Editor', 'uploadMimes'], 1, 1);


/////////////////
// Shortcodes


/////////////////
// Theme
add_action('wp_enqueue_scripts', ['StarterTheme\Theme', 'wpEnqueueScripts']);
add_action('after_setup_theme', ['StarterTheme\Theme', 'registerNavMenus']);
add_action('after_setup_theme', ['StarterTheme\Theme', 'addImageSizes']);
add_filter('image_size_names_choose', ['StarterTheme\Theme', 'imageSizeNamesChoose']);
add_filter('max_srcset_image_width', ['StarterTheme\Theme', 'maxSrcsetImageWidth']);
add_filter('timber_context', ['StarterTheme\Theme', 'timberContext']);


/////////////////
// Post types


/////////////////
// Widgets
add_action('widgets_init', ['StarterTheme\Widgets', 'widgetsInit']);
add_filter('timber_context', ['StarterTheme\Widgets', 'timberContext']);

// Social
add_action('widgets_init', ['StarterTheme\Widgets\Social', 'register']);


///////////////////////
// Divers

// Empêche d'avoir des accents dans les noms des medias
add_filter('sanitize_file_name', 'remove_accents');
