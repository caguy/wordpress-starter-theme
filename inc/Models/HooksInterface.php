<?php

namespace CustomThemeName\Models;

if (!defined('ABSPATH')) {
    exit;
}

/**
 * This interface must be implemented by all services handling
 * theme features on both admin and front parts
 */

 interface HooksInterface
 {
     /**
      * @return void
      */
     public function hooks();
 }
