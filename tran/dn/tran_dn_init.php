<?php
/*
Plugin Name: Transportes
Description: Dineros
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function dn_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."dn";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_dn` MEDIUMINT NOT NULL AUTO_INCREMENT,
				`name_dn` varchar(50) CHARACTER SET utf8,
				`signo` varchar(50) CHARACTER SET utf8,
            PRIMARY KEY (`id_dn`),
            UNIQUE KEY `ix_` (`id_dn`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'dn_options_install');

//menu items
add_action('admin_menu','dn_modifymenu');

function dn_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Dineros', //page title
	'Dineros', //menu title
	'manage_options', //capabilities
	'tran_dn_list', //menu slug
	'tran_dn_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Dineros', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_dn_update', //menu slug
	'tran_dn_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Dineros', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_dn_create', //menu slug
	'tran_dn_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/dn/tran_dn_list.php');
require_once(ROOTDIR . 'tran/dn/tran_dn_create.php');
require_once(ROOTDIR . 'tran/dn/tran_dn_update.php');
