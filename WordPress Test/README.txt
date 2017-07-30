Para añadir este plugin, debemos ir a wp-content/plugins

Para crear post types, agegar en la función my_custom_init() una estructura parecida a la siguiente:

        $labels = array(
        'name' => _x( 'Nombre del post type', 'post type general name' ),
        'singular_name' => _x( 'Nombre del post type en singular', 'post type singular name' ),
        'add_new' => _x( 'Añadir nuevo/a nombre del post type'book' ),
        'add_new_item' => __( 'Añadir nuevo/a Nombre del post type' ),
        'edit_item' => __( 'Editar Nombre del post type' ),
        'new_item' => __( 'Nueva Nombre del post type' ),
        'view_item' => __( 'Ver Nombre del post type' ),
        'search_items' => __( 'Buscar Nombre del post type' ),
        'not_found' =>  __( 'No se ha encontrado ningun/a Nombre del post type' ),
        'not_found_in_trash' => __( 'No se han encontrado Nombre del post type en la papelera' ),
        'parent_item_colon' => ''
    );

    //Se crea un array para args

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

//Para que se vinculen las diferentes taxonomias que queremos vincular a a este post type hacemos los siguiente.
add_action( 'init', 'nombreDeLaFuncion', 0 );

//Donde nombreDeLaFuncion sera el nombre de la función que creara las taxonomias.


//Para crear una taxonomia, nos tiene que quedar una estructura parecida a la siguiente:

function nombreDeLaFuncion() {

        $labels = array(
        'name' => _x( 'nombre de la taxonomia', 'taxonomy general name' ),
        'singular_name' => _x( 'nombre de la taxonomia en singular', 'taxonomy singular name' ),
        'search_items' =>  __( 'Buscar por nombre de la taxonomia' ),
        'all_items' => __( 'Todos los nombre de la taxonomia' ),
        'parent_item' => __( 'nombre de la taxonomia padre' ),
        'parent_item_colon' => __( 'nombre de la taxonomia padre:' ),
        'edit_item' => __( 'Editar nombre de la taxonomia' ),
        'update_item' => __( 'Actualizar nombre de la taxonomia' ),
        'add_new_item' => __( 'Añadir nuevo nombre de la taxonomia' ),
        'new_item_name' => __( 'Nombre del nuevo nombre de la taxonomia' ),
);
register_taxonomy( 'nombre de la taxonomia(no se puede repetir el nombre si ya tenemos otra taxonomia con el mismo nombre creada, ya que nos cogera el todos los valores de la otra taxonomia)', array( 'nombre del post type' ), array(
        'hierarchical' => true,//aqui especificamos si queremos que sea jerarquica
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

}
