<?php 

if(!defined('ABSPATH')): die("Sorry, this file is not open for public access."); endif;

class WPQEventsAdmin {

    function __construct( ) { 
        add_action('init', array($this, 'custom_post_type'));
    }
    
    //public 
    function activate( ) {
        //generate a custom post type 
        $this->custom_post_type( );
        //flush rewrite rules
        flush_rewrite_rules( );
    }
    
    function deactivate( ) {
        //flush rewrite
        flush_rewrite_rules( );
    }

    function uninstall( ) {
        //delete custom post type
        //delete plugin data from database
    }

    function custom_post_type( ) {
        register_post_type('wp_quick_event', array('public' => true, 'description' => 'post for user generated quick events', 'label' => 'WP Quick Events'));
    }

}

if(class_exists('WPQEventsAdmin')):
    $wpqe_admin = new WPQEventsAdmin( );
endif;

