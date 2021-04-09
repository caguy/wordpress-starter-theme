<?php

namespace CustomThemeName;

if (!defined('ABSPATH')) {
    exit;
}

use CustomThemeName\Models\HooksInterface;

/**
 * This class is in charge to add supports to WordPress core features into the theme
 */
class Supports implements HooksInterface
{
    /**
     * @return void
     */
    public function add_theme_supports()
    {
        add_theme_support('post-thumbnails');
        add_theme_support('menus');
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('automatic-feed-links');
        add_theme_support('html5', [
            'comment-list',
            'comment-form',
            'search-form',
            'gallery',
            'caption',
            'style',
            'script'
        ]);
        add_theme_support('customize-selective-refresh-widgets');
    }
    
    /**
     * @return void
     */
    public function hooks()
    {
        add_action("after_setup_theme", [$this, 'add_theme_supports']);
    }
}
