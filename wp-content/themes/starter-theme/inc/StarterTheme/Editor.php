<?php

namespace StarterTheme;


/**
 * Gestion de tinyMCE
 */
class Editor
{

    /**
     * Ajoute le editor.css
     */
    public static function adminInit()
    {
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

