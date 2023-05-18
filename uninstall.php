<?php 
/**
 * Uninstalls wp quick events plugin and data
 * @package WP Quick Events 
 */

 if( !defined('WP_UNINSTALL_PLUGIN') ) : die; endif;

 //clear database stored data
 $events = get_posts( array('post_type' => 'wp_quick_event', 'numberposts' => -1));

 foreach( $events as $event ) {
    wp_delete_post( $event->ID,  true);
 }