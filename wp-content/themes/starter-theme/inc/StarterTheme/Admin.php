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
    static function loginUrl($loginUrl)
    {
        $loginUrl = str_replace('%2Fwp%2Fwp-admin%2F', '%2Fwp-admin%2F', $loginUrl);
        return $loginUrl;
    }

}


