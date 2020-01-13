<?php

require_once(__DIR__ . '/inc/settings.php');
require_once(__DIR__ . '/inc/autoload.php');

use Timber\Timber;
Timber::$dirname = array('templates');
new Timber();



/**
 * Initialisation
 */
// Admin
StarterTheme\Admin::init();
// Editor (admin)
StarterTheme\Editor::init();
// Shortcodes
StarterTheme\Shortcodes::init();
// Theme
StarterTheme\Theme::init();
// Post types
// Widgets
StarterTheme\Widgets::init();
StarterTheme\Widgets\Social::init();
// Divers
StarterTheme\Util::init();