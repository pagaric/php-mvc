<?php

/**
 * Import de l'autoloader
 */
require __DIR__. '/../utils/autoloader.php';
require __DIR__. '/../utils/helpers.php';

/**
 * Chemin vers le dossier vues
 */
define('VIEWS', dirname(__DIR__) .DIRECTORY_SEPARATOR. 'views' .DIRECTORY_SEPARATOR);

/**
 * Chemin vers le dossier public
 */
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) .DIRECTORY_SEPARATOR);

/**
 * Chemin du fichier config.php
 */
define('CONFIG', dirname(__DIR__) .DIRECTORY_SEPARATOR. 'config.php');

/**
 * Nom du dossier pour l'autoload
 */
define('AUTOLOAD', 'app');

/**
 * import des routes
 */
require_once __DIR__. '/../app/Routes/routesWeb.php';