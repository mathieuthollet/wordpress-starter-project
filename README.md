# wordpress-starter-project

Structure de base pour les développements wordpress.

## Arborescence
Le core de wordpress est séparé du wp-content :
* Le core est dans le dossier "wp"
* "wp-content" est dans le dossier "wp-content" au niveau au dessus 

Les modifications du code nécessaires pour gérer cette séparation core / wp-content sont dans :
* wp/config.php
* .htaccess

## Wordpress, plugins, dépendances
Le core de Wordpress, les plugins open source, et les dépendances sont installés via composer.

A la racine du site executer :
* php composer.phar update

La structure de base est dérivée ce celle décrite ici : https://composer.rarst.net/recipe/site-stack/

Dépot pour les plugins : https://wpackagist.org/

## Thème
Le starter thème utilise Webpack pour :
* bundle et min les javascripts
* compiler les SASS

Pour installer Webpack, utiliser npm dans le dossier _dev

Utilise Timber pour avoir les templates en Twig.
