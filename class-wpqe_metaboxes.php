<?php 
class WPQE_Metabboxes {

    private function validate_date($name) {
        return (isset($_POST[$name]) && strtotime($_POST[$name]));
    }

    public function __construct( ) {

        add_action('add_meta_boxes', [$this, 'create_meta_boxes']);
        add_action('save_post', [$this, 'save_data']);
    }


    public function create_meta_boxes( ) {
        add_meta_box('wpqe_dates', 'Event Dates', [$this, 'date_meta_html'], ['wp_quick_event']);
    }

    public function date_meta_html( ) {
        $dates = get_post_meta(get_the_ID( ), 'wpqe-dates', true);
        ?>
        <label for="start-date">Start Date</label>
        <input type="date" id='start-date' name="start-date" value="<?php echo $dates[0]?>">
        <label for="end-date">End Date</label>
        <input type="date" id='end-date' name='end-date' value="<?php echo $dates[1]?>">
        <?php
    }

    public function save_data( $post_id ) {
        if($this->validate_date('start-date') && $this->validate_date('end-date')) {
            $event_value = [sanitize_text_field($_POST['start-date']), sanitize_text_field($_POST['end-date'])];
            update_post_meta($post_id, 'wpqe-dates', $event_value);
        }
    }

}

new WPQE_Metabboxes( );


