<?php
/*
Plugin Name: Transportes
Description: Rutas
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function rt_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."rt";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_rt` MEDIUMINT NOT NULL AUTO_INCREMENT,
				`name_rt` varchar(50) CHARACTER SET utf8,
				`ciudad_orig` varchar(50) CHARACTER SET utf8,
				`comuna_orig` varchar(50) CHARACTER SET utf8,
				`ciudad_dest` varchar(50) CHARACTER SET utf8,
				`comuna_orig` varchar(50) CHARACTER SET utf8,
				`kms` MEDIUMINT,
				`precioBase` MEDIUMINT,
				`precioExtencion` MEDIUMINT,
            PRIMARY KEY (`id_rt`),
            UNIQUE KEY `ix_` (`id_rt`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'rt_options_install');

//menu items
add_action('admin_menu','rt_modifymenu');

function rt_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Rutas', //page title
	'Rutas', //menu title
	'manage_options', //capabilities
	'tran_rt_list', //menu slug
	'tran_rt_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Rutas', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_rt_update', //menu slug
	'tran_rt_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Rutas', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_rt_create', //menu slug
	'tran_rt_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/rt/tran_rt_list.php');
require_once(ROOTDIR . 'tran/rt/tran_rt_create.php');
require_once(ROOTDIR . 'tran/rt/tran_rt_update.php');
