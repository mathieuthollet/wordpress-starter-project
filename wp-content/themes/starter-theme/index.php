<?php

use Timber\Timber;

Timber::$dirname = array('templates');
$context = Timber::get_context();
$context['posts'] = Timber::get_posts();
Timber::render( ['index.twig'], $context );
