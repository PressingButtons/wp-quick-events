<?php 

if(!defined('ABSPATH')): die("Sorry, this file is not open for public access."); endif;


class WPQEventsAdmin {

    private function init_atts($atts) {
        return shortcode_atts([
            'order' => 'DESC', 
            'number' => '-1'], 
            $atts);
    }

    private function queryAtts($atts) {
        $a = $this->init_atts($atts);
        return new WP_Query(array('post_type' => 'wp-quick-event', 'orderby' => $a['order'], 'posts_per_page' => $a['number']));
    }

    function __construct( ) { 
        add_action('init', array($this, 'custom_post_type'));
       add_shortcode('wp-quick-event-query', [$this, 'shortcode']);
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

    function custom_post_type( ) {
        register_post_type('wp_quick_event', array('public' => true, 'description' => 'post for user generated quick events', 'label' => 'WP Quick Events'));
    }

    function enqueue( ) {
        wp_enqueue_style('wp-quick-events-style', plugins_url('/assets/wpqe-style.css', __FILE__));
        wp_enqueue_script('wp-quick-events-script', plugins_url('/assets/wpqe-script.js', __FILE__));
    }

    function register( ) {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    //shortcode 
    function shortcode($atts) {
        //$query = $this->queryAtts($atts);
   
    }

}

if(class_exists('WPQEventsAdmin')):
    $wpqe_admin = new WPQEventsAdmin( );
    $wpqe_admin->register( );
endif;

