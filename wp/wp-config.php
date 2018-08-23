<?php

// Séparation core wordpress de wp-content
define( 'WP_CONTENT_DIR', ABSPATH . '/../wp-content' );

// Inclusion vendor (Timber, etc.)
require_once(ABSPATH . '/../vendor/autoload.php');

// Coller en dessous le contenu normal du fichier wp-config.php