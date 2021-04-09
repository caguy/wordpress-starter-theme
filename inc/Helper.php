<?php

namespace CustomThemeName;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * This class provides helper functions to be used anywhere in the site
 */
class Helper
{
    /**
     * This function is in charge of showing the error page instead of the actual
     * WordPress template file when a technical error occurs.
     * It also displays an error notification on the back office.
     * Must only be used if general configuration fails during development
     * process and should not be served to final users.
     *
     * @param string $message
     * @return void
     */
    public static function setErrorPage($message = "")
    {
        add_action(
            'admin_notices',
            function () use ($message) {
                echo "<div class=\"error\"><p><strong>" . __("Erreur de configuration du thème", "CustomThemeName") . "</strong></p>";
                if ($message) {
                    echo "<p>" . $message . "</p>";
                }
                echo "</div>";
            }
        );

        add_filter(
            'template_include',
            function ($template) {
                return get_stylesheet_directory() . '/error.php';
            }
        );
    }

    /**
     * This function returns the slug of the menu assigned to a given menu location
     *
     * @param   string  $menu_location  The menu location slug
     * @return  string\null  The inner menu slug
     */
    public static function getMenuFromLocation($location_slug = "")
    {
        $theme_locations = get_nav_menu_locations();

        if (!sizeof($theme_locations) > 0) {
            return;
        }

        $menu = @get_term($theme_locations[$location_slug], 'nav_menu');
        
        if (!$menu || is_wp_error($menu)) {
            return;
        }

        return $menu->slug;
    }
}
