<?php

namespace CustomThemeName;

if (!defined('ABSPATH')) {
    exit;
}

use CustomThemeName\Models\HooksInterface;
use CustomThemeName\Helper;
use Timber;

/**
 * This class is in charge of setting up the theme to use
 * Timber as template handler
 */
class Templates extends Timber\Site implements HooksInterface
{
    protected $menu_locations = [];

    /**
     * Initialize Timber to use twig templates and configures it
     *
     * @return void
     */
    public function __construct()
    {
        new Timber\Timber();

        /**
        * Sets the directories to find .twig files
        */
        Timber::$dirname = array('templates', 'templates');

        /**
        * By default, Timber does NOT autoescape values.
        */
        Timber::$autoescape = false;

        /**
        * Declare the list of menu locations here
        */
        $this->menu_locations = [
            "main_menu"      => __('Menu principal', 'CustomThemeName'),
            "footer_menu"    => __('Menu de bas de page', 'CustomThemeName')
        ];

        register_nav_menus($this->menu_locations);

        register_sidebar([
            'id' => 'sidebar',
            'name' => 'Sidebar',
        ]);
    }

    /**
     * Add global informations to the timber context
     * so they can be used throughout all templates
     */
    public function addToContext($context)
    {
        // Send the menus to the template
        foreach ($this->menu_locations as $location_slug => $location_name) {
            $menu_slug = Helper::getMenuFromLocation($location_slug);

            if ($menu_slug) {
                $context[$location_slug] = new \Timber\Menu($menu_slug);
            }
        }

        return $context;
    }

    /**
     * Add global informations to the timber context
     * so they can be used throughout all templates
     */
    public function addToTwig($context)
    {
        $twig->addExtension(new Twig\Extension\StringLoaderExtension());
        // $twig->addFilter(new Twig\TwigFilter('myfoo', [$this, 'myfoo'])); Adds the function myFoo (to create inside thss class) to Timber
        return $twig;
    }

    /**
     * Implements hooks from HookInterface
     *
     * @see ThemeHandler\Models\ThemeInterface
     * @return void
     */
    public function hooks()
    {
        add_filter('timber/context', [$this, 'addToContext']);
        // add_filter('timber/twig', [$this, 'addToTwig')]; Uncomment to add functions to Timber and see addToTwig method
    }
}
