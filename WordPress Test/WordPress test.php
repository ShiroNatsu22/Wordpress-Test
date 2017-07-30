<?php
/*
Plugin Name: WordPress Test
Plugin URI: https://github.com/ShiroNatsu22/Wordpress-Test
Description: Prueba para añadir diferentes taxonomias y post types.
Version: 1.0
Author: ShiroNatsu22
Author URIhttps://github.com/ShiroNatsu22
License: GPL2
*/


function my_custom_init() {
        $labels = array(
        'name' => _x( 'Películas', 'post type general name' ),
        'singular_name' => _x( 'Película', 'post type singular name' ),
        'add_new' => _x( 'Añadir nueva película', 'book' ),
        'add_new_item' => __( 'Añadir nueva película' ),
        'edit_item' => __( 'Editar película' ),
        'new_item' => __( 'Nueva pelicula' ),
        'view_item' => __( 'Ver pelicula' ),
        'search_items' => __( 'Buscar pelicula' ),
        'not_found' =>  __( 'No se ha encontrado ninguna pelicula' ),
        'not_found_in_trash' => __( 'No se han encontrado peliculas en la papelera' ),
        'parent_item_colon' => ''
    );



    $args = array( 'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'pelicula', $args );

}

add_action( 'init', 'film_taxonomy', 0 );

function film_taxonomy() {

        $labels = array(
        'name' => _x( 'Géneros', 'taxonomy general name' ),
        'singular_name' => _x( 'Género', 'taxonomy singular name' ),
        'search_items' =>  __( 'Buscar por género' ),
        'all_items' => __( 'Todos los géneros' ),
        'parent_item' => __( 'Género padre' ),
        'parent_item_colon' => __( 'Género padre:' ),
        'edit_item' => __( 'Editar género' ),
        'update_item' => __( 'Actualizar género' ),
        'add_new_item' => __( 'Añadir nuevo género' ),
        'new_item_name' => __( 'Nombre del nuevo género' ),
);
register_taxonomy( 'genero', array( 'pelicula' ), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'genero' ),
));

$labels = array(
        'name' => _x( 'Directores', 'taxonomy general name' ),
        'singular_name' => _x( 'Director', 'taxonomy singular name' ),
        'search_items' =>  __( 'Buscar director' ),
        'popular_items' => __( 'Directores populares' ),
        'all_items' => __( 'Todos los directores' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Editar director' ),
        'update_item' => __( 'Actualizar director' ),
        'add_new_item' => __( 'Añadir nuevo director' ),
        'new_item_name' => __( 'Nombre del nuevo director' ),
        'separate_items_with_commas' => __( 'Separar directores por comas' ),
        'add_or_remove_items' => __( 'Añadir o eliminar directores' ),
        'choose_from_most_used' => __( 'Escoger entre los directores más populares' )
);

register_taxonomy( 'director', 'pelicula', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'director' ),
));
}
