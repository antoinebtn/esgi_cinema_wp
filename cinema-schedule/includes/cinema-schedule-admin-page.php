<?php
function cinema_schedule_admin_menu() {
    add_menu_page(
        'Cinema Schedule',
        'Cinema Schedule',
        'manage_options',
        'cinema-schedule',
        'cinema_schedule_admin_page',
        'dashicons-video-alt2'
    );
}
add_action('admin_menu', 'cinema_schedule_admin_menu');

function cinema_schedule_admin_page() {
    ?>
    <div class="wrap">
        <h1>Cinema Schedule</h1>
        <form method="post" action="admin-post.php">
            <input type="hidden" name="action" value="save_cinema_schedule">
            <?php wp_nonce_field('cinema_schedule_save', 'cinema_schedule_nonce'); ?>
            <?php
            $args = array(
                'post_type' => 'film',
                'post_status' => 'publish',
                'posts_per_page' => -1
            );
            $films = new WP_Query($args);

            if ($films->have_posts()) :
                while ($films->have_posts()) : $films->the_post();
                    $film_id = get_the_ID();
                    $film_title = get_the_title();
                    $schedules = get_post_meta($film_id, '_cinema_schedule', true);
                    ?>
                    <div class="film-schedule">
                        <h2><?php echo $film_title; ?></h2>
                        <input type="hidden" name="film_ids[]" value="<?php echo $film_id; ?>">
                        <div class="schedules">
                            <?php if (!empty($schedules)) : ?>
                                <?php foreach ($schedules as $schedule) : ?>
                                    <div class="schedule-row">
                                        <input type="text" name="cinema_schedule[<?php echo $film_id; ?>][]" value="<?php echo esc_attr($schedule); ?>">
                                        <button class="remove-schedule-row button">Supprimer</button>
                                    </div>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <div class="schedule-row">
                                    <input type="text" name="cinema_schedule[<?php echo $film_id; ?>][]" value="">
                                    <button class="remove-schedule-row button">Supprimer</button>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button class="add-schedule-row button">Ajouter Horaire</button>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucun film trouvé.</p>';
            endif;
            ?>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer les modifications">
        </form>
    </div>
    <?php
}

function cinema_schedule_save_admin_page() {
    if (isset($_POST['cinema_schedule_nonce']) && wp_verify_nonce($_POST['cinema_schedule_nonce'], 'cinema_schedule_save')) {
        if (isset($_POST['cinema_schedule']) && isset($_POST['film_ids'])) {
            foreach ($_POST['film_ids'] as $film_id) {
                if (isset($_POST['cinema_schedule'][$film_id])) {
                    $schedules = array_map('sanitize_text_field', $_POST['cinema_schedule'][$film_id]);
                    update_post_meta($film_id, '_cinema_schedule', $schedules);
                }
            }
        }
    }
    wp_redirect(admin_url('admin.php?page=cinema-schedule'));
    exit;
}
add_action('admin_post_save_cinema_schedule', 'cinema_schedule_save_admin_page');
