<?php

namespace CustomThemeName;

if (!defined('ABSPATH')) {
    exit;
}

use CustomThemeName\Models\HooksInterface;

/**
 * This class is in charge of loading all needed assets into the theme
 */
class Assets implements HooksInterface
{
    /**
     * @return void
     */
    public function enqueue()
    {
        wp_enqueue_style('site_main_css', get_template_directory_uri() . '/assets/build/index.css');
        wp_enqueue_script('site_main_js', get_template_directory_uri() . '/assets/build/index.js', [], wp_get_theme()->version, true);
    }

    /**
     * Implements hooks from HookInterface
     *
     * @see ThemeHandler\Models\ThemeInterface
     * @return void
     */
    public function hooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }
}
