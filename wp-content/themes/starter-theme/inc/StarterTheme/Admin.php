<?php

namespace StarterTheme;


/**
 * Gestion admin
 * @package StarterTheme
 */
class Admin
{
    /**
     * Initialisation globale
     */
    public static function init()
    {
        add_action('loginUrl', ['StarterTheme\Admin', 'loginUrl']);
    }


    /**
     * Correction du bug faisant parfois apparaitre "wp/" dans redirect_to
     * @param $loginUrl
     * @return string|string[]
     */
    public static function loginUrl($loginUrl)
    {
        $loginUrl = str_replace('%2Fwp%2Fwp-admin%2F', '%2Fwp-admin%2F', $loginUrl);
        return $loginUrl;
    }

}


