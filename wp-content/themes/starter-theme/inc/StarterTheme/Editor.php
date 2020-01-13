<?php

namespace StarterTheme;


/**
 * Gestion de tinyMCE
 */
class Editor
{
    /**
     * Initialisation globale
     */
    public static function init()
    {
        add_action('admin_init', ['StarterTheme\Editor', 'adminInit']);
        add_filter('upload_mimes', ['StarterTheme\Editor', 'uploadMimes'], 1, 1);
    }


    /**
     * Ajoute le editor.css
     */
    public static function adminInit()
    {
        add_theme_support('editor-styles');
        add_editor_style('assets/css/editor.css');
    }


    /**
     * Autorise l'upload d'images svg
     */
    public static function uploadMimes($mime_types)
    {
        $mime_types['svg'] = 'image/svg+xml';
        return $mime_types;
    }
}

