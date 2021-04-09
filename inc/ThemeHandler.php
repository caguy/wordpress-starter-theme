<?php

namespace CustomThemeName;

if (!defined('ABSPATH')) {
    exit;
}

use CustomThemeName\Models\HooksInterface;
use CustomThemeName\Models\HooksAdminInterface;
use CustomThemeName\Models\HooksFrontInterface;

/**
 * This class is responsible of checking requirements and then
 * lanuching all features related to the theme
 */

class ThemeHandler implements HooksInterface
{
    // All the actions that must be hooked to make the theme work
    protected $actions = [];

    /**
     * @param array $actions
     */
    public function __construct(array $actions = [])
    {
        $this->actions = $actions;
    }

    /**
     * @return boolean
     */
    public function canBeRun()
    {
        return true;
    }

    public function run()
    {
        if ($this->canBeRun()) {
            $this->hooks();
        }
    }

    /**
     * @return array
     */
    public function getActions()
    {
        return $this->actions;
    }

    /**
     * Implements hooks from HookInterface
     *
     * @see ThemeHandler\Models\ThemeInterface
     * @return void
     */
    public function hooks()
    {
        foreach ($this->getActions() as $key => $action) {
            switch (true) {
                case $action instanceof HooksAdminInterface:
                    if (is_admin()) {
                        $action->hooks();
                    }
                    break;
                case $action instanceof HooksFrontInterface:
                    if (!is_admin()) {
                        $action->hooks();
                    }
                    break;
                case $action instanceof HooksInterface:
                    $action->hooks();
                    break;
            }
        }
    }
}
