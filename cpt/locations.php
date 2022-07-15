<?php

// Register Custom Post Type
function locations() {

    $labels = array(
        'name' => _x('Lokacje', 'Post Type General Name', 'weather'),
        'singular_name' => _x('Lokacja', 'Post Type Singular Name', 'weather'),
        'menu_name' => __('Lokacje', 'weather'),
        'name_admin_bar' => __('Lokacje', 'weather'),
        'archives' => __('Archiwum lokacji', 'weather'),
        'attributes' => __('Atrybuty lokacji', 'weather'),
        'parent_item_colon' => __('Lokacja nadrzędna:', 'weather'),
        'all_items' => __('Wszystkie lokacje', 'weather'),
        'add_new_item' => __('Dodaj nową lokację', 'weather'),
        'add_new' => __('Nowa lokacja', 'weather'),
        'new_item' => __('Nowa lokacja', 'weather'),
        'edit_item' => __('Edytuj lokację', 'weather'),
        'update_item' => __('Aktualizuj lokację', 'weather'),
        'view_item' => __('Zobacz lokację', 'weather'),
        'view_items' => __('Zobacz lokacje', 'weather'),
        'search_items' => __('Szukaj lokacji', 'weather'),
        'not_found' => __('Brak lokacji', 'weather'),
        'not_found_in_trash' => __('Brak lokacji w koszu', 'weather'),
        'featured_image' => __('Obrazek wyróżniający', 'weather'),
        'set_featured_image' => __('Ustaw obrazem wyróżniający', 'weather'),
        'remove_featured_image' => __('Usuń obrazek wyróżniający', 'weather'),
        'use_featured_image' => __('Użyj jako obrazek wyróżniający', 'weather'),
        'insert_into_item' => __('Wstaw do lokacji', 'weather'),
        'uploaded_to_this_item' => __('Wgrano do tej lokacji', 'weather'),
        'items_list' => __('Lista lokacji', 'weather'),
        'items_list_navigation' => __('Lista lokacji', 'weather'),
        'filter_items_list' => __('Filtruj lokacje na liście', 'weather'),
    );
    $args = array(
        'label' => __('Lokacja', 'weather'),
        'labels' => $labels,
        'supports' => array('title', 'custom-fields'),
        'taxonomies' => array('species'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-admin-site-alt2',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    );
    register_post_type('location', $args);
}

add_action('init', 'locations', 0);

// Register Custom Taxonomy
function species() {

    $labels = array(
        'name' => _x('Gatunki', 'Taxonomy General Name', 'weather'),
        'singular_name' => _x('Gatunek', 'Taxonomy Singular Name', 'weather'),
        'menu_name' => __('Gatunki', 'weather'),
        'all_items' => __('Wszystkie gatunki', 'weather'),
        'parent_item' => __('Gatunek nadrzędny', 'weather'),
        'parent_item_colon' => __('Gatunek nadrzędny:', 'weather'),
        'new_item_name' => __('Nowa nazwa gatunku', 'weather'),
        'add_new_item' => __('Dodaj nowy gatunek', 'weather'),
        'edit_item' => __('Edytuj gatunek', 'weather'),
        'update_item' => __('Aktualizuj gatunek', 'weather'),
        'view_item' => __('Zobacz gatunek', 'weather'),
        'separate_items_with_commas' => __('Oddziel gatunki przecinkami', 'weather'),
        'add_or_remove_items' => __('Dodaj lub usuń gatunek', 'weather'),
        'choose_from_most_used' => __('Wybierz z najczęściej używanych', 'weather'),
        'popular_items' => __('Popularne gatunki', 'weather'),
        'search_items' => __('Szukaj gatunku', 'weather'),
        'not_found' => __('Brak gatunków', 'weather'),
        'no_terms' => __('Brak gatunków', 'weather'),
        'items_list' => __('Lista gatunków', 'weather'),
        'items_list_navigation' => __('Lista gatunków', 'weather'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
        'show_in_rest' => true,
    );
    register_taxonomy('species', array('location'), $args);
}

add_action('init', 'species', 0);
