<?php
/*
Plugin Name: Cinema Schedule
Description: Un plugin pour gérer la liste des films et les horaires de diffusion.
Version: 1.0
Author: Votre Nom
*/

// Empêcher l'accès direct
if (!defined('ABSPATH')) {
    exit;
}

// Inclure les fichiers nécessaires
require_once plugin_dir_path(__FILE__) . 'includes/cinema-schedule-cpt.php';
require_once plugin_dir_path(__FILE__) . 'includes/cinema-schedule-meta-boxes.php';
require_once plugin_dir_path(__FILE__) . 'includes/cinema-schedule-admin-page.php';
require_once plugin_dir_path(__FILE__) . 'includes/cinema-schedule-shortcode.php';

// Enqueue les scripts et styles nécessaires
function cinema_schedule_enqueue_scripts($hook_suffix) {
    if ($hook_suffix === 'toplevel_page_cinema-schedule') {
        wp_enqueue_script('cinema-schedule-admin-js', plugins_url('js/cinema-schedule-admin.js', __FILE__), array('jquery'), '1.0', true);
        wp_enqueue_style('cinema-schedule-css', plugins_url('css/cinema-schedule.css', __FILE__));
    }
}
add_action('admin_enqueue_scripts', 'cinema_schedule_enqueue_scripts');
