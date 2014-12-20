<?php
/* Plugin Name: Custom posts 
 * Description: Managing Question and answer and other setting.
 * Author: Amit Singh
 */

add_action( 'init', 'qaPost' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function qaPost() {
	$labels = array(
		'name'               => _x( 'Q and A', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Q and A', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Q and A', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Q and A', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Q and A', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Q and A', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Q and A', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Q and A', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Q and A', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Q and A', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Q and A', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Q and A:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No books found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No books found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'q-a' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'q-a', $args );
}

add_action( 'init', 'qaPost' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function announcements() {
	$labels = array(
		'name'               => _x( 'Announcements', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Announcements', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Announcements', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Announcements', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'Announcements', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Announcement', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Announcement', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Announcements', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Announcements', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Announcements', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Announcements', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Announcements:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No Announcements found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No Announcements found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'announcements' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'announcements', $args );
}

add_action( 'init', 'announcements' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function news() {
	$labels = array(
		'name'               => _x( 'News', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'News', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'News', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'News', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'news', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New news', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New news', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit News', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View News', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All News', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search News', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent News:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No news found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No news found in Trash.', 'your-plugin-textdomain' )
	);
        
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'news' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'news', $args );
}
add_action( 'init', 'news' );

/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function property() {
	$labels = array(
		'name'               => _x( 'Property', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Property', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Property', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Property', 'add new on admin bar', 'your-plugin-textdomain' ),
		//'add_new'            => _x( 'Add New', 'property', 'your-plugin-textdomain' ),
		//'add_new_item'       => __( 'Add New property', 'your-plugin-textdomain' ),
		//'new_item'           => __( 'New property', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit property', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View property', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All property', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search property', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent property:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No property found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No property found in Trash.', 'your-plugin-textdomain' )
	);
        
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
            
		'rewrite'            => array( 'slug' => 'property' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'property', $args );
}
add_action( 'init', 'property' );



/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function Development() {
	$labels = array(
		'name'               => _x( 'Development', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Development', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Development', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Development', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'development', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New development', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New development', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit development', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View development', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All development', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search development', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent development:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No development found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No development found in Trash.', 'your-plugin-textdomain' ),
                
	);
        
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'developer' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);

	register_post_type( 'Development', $args );
}
add_action( 'init', 'development' );

?>