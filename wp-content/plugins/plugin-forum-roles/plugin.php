<?php
/**
 * Plugin Name: Forum Roles
 * Plugin URI:  http://example.com/
 * Description: Creates example roles for a forum.
 * Author:      WROX
 * Author URI:  http://wrox.com
 */

register_activation_hook( __FILE__, 'pdev_create_forum_roles' );

function pdev_create_forum_roles() {

	// Get the administrator role.
	$administrator = get_role( 'administrator' );

	// Add forum capabilities to the administrator role.
	$administrator->add_cap( 'create_forums'   );
	$administrator->add_cap( 'create_threads'  );
	$administrator->add_cap( 'modreate_forums' );

	// Add a forum administrator role.
	add_role( 'forum_administrator', 'Forum Administrator', [
		'read'            => true,
		'create_forums'   => true,
		'create_threads'  => true,
		'moderate_forums' => true
	] );

	// Add a forum moderator role.
	add_role( 'forum_moderator', 'Forum Moderator', [
		'read'            => true,
		'create_threads'  => true,
		'moderate_forums' => true
	] );

	// Add a forum member role.
	add_role( 'forum_member', 'Forum Member', [
		'read'            => true,
		'create_threads'  => true
	] );

	// Add a banned forum role.
	add_role( 'forum_banned', 'Forum Banned', [
		'read'            => true,
		'create_forums'   => false,
		'create_threads'  => false,
		'moderate_forums' => false
	] );
}
