<?php
// Ajout des Meta Boxes pour les horaires de diffusion
function cinema_schedule_add_meta_boxes() {
    add_meta_box(
        'cinema_schedule_meta_box',
        'Horaires de Diffusion',
        'cinema_schedule_meta_box_callback',
        'film',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cinema_schedule_add_meta_boxes');

function cinema_schedule_meta_box_callback($post) {
    global $pagenow;

    wp_nonce_field('cinema_schedule_save_meta_box_data', 'cinema_schedule_meta_box_nonce');

    $values = get_post_meta($post->ID, '_cinema_schedule', true);

    echo '<div id="cinema-schedule-wrapper">';
    if ($pagenow == 'post-new.php') {
        echo '<div class="cinema-schedule-row">';
        echo '<input type="text" name="cinema_schedule[]" value="" />';
        echo '<button class="remove-schedule-row button">Supprimer</button>';
        echo '</div>';
    } elseif ($pagenow == 'post.php') {
        if (is_array($values) && !empty($values)) {
            foreach ($values as $value) {
                echo '<div class="cinema-schedule-row">';
                echo '<p>' . esc_attr($value) . '</p>';
                echo '</div>';
            }
        }
    }
    echo '</div>';
    
    // Afficher le bouton "Ajouter Horaire" uniquement lors de la création
    if ($pagenow == 'post-new.php') {
        echo '<button id="add-schedule-row" class="button">Ajouter Horaire</button>';
    }
}

function cinema_schedule_save_meta_box_data($post_id) {
    if (!isset($_POST['cinema_schedule_meta_box_nonce'])) {
        return;
    }

    if (!wp_verify_nonce($_POST['cinema_schedule_meta_box_nonce'], 'cinema_schedule_save_meta_box_data')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (!isset($_POST['cinema_schedule'])) {
        return;
    }

    $schedules = array_map('sanitize_text_field', $_POST['cinema_schedule']);
    update_post_meta($post_id, '_cinema_schedule', $schedules);
}
add_action('save_post', 'cinema_schedule_save_meta_box_data');
