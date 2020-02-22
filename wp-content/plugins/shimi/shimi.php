<?php

/**
 * @package Shimi Plugin 
 */

/*
Plugin Name: Shimi
PLugin URI: http://simpleFreightCharge.com/plugin
Description: This plugun helps calculate accurate freight delivery charges
Version: 1.0.0
Authon: Baholo Mokoena  

*/


// First check the person whos accessing this plugin is doing it from the correct source, or through the correct way

// shimi plugin class

class ShimiPlugin
{
    
    public $mypluginname; // global plugin basename


    function __construct()
    {
        // add_action( 'init' , array( $this, 'custom_post_type' ) );
        $this->mypluginname = plugin_basename( __FILE__ );
    }

    

    function register() // * queue all app scripts * create custom post type * Include Shimi on menu page * create settings *
    {   
        add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

        add_action( 'admin_menu' , array( $this, 'add_admin_pages' ) );
    
        add_filter( "plugin_action_links_$this->mypluginname", array( $this, 'create_settings_link') );
    } 

    
    
    public function create_settings_link( $links ) // create a clickable link to the settings page for the plugin
    {
         $link_to_settings = '<a href="http://localhost/wordpress/wp-admin/admin.php?page=shimi_plugin"> Settings</a>';
         array_push( $links, $link_to_settings);
         return $links;

    }  


    
    public function add_admin_pages()// create admin page for plugin
    {
        add_menu_page( 'Shimi Plugin' , 'Shimi', 'manage_options' , 'shimi_plugin', array($this , 'admin_index_page'), '', 110 );
        // last 2 parameters are for the icon and plugin postion on the WP menu bar
    }


    
    public function admin_index_page() // fetch - template: HTML,CSS and JS for Admin page
    {
        require_once plugin_dir_path( __FILE__ ) . 'templates/admin_index.php';
    }



    function activate() // activate plugin. Use static method call 
    {

        require_once plugin_dir_path(__FILE__) . 'includes/ShimiPluginActivate.php';
        ShimiPluginActivate::activate(); 
        ShimiPluginActivate::create_custom_post_type();         
    }

    


    
    function enqueue() // make app scripts accessible/available 
    {
        wp_enqueue_style('shimi_plugin_style', plugins_url( '/assets/shimi_plugin_style.css' , __FILE__) );
        wp_enqueue_script('shimi_plugin_script', plugins_url( '/assets/shimi_plugin_script.js' , __FILE__) );

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



}






if( class_exists( ( 'ShimiPlugin' ) ) ) // if ShimiPlugin class exists, register the plugin 
{
    $shimiPlugin = new ShimiPlugin();
    $shimiPlugin->register();
}




// activation
// register_activation_hook( __FILE__, array($shimiPlugin, 'activate') );


// deactivation
register_deactivation_hook( __FILE__, array($shimiPlugin, 'deactivate') );


// unistall hook
// register_uninstall_hook(__FILE__, array($shimiPlugin, 'uninstall') );