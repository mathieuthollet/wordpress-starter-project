<?php

namespace StarterTheme;

use Timber\Menu;


/**
 * Gestion du thème
 */
class Theme
{

     /**
     * Ajout des fichiers JS et CSS
     */
    public static function wp_enqueue_scripts()
    {
        // jQuery
        wp_enqueue_script('jquery');
        wp_enqueue_script('jquery-migrate');
        // Bootstrap
        wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js');
        wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css');
        // Font awesome
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        // Vue JS
        wp_enqueue_script('vue-js', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js');
        // CSS spécifiques
        wp_enqueue_style('starter-theme', get_stylesheet_directory_uri() . '/assets/css/theme.css', [], STARTER_THEME_VERSION_JS_CSS);
        wp_enqueue_style('starter-theme-print', get_stylesheet_directory_uri() . '/assets/css/print.css', [], STARTER_THEME_VERSION_JS_CSS, [], false, 'print');
        // JS spécifiques
        wp_enqueue_script('starter-theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', [], STARTER_THEME_VERSION_JS_CSS, true);
    }


    /**
     * Déclare les menus du thème
     */
    public static function register_nav_menus()
    {
        register_nav_menu('menu-header', __('Menu header', 'starter-theme'));
    }


    /**
     * Déclaration ds tailles de thumbnails
     */
    public static function add_image_sizes()
    {
        add_theme_support('post-thumbnails');
        //add_image_size('...', 1200, 800, true);
    }


    /**
     * Ajout tailles d'image dans le media uploader
     * @param $sizes
     * @return array
     */
    function image_size_names_choose( $sizes )
    {
        return array_merge([
            //'...' => __( '...' ),
        ], $sizes);
    }


    /**
     * Désactivation des images responsive de Wordpress 4.4 (bug safari)
     */
    public static function max_srcset_image_width()
    {
        return 1;
    }


    /**
     * Ajoute les variables globales au contexte Timber
     */
    public static function timber_context( $context )
    {
        $context['menuHeader'] = new Menu('menu-header');
        return $context;
    }
}

