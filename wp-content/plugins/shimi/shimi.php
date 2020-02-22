<?php

/**
 * @package simpleFreightCharge 
 */

/*
Plugin Name: Shimi 
PLugin URI: http://simpleFreightCharge.com/plugin
Description: This plugun helps calculate accurate freight delivery charges
Version: 1.0.0
Authon: Baholo Mokoena  

*/


// First check the person whos accessing this plugin is doing it from the correct source, or through the correct way
// If not, terminate access to plugin. This can be done with either one of these statements

// if (! defined('ABSPATH') ){ die; }

// defined( 'ABSPATH' ) or die( 'You are not allowed to access this' );

// if (!function_exists('add_action')) {
//     echo 'File cannot be accessed due to a failed conditon';
//     exit;
// }


// shimi plugin class

class ShimiPlugin
{

    function __construct()
    {
        add_action( 'init' , array( $this, 'custom_post_type' ) );
    }

    function activate() // activate plugin
    {
        // generate Custom Post Type 
        $this->custom_post_type();
        // flush rewrite rule
        flush_rewrite_rules();
    }

    
    function deactivate() // deactivate plugin
    {
        // flush rewrite rules
        flush_rewrite_rules();
    }

    
    function unistall() // unistall plugin
    {
        // delete Custom Post Type
        // delete all plugin data from the DB
        // echo "The PlugIn has been activates";
    }


    function custom_post_type(){
        register_post_type( 'book', ['public' => true, 'label' => 'Books' ] );
    }


}


// check if ShimiPlugin class exists
if( class_exists( ( 'ShimiPlugin' ) ) ){
    $shimiPlugin = new ShimiPlugin();
}


// activation
register_activation_hook( __FILE__, array($shimiPlugin, 'activate') );


// deactivation
register_deactivation_hook( __FILE__, array($shimiPlugin, 'deactivate') );


// unistall hook
register_uninstall_hook(__FILE__, array($shimiPlugin, 'uninstall') );