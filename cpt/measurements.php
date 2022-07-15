<?php

// Register Custom Post Type
function measurements() {

    $labels = array(
        'name' => _x('Pomiary', 'Post Type General Name', 'weather'),
        'singular_name' => _x('Pomiar', 'Post Type Singular Name', 'weather'),
        'menu_name' => __('Pomiary', 'weather'),
        'name_admin_bar' => __('Pomiary', 'weather'),
        'archives' => __('Archiwum pomiarów', 'weather'),
        'attributes' => __('Atrybuty pomiaru', 'weather'),
        'parent_item_colon' => __('Pomiar nadrzędny:', 'weather'),
        'all_items' => __('Wszystkie pomiary', 'weather'),
        'add_new_item' => __('Dodaj nowy pomiar', 'weather'),
        'add_new' => __('Nowy pomiar', 'weather'),
        'new_item' => __('Nowy pomiar', 'weather'),
        'edit_item' => __('Edytuj pomiar', 'weather'),
        'update_item' => __('Aktualizuj pomiar', 'weather'),
        'view_item' => __('Zobacz pomiar', 'weather'),
        'view_items' => __('Zobacz pomiary', 'weather'),
        'search_items' => __('Szukaj pomiaru', 'weather'),
        'not_found' => __('Brak pomiatu', 'weather'),
        'not_found_in_trash' => __('Brak pomiaru w koszu', 'weather'),
        'featured_image' => __('Obrazek wyróżniający', 'weather'),
        'set_featured_image' => __('Ustaw obrazem wyróżniający', 'weather'),
        'remove_featured_image' => __('Usuń obrazek wyróżniający', 'weather'),
        'use_featured_image' => __('Użyj jako obrazek wyróżniający', 'weather'),
        'insert_into_item' => __('Wstaw do pomiaru', 'weather'),
        'uploaded_to_this_item' => __('Wgrano do tego pomiaru', 'weather'),
        'items_list' => __('Lista pomiarów', 'weather'),
        'items_list_navigation' => __('Lista pomiarów', 'weather'),
        'filter_items_list' => __('Filtruj pomiary na liście', 'weather'),
    );
    $args = array(
        'label' => __('Pomiar', 'weather'),
        'labels' => $labels,
        'supports' => array('title', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-calculator',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );
    register_post_type('measurement', $args);
}

add_action('init', 'measurements', 0);

register_meta('post', 'city_id', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Klucz ID miasta',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'humidity', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Wilgotność',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'location_ID', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Klucz ID lokacji',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'pressure', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Ciśnienie',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'temp_feels', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Temperatura odczuwalna',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'temp_max', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Temperatura maksymalna',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'temp_min', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Temperatura minimalna',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'iteration', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Iteracja',
    'single'         => true,
    'show_in_rest'   => true,
]);

register_meta('post', 'visibility', [
    'object_subtype' => 'measurement', // Limit to a post type.
    'type'           => 'string',
    'description'    => 'Widoczność',
    'single'         => true,
    'show_in_rest'   => true,
]);