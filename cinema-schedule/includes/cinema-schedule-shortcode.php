<?php
function cinema_schedule_shortcode($atts) {
    $atts = shortcode_atts(array('id' => ''), $atts, 'cinema_schedule');
    $post_id = $atts['id'];
    if (!$post_id) {
        return '';
    }

    $schedules = get_post_meta($post_id, '_cinema_schedule', true);
    if (!$schedules) {
        return '';
    }

    $output = '<div class="cinema-schedule"><ul>';
    foreach ($schedules as $schedule) {
        $output .= '<li>' . esc_html($schedule) . '</li>';
    }
    $output .= '</ul></div>';

    return $output;
}
add_shortcode('cinema_schedule', 'cinema_schedule_shortcode');
    