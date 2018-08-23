<?php

use Timber\Timber;

$context = Timber::get_context();
$context['post'] = Timber::query_post();
Timber::render( array( 'page-' . $post->post_name . '.twig', 'page.twig' ), $context );