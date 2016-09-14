<?php
add_action( 'init', 'register_cpt_planche' );
function register_cpt_planche() {

    $labels = array( 
        'name' => _x( 'Planches', 'planche' ),
        'singular_name' => _x( 'Planches', 'planche' ),
        'add_new' => _x( 'Ajouter', 'planche' ),
        'add_new_item' => _x( 'Ajouter une planche', 'planche' ),
        'edit_item' => _x( 'Editer la planche', 'planche' ),
        'new_item' => _x( 'Nouveau planche', 'planche' ),
        'view_item' => _x( 'Voir le planche', 'planche' ),
        'search_items' => _x( 'Rechercher une planche', 'planche' ),
        'not_found' => _x( 'Aucune planche trouvée', 'planche' ),
        'not_found_in_trash' => _x( 'Aucune planche dans la corbeille', 'planche' ),
        'parent_item_colon' => _x( 'planche parente :', 'planche' ),
        'menu_name' => _x( 'Planches', 'planche' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => false,
        'supports' => array( 'title', 'thumbnail', 'excerpt'),
        'taxonomies' => array( 'category'),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,

        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'planche', $args );
}
 