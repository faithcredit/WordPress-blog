<?php
 
add_action( 'init', 'pdev_book_collection_post_types' );
 
function pdev_book_collection_post_types() {
 
       register_post_type( 'book', [
 
             // Post type arguments.
             'public'              => true,
             'publicly_queryable'  => true,
             'show_in_rest'        => true,
             'show_in_nav_menus'   => true,
             'show_in_admin_bar'   => true,
             'exclude_from_search' => false,
             'show_ui'             => true,
             'show_in_menu'        => true,
             'menu_icon'           => 'dashicons-book',
             'hierarchical'        => false,
             'has_archive'         => 'books',
             'query_var'           => 'book',
             'map_meta_cap'        => true,
 
             // The rewrite handles the URL structure.
             'rewrite' => [
                    'slug'       => 'books',
                    'with_front' => false,
                    'pages'      => true,
                    'feeds'      => true,
                    'ep_mask'    => EP_PERMALINK,
             ],
 
             // Features the post type supports.
             'supports' => [
                    'title',
                    'editor',
                    'excerpt',
                    'thumbnail'
             ],

             // Text labels.
            'labels' => [
                'name'                     => 'Books',
                'singular_name'            => 'Book',
                'add_new'                  => 'Add New',
                'add_new_item'             => 'Add New Book',
                'edit_item'                => 'Edit Book',
                'new_item'                 => 'New Book',
                'view_item'                => 'View Book',
                'view_items'               => 'View Books',
                'search_items'             => 'Search Books',
                'not_found'                => 'No books found.',
                'not_found_in_trash'       => 'No books found in Trash.',
                'all_items'                => 'All Books',
                'archives'                 => 'Book Archives',
                'attributes'               => 'Book Attributes',
                'insert_into_item'         => 'Insert into book',
                'uploaded_to_this_item'    => 'Uploaded to this book',
                'featured_image'           => 'Book Image',
                'set_featured_image'       => 'Set book image',
                'remove_featured_image'    => 'Remove book image',
                'use_featured_image'       => 'Use as book image',
                'filter_items_list'        => 'Filter books list',
                'items_list_navigation'    => 'Books list navigation',
                'items_list'               => 'Books list',
                'item_published'           => 'Book published.',
                'item_published_privately' => 'Book published privately.',
                'item_reverted_to_draft'   => 'Book reverted to draft.',
                'item_scheduled'           => 'Book scheduled.',
                'item_updated'             => 'Book updated.'
            ]
       ] );
}