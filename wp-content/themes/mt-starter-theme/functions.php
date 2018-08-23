<?php

require_once(__DIR__ . '/inc/settings.php');
require_once(__DIR__ . '/inc/autoload.php');
require_once(__DIR__ . '/inc/hooks.php');

use Timber\Timber;
Timber::$dirname = array('views');
new Timber();
