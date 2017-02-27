<?php
/*
Plugin Name: Transportes
Description: Orden de Viaje-Trabajadores
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function vjTb_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."vjTb";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_vjTb` MEDIUMINT NOT NULL AUTO_INCREMENT,
			`id_vj` MEDIUMINT NOT NULL,
			`id_tb` MEDIUMINT NOT NULL,
            	`Monto` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`Razon` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`Gasto_ingreso` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`fecha` varchar(50) CHARACTER SET utf8 NOT NULL ,
            PRIMARY KEY (`id_vjTb`),
            UNIQUE KEY `ix_` (`id_ovTb`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'vjTb_options_install');

//menu items
add_action('admin_menu','vjTb_modifymenu');

function vjTb_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Orden de Viaje-Trabajadores', //page title
	'Orden de Viaje-Trabajadores', //menu title
	'manage_options', //capabilities
	'tran_vjTb_list', //menu slug
	'tran_vjTb_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Orden de Viaje-Trabajadores', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_vjTb_update', //menu slug
	'tran_vjTb_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Orden de Viaje-Trabajadores', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_vjTb_create', //menu slug
	'tran_vjTb_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/vjTb/tran_vjTb_list.php');
require_once(ROOTDIR . 'tran/vjTb/tran_vjTb_create.php');
require_once(ROOTDIR . 'tran/vjTb/tran_vjTb_update.php');
