<?php

namespace StarterTheme;


/**
 * Gestion admin
 */
class Admin
{

    /**
     * Correction du bug faisant parfois apparaitre "wp/" dans redirect_to
     */
    static function login_url($login_url)
    {
        $login_url = str_replace('%2Fwp%2Fwp-admin%2F', '%2Fwp-admin%2F', $login_url);
        return $login_url;
    }

}


