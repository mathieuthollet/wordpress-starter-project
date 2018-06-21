<?php

namespace STARTER_THEME;


/**
 * Gestion de tinyMCE
 */
class Editor
{

    /**
     * Ajoute le editor.css
     */
    public static function admin_init()
    {
        add_editor_style('assets/css/editor.dist' . (STARTER_THEME_MODE_DEV ? '' : '.min') . '.css');
    }

}

