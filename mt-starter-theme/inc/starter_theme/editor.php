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
        add_editor_style('assets/css/editor.css');
    }

}

