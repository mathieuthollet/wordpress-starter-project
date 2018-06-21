<?php

namespace STARTER_THEME;

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
        wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js');
        wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
        // Font awesome
        wp_enqueue_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        // Vue JS
        wp_enqueue_script('vue-js', 'https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.min.js');
        // Bootstrap carousel swipe support
        wp_enqueue_script('bc-swipe', get_stylesheet_directory_uri() . '/assets/js/vendor/jquery.bcSwipe.min.js');
        // CSS spécifiques
        wp_enqueue_style('starter-theme', get_stylesheet_directory_uri() . '/assets/css/style.dist' . (STARTER_THEME_MODE_DEV ? '' : '.min') . '.css?v=' . STARTER_THEME_VERSION_JS_CSS);
        wp_enqueue_style('starter-theme-print', get_stylesheet_directory_uri() . '/assets/css/print.dist' . (STARTER_THEME_MODE_DEV ? '' : '.min') . '.css?v=' . STARTER_THEME_VERSION_JS_CSS, [], false, 'print');
        // JS spécifiques
        wp_enqueue_script('starter-theme', get_stylesheet_directory_uri() . '/assets/js/starter-theme.dist' . (STARTER_THEME_MODE_DEV ? '' : '.min') . '.js?v=' . STARTER_THEME_VERSION_JS_CSS);
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
        add_image_size('slider', 1200, 800, true);
        add_image_size('posts-list', 340, 225, true);
        add_image_size('slider-annonce', 770, 500, true);
        add_image_size('single-featured', 385, 250, true);
        add_image_size('standard', 541 , 359, true);
    }


    /**
     * Ajout tailles d'image dans le media uploader
     * @param $sizes
     * @return array
     */
    function image_size_names_choose( $sizes ) {
        return array_merge([
            'standard' => __( 'Format standard' ),
        ], $sizes);
    }


    /**
     * Désactivation des images responsive de Wordpress 4.4 (bug safari)
     */
    public static function max_srcset_image_width() {
        return 1;
    }


    /**
     * Ajoute les variables globales au contexte Timber
     */
    public static function timber_context( $context ) {
        $context['menuHeader'] = new Menu('menu-header');
        return $context;
    }
}

