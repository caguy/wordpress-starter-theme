<?php

namespace CustomThemeName;

if (!defined('ABSPATH')) {
    exit;
}

use CustomThemeName\Models\HooksInterface;

/**
 * This class is in charge of all language-related features
 */
class Languages implements HooksInterface
{
    /**
     * Implements hooks from HookInterface
     *
     * @see ThemeHandler\Models\ThemeInterface
     * @return void
     */
    public function hooks()
    {
        // Déclaration du text domain pour l'i18n
        load_theme_textdomain(get_template(), get_template_directory() . '/languages');
    }
}
