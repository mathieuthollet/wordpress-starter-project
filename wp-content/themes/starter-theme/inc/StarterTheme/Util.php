<?php

namespace StarterTheme;


/**
 * Fonctions utilitaires
 */
class Util
{
    /**
     * Initialisation globale
     */
    public static function init()
    {
        // Empêche d'avoir des accents dans les noms des medias
        add_filter('sanitize_file_name', 'remove_accents');
    }


    /**
     * Equivalent de get_template_part mais retourne le contenu au lieu de l'afficher
     */
    public static function includeTemplatePart($slug, $name = null)
    {
        ob_start();
        get_template_part($slug, $name);
        $template_part = ob_get_contents();
        ob_end_clean();
        return $template_part;
    }

}