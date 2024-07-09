<?php
// Enregistrement du Custom Post Type pour les films
function cinema_schedule_register_cpt() {
    $labels = array(
        'name' => 'Films',
        'singular_name' => 'Film',
        'add_new' => 'Ajouter un Film',
        'add_new_item' => 'Ajouter un nouveau Film',
        'edit_item' => 'Modifier le Film',
        'new_item' => 'Nouveau Film',
        'view_item' => 'Voir le Film',
        'search_items' => 'Rechercher des Films',
        'not_found' => 'Aucun film trouvé',
        'not_found_in_trash' => 'Aucun film trouvé dans la corbeille',
        'all_items' => 'Tous les Films',
        'menu_name' => 'Films',
        'name_admin_bar' => 'Film'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'film'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('film', $args);
}
add_action('init', 'cinema_schedule_register_cpt');
