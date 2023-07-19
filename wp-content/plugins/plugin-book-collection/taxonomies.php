<?php

add_action( 'init', 'pdev_books_register_taxonomies' );

function pdev_books_register_taxonomies() {

	register_taxonomy( 'genre', 'book', [

		// Taxonomy arguments.
		'public'            => true,
		'show_in_rest'      => true,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'show_tagcloud'     => true,
		'show_admin_column' => true,
		'hierarchical'      => true,
		'query_var'         => 'genre',

		// The rewrite handles the URL structure.
		'rewrite' => [
			'slug'         => 'genre',
			'with_front'   => false,
			'hierarchical' => false,
			'ep_mask'      => EP_NONE
		],

		// Text labels.
		'labels'            => [
			'name'                       => 'Genres',
			'singular_name'              => 'Genre',
			'menu_name'                  => 'Genres',
			'name_admin_bar'             => 'Genre',
			'search_items'               => 'Search Genres',
			'popular_items'              => 'Popular Genres',
			'all_items'                  => 'All Genres',
			'edit_item'                  => 'Edit Genre',
			'view_item'                  => 'View Genre',
			'update_item'                => 'Update Genre',
			'add_new_item'               => 'Add New Genre',
			'new_item_name'              => 'New Genre Name',
			'not_found'                  => 'No genres found.',
			'no_terms'                   => 'No genres',
			'items_list_navigation'      => 'Genres list navigation',
			'items_list'                 => 'Genres list',

			// Hierarchical only.
			'select_name'                => 'Select Genre',
			'parent_item'                => 'Parent Genre',
			'parent_item_colon'          => 'Parent Genre:'
		]
	] );
}
