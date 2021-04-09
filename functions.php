<?php

if (!defined('ABSPATH')) {
    exit;
}

use CustomThemeName\Assets;
use CustomThemeName\Languages;
use CustomThemeName\Supports;
use CustomThemeName\ThemeHandler;
use CustomThemeName\Templates;

$composer_autoload = __DIR__ . '/vendor/autoload.php';
if (file_exists($composer_autoload)) {
    require_once $composer_autoload;

    $features = [
        new Assets(),
        new Languages(),
        new Supports(),
        new Templates()
    ];

    $theme = new ThemeHandler($features);
    $theme->run();
} else {
    require_once(get_template_directory() . "/inc/Helper.php");
    CustomThemeName\Helper::setErrorPage(sprintf(__("Le thème %s ne peut pas fonctionner en l'état car Composer n'est pas initialisé. Lancez la commande <code>composer install</code> ou <code>php composer.phar install</code> pour installer les dépendances et utiliser le thème.", "CustomThemeName"), wp_get_theme()->name));
}
