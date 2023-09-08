<?php
	
/* Add theme support
-------------------------------------------------------------- */
// Enables the usage and display of post thumbnails in a WordPress theme.
add_theme_support( 'post-thumbnails' );
	
/* Remove theme support
-------------------------------------------------------------- */
// Disables all core patterns.
add_action('init', function() {
	remove_theme_support('core-block-patterns');
});

/* Organize admin menu
-------------------------------------------------------------- */
function gfm_custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;
	
	return array(
		// Dashboard
		'index.php',
		// Content types
		'edit.php',
		'edit.php?post_type=case-result',
		'edit.php?post_type=practice-area',
		'edit.php?post_type=page',
		'separator1',
		// Content creation
		'upload.php',
		'gf_edit_forms',
		'edit.php?post_type=acf-field-group',
		'separator-last',
		// Utilities
		'users.php',
		'plugins.php',
	);
	
}

add_filter('custom_menu_order', 'gfm_custom_menu_order');
add_filter('menu_order', 'gfm_custom_menu_order');

// Remove unnecessary admin items
add_action('admin_menu', 'gfm_remove_menus');

function gfm_remove_menus() {
	remove_menu_page('edit-comments.php');
	remove_menu_page('tools.php');
	remove_menu_page('themes.php');
}