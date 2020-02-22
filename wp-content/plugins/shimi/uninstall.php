<?php 

/**
 * Trigger this file on ShimiPlugin uninstall
 * @package ShimiPlugin
 */

if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ){
    die;
}


// Clear all plugin related data from the database
// Longer, slower way
// $books = get_posts( array('post_type' => 'books', 'numberposts' => -1) );

// foreach( $books as $book ){
//     wp_delete_post( $book->ID, true) ;
// }


// Shoter way - call global variale $wpdb
global $wpdb;
$wpdb->query( "DELETE FROM wp_posts WHERE post_type = 'books' " );
$wpdb->query( "DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)" );















?>