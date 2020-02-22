<?php

/**
 * @package Shimi_Plugin 
 */

//  namespace Inc;

class ShimiPluginActivate
{
    function __construct()
    {   

    }

    public static function activate() // activate plugin
    {
        // generate Custom Post Type 
        // $this->custom_post_type();
        // flush rewrite rule
        flush_rewrite_rules();
    }


    public static function create_custom_post_type() // create custom post section for this template
    {
        register_post_type( 'book', ['public' => true, 'label' => 'Books' ] );
    
    }



}
