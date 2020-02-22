<?php

/**
 * @package Shimi Plugin 
 */

/*
Plugin Name: ShimiFreight
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

    
    function register()
    {
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
        add_action( 'admin_menu' , array( $this, 'add_admin_pages' ) );
    } 


    // create admin page for plugin
    public function add_admin_pages()
    {
        add_menu_page( 'Shimi Plugin' , 'Shimi', 'manage_options' , 'shimi_plugin', array($this , 'admin_index_page'), '', 110 );
        // last 2 parameters are for the icon and plugin postion on the WP menu bar
    }


    // fetch - template: HTML,CSS and JS for Admin page
    public function admin_index_page()
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin_index.php';
    }



    function activate() // activate plugin
    {

        require_once plugin_dir_path(__FILE__) . 'includes/ShimiPluginActivate.php';
        ShimiPluginActivate::activate(); 
         
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


    function custom_post_type()
    {
        register_post_type( 'book', ['public' => true, 'label' => 'Books' ] );
    }


    function enqueue()
    {
        // make app scripts accessible/available
        wp_enqueue_style('shimi_plugin_style', plugins_url( '/assets/shimi_plugin_style.css' , __FILE__) );
        wp_enqueue_script('shimi_plugin_script', plugins_url( '/assets/shimi_plugin_script.js' , __FILE__) );

    }

}





// check if ShimiPlugin class exists
if( class_exists( ( 'ShimiPlugin' ) ) ){
    $shimiPlugin = new ShimiPlugin();
    $shimiPlugin->register();
}




// activation
// register_activation_hook( __FILE__, array($shimiPlugin, 'activate') );


// deactivation
register_deactivation_hook( __FILE__, array($shimiPlugin, 'deactivate') );


// unistall hook
// register_uninstall_hook(__FILE__, array($shimiPlugin, 'uninstall') );