<?php

namespace CustomThemeName\Models;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * This interface must be implemented by all services handling
 * theme features on admin side only
 */

 interface HooksAdminInterface extends HooksInterface
 {
 }
