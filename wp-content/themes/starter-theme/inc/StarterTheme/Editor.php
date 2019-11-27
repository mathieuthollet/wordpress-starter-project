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

}

