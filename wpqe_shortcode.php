<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
 }


function wpqe_query($atts) {

	$default = array('count' => '-1');
	
	$a = shortcode_atts($default, $atts);

	echo 'THIS IS A TEST: '. $a['count'];

	$query = new WP_Query(array(
		'post_type' => 'wp_quick_event', 
		'posts_per_page' => $a['count'],
		'meta_key' => 'wpqe-dates',
		'orderby' => 'meta_value',
		'order' => 'DESC'
	));

	if($query -> have_posts( )) {
		$html = '<div class="wp-quick-event_list">';
		while($query -> have_posts( )) {
			$query->the_post( );
			$id = get_the_id( );
			$dates = get_post_meta($id, 'wpqe-dates', true);
			//reformat dates 
			$start = strtotime($dates[0]);
			$end   = strtotime($dates[1]);
			$dates_out = date('M j', $start).' - '.date('M j, Y', $end);
			//output
			$html.= "<div class='wp-quick-event_entry' id='wp-quick-event_".$id."'>";
			$html.= '<header><h3>'.get_the_title( ).'</h3></header>';
			$html.= '<div class="wp-quick-event_content">'.get_the_content( ).'</div>';
			$html.= '<div class="wp-quick-event_dates">'.$dates_out.'</div>';
			$html.= "</div>";
		}
		$html.= '</div>';
		return $html;
	} else {
		$html = '<p>No Events Found</p>';
	}

	wp_reset_postdata( );
	return $html;

}

add_shortcode('wp-quick-event', 'wpqe_query');