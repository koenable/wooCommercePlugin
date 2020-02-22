<?php

/**
 * @package Shimi_Plugin 
 */

class ShimiPluginActivate
{

    public static function activate()
    {
        // generate Custom Post Type 
        // $this->custom_post_type();
        // flush rewrite rule
        flush_rewrite_rules();
    }
}
