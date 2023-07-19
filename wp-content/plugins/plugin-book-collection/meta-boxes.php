<?php

add_action( 'add_meta_boxes_book', 'pdev_book_register_meta_boxes' );

function pdev_book_register_meta_boxes() {

	add_meta_box(
		'pdev-book-details',
		'Book Details',
		'pdev_book_details_meta_box',
		'book',
		'advanced',
		'high'
	);
}

function pdev_book_details_meta_box( $post ) {

	// Get the existing book author.
	$author = get_post_meta( $post->ID, 'book_author', true );

	// Add a nonce field to check on save.
	wp_nonce_field( basename( __FILE__ ), 'pdev-book-details' ); ?>

	<p>
		<label>
			Book Author:
			<br />
			<input type="text" name="pdev-book-author" value="<?php echo esc_attr( $author ); ?>" />
		</label>
	</p>

<?php }

add_action( 'save_post_book', 'pdev_book_save_post', 10, 2 );

function pdev_book_save_post( $post_id, $post ) {

	// Verify the nonce before proceeding.
	if (
		! isset( $_POST['pdev-book-details'] ) ||
		! wp_verify_nonce( $_POST['pdev-book-details'], basename( __FILE__ ) )
	) {
		return;
	}

	// Bail if user doesn't have permission to edit the post.
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	// Bail if this is an Ajax request, autosave, or revision.
	if (
		wp_is_doing_ajax() ||
		wp_is_post_autosave( $post_id ) ||
		wp_is_post_revision( $post_id )
	) {
		return;
	}

	// Get the existing book author if the value exists.
	// If no existing book author, value is empty string.
	$old_author = get_post_meta( $post_id, 'book_author', true );

	// Strip all tags from posted book author.
	// If no value is passed from the form, set to empty string.
	$new_author = isset( $_POST['pdev-book-author'] )
	              ? wp_strip_all_tags( $_POST['pdev-book-author'] )
		      : '';

	// If there's an old value but not a new value, delete old value.
	if ( ! $new_author && $old_author ) {
		delete_post_meta( $post_id, 'book_author' );

	// If the new value doesn't match the new value add/update.
	} elseif ( $new_value !== $old_value ) {
		update_post_meta( $post_id, 'book_author', $new_value );
	}
}
