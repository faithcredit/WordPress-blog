<?php

add_action( 'init', 'pdev_books_register_meta' );

function pdev_books_register_meta() {

	register_post_meta( 'book', 'book_author', [
		'single'            => true,
		'show_in_rest'      => true,
		'sanitize_callback' => function( $value ) {
			return wp_strip_all_tags( $value );
		}
	] );
}
