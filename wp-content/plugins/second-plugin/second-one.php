<?php

/**
 * Plugin Name: Change the footer text
 */

function my_plugin_display_footer_text() {
    echo esc_html(get_option('my_plugin_settings_footer_text'));
}
add_action( 'wp_footer', 'my_plugin_display_footer_text' );


function my_plugin_settings_footer_text_callback () {
	$option = get_option('my_plugin_settings_footer_text');
	?>
	<input type="text" name="my_plugin_settings_footer_text" value="<?php echo esc_attr($option);?>">
	<?php
}

function my_plugin_add_my_setting () {
	register_setting('general', 'my_plugin_settings_footer_text');

	add_settings_field(
		'my_plugin_settings_footer_text',
		esc_html__('Footer text', 'my-plugin'),
		'my_plugin_settings_footer_text_callback',
		'general'
	);
}

add_action('admin_init', 'my_plugin_add_my_setting');



add_action( 'init', 'your_prefix_register_post_type' );
function your_prefix_register_post_type() {
	$args = [
		'label'  => esc_html__( 'Games', 'text-domain' ),
		'labels' => [
			'menu_name'          => esc_html__( 'Games', 'your-textdomain' ),
			'name_admin_bar'     => esc_html__( 'Game', 'your-textdomain' ),
			'add_new'            => esc_html__( 'Add Game', 'your-textdomain' ),
			'add_new_item'       => esc_html__( 'Add new Game', 'your-textdomain' ),
			'new_item'           => esc_html__( 'New Game', 'your-textdomain' ),
			'edit_item'          => esc_html__( 'Edit Game', 'your-textdomain' ),
			'view_item'          => esc_html__( 'View Game', 'your-textdomain' ),
			'update_item'        => esc_html__( 'View Game', 'your-textdomain' ),
			'all_items'          => esc_html__( 'All Games', 'your-textdomain' ),
			'search_items'       => esc_html__( 'Search Games', 'your-textdomain' ),
			'parent_item_colon'  => esc_html__( 'Parent Game', 'your-textdomain' ),
			'not_found'          => esc_html__( 'No Games found', 'your-textdomain' ),
			'not_found_in_trash' => esc_html__( 'No Games found in Trash', 'your-textdomain' ),
			'name'               => esc_html__( 'Games', 'your-textdomain' ),
			'singular_name'      => esc_html__( 'Game', 'your-textdomain' ),
		],
		'public'              => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'show_ui'             => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'show_in_rest'        => true,
		'capability_type'     => 'post',
		'hierarchical'        => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
		'rewrite_no_front'    => false,
		'show_in_menu'        => true,
		'menu_icon'           => 'dashicons-smiley',
		'supports' => [
			'title',
			'editor',
			'thumbnail',
		],
		
		'rewrite' => true
	];

	register_post_type( 'game', $args );
}