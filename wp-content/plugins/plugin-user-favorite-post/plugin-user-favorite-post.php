<?php
/**
 * Plugin Name: User Favorite Post
 * Plugin URI:  http://example.com/
 * Description: Allows users to select their favorite post.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */

// Add the form to the user/profile admin screen.
add_action( 'show_user_profile', 'pdev_user_favorite_post_form' );
add_action( 'edit_user_profile', 'pdev_user_favorite_post_form' );

function pdev_user_favorite_post_form( $user ) {

	$favorite = get_user_meta( $user->ID, 'favorite_post', true );

	$posts = get_posts( [ 'numberposts' => -1 ] ); ?>

	<h2>Favorites</h2>

	<table class="form-table">
		<tr>
			<th><label for="pdev-favorite-post">Favorite Post</label></th>

			<td>
				<select name="pdev_favorite_post" id="pdev-favorite-post">
					<option value="" <?php selected( '', $favorite ); ?>></option>

					<?php foreach ( $posts as $post ) {
						printf(
							'<option value="%s" %s>%s</option>',
							esc_attr( $post->ID ),
							selected( $post->ID, $favorite, false ),
							esc_html( $post->post_title )
						);
					} ?>
				</select>
				<br />
				<span class="description">Select your favorite post.</span>
			</td>
		</tr>
	</table>
 <?php }

// Add the update function to the user update hooks.
add_action( 'personal_options_update',  'pdev_user_favorite_post_update' );
add_action( 'edit_user_profile_update', 'pdev_user_favorite_post_update' );

function pdev_user_favorite_post_update( $user_id ) {

	// Bail if the current user cannot edit the user.
	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return;
	}

	// Get the existing favorite post if the value exists.
	// If no existing favorite post, value is empty string.
	$old_favorite = get_user_meta( $user_id, 'favorite_post', true );

	// Sanitize to only accept numbers since it's a post ID.
	$new_favorite = preg_replace( "/[^0-9]/", '', $_POST['pdev_favorite_post'] );

	// Update the user's favorite post.
	update_user_meta( $user_id, 'favorite_post', $favorite_post );

	// If there's an old value but not a new value, delete old value.
	if ( ! $new_favorite && $old_favorite ) {
		delete_user_meta( $user_id, 'favorite_post' );

	// If the new value doesn't match the new value add/update.
	} elseif ( $new_value !== $old_value ) {
		update_user_meta( $user_id, 'favorite_post', $new_value );
	}
}
