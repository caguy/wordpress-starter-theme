<?php

namespace CustomThemeName\Models;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * This interface must be implemented by all services handling
 * theme features on front side only
 */

 interface HooksFrontInterface extends HooksInterface
 {
 }
