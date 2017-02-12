<?php
/*
Plugin Name: Transportes
Description:
Version: 1
Author: Fernando Moreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function ss_options_install() {

    global $wpdb;

    $table_name = $wpdb->prefix . "school";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
            `id` varchar(3) CHARACTER SET utf8 NOT NULL,
            `name` varchar(50) CHARACTER SET utf8 NOT NULL,
            PRIMARY KEY (`id`)
          ) $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ss_options_install');
// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ot_options_install');
//menu items
add_action('admin_menu','trans_modifymenu');
function trans_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Transportes', //page title
	'Menú Transportes', //menu title
	'manage_options', //capabilities
	'menu_transportes', //menu slug
	'sinetiks_schools_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update School', //page title
	'Update', //menu title
	'manage_options', //capability
	'sinetiks_schools_update', //menu slug
	'sinetiks_schools_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'Add New School', //page title
	'Add New', //menu title
	'manage_options', //capability
	'sinetiks_schools_create', //menu slug
	'sinetiks_schools_create'); //function

	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'schools-list.php');
require_once(ROOTDIR . 'schools-create.php');
require_once(ROOTDIR . 'schools-update.php');
require_once(ROOTDIR . 'tran/ot/tran_ot_init.php');