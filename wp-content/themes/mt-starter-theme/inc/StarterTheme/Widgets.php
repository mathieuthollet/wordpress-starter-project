<?php

namespace StarterTheme;

use Timber\Timber,
    Timber\Menu;


/**
 * Fonctions communes à tous les widgets / fonctions hooks sur les widgets non spécifiques
 */
class Widgets
{

    /**
     * Déclaration des zones de widgets du thème
     */
    public static function widgets_init()
    {
        register_sidebar([
            'name' => 'Footer colonne 1',
            'id' => 'footer-col-1',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ]);
        register_sidebar([
            'name' => 'Footer colonne 2',
            'id' => 'footer-col-2',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ]);
        register_sidebar([
            'name' => 'Footer colonne 3',
            'id' => 'footer-col-3',
            'before_widget' => '',
            'after_widget'  => '',
            'before_title'  => '',
            'after_title'   => '',
        ]);
    }


    /**
     * Ajoute les variables globales au contexte Timber
     */
    public static function timber_context( $context )
    {
        $context['footerCol1'] = Timber::get_widgets('footer-col-1');
        $context['footerCol2'] = Timber::get_widgets('footer-col-2');
        $context['footerCol3'] = Timber::get_widgets('footer-col-3');
        return $context;
    }


}

