<?php

namespace STARTER_THEME;


/**
 * Fonctions utilitaires
 */
class Util
{

    /**
     * Equivalent de get_template_part mais retourne le contenu au lieu de l'afficher
     */
    public static function include_template_part($slug, $name = null)
    {
        ob_start();
        get_template_part($slug, $name);
        $template_part = ob_get_contents();
        ob_end_clean();
        return $template_part;
    }

}