<?php 
/**
 * Uninstalls wp quick events plugin and data
 * @package WP Quick Events 
 */

 if( !defined('WP_UNINSTALL_PLUGIN') ) : die; endif;

 //IMPORTANT - DO NOT CHANGE CODE UNLESS YOU ARE FAMILIAR WITH SQL
 //MANUALLY MAKES ALTERATIONS TO DATABASE.
 global $wpdb;

 $wpdb->query("DELETE FROM wp_postmeta WHERE post_id IN (SELECT id FROM wp_posts WHERE post_type = 'wp_quick_event')");
 $wpdb->query("DELETE FROM wp_term_relationships WHERE object_id IN (SELECT id FROM wp_posts WHERE post_type = 'wp_quick_event')");
 $wpdb->query("DELETE FROM wp_posts WHERE post_type = 'wp_quick_event'"); 