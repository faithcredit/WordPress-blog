<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	wp_die( sprintf(
		'%s should only be called when uninstalling the plugin.',
		__FILE__
	) );
	exit;
}

remove_role( 'forum_administrator' );
remove_role( 'forum_moderator'     );
remove_role( 'forum_member'        );
remove_role( 'forum_banned'        );
