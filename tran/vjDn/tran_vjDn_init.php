<?php
/*
Plugin Name: Transportes
Description: Orden de Viaje-Dineros
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function vjDn_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."vjDn";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_vjDn` MEDIUMINT NOT NULL AUTO_INCREMENT,
			`id_vj` MEDIUMINT NOT NULL ,
			`id_Dn` MEDIUMINT NOT NULL ,
            	`Monto` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`Razon` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`Gasto_ingreso` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`fecha` varchar(50) CHARACTER SET utf8 NOT NULL ,
            PRIMARY KEY (`id_vjDn`),
            UNIQUE KEY `ix_` (`id_vjDn`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'vjDn_options_install');

//menu items
add_action('admin_menu','vjDn_modifymenu');

function vjDn_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Orden de Viaje-Dineros', //page title
	'Orden de Viaje-Dineros', //menu title
	'manage_options', //capabilities
	'tran_vjDn_list', //menu slug
	'tran_vjDn_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Orden de Viaje-Dineros', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_vjDn_update', //menu slug
	'tran_vjDn_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Orden de Viaje-Dineros', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_vjDn_create', //menu slug
	'tran_vjDn_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/vjDn/tran_vjDn_list.php');
require_once(ROOTDIR . 'tran/vjDn/tran_vjDn_create.php');
require_once(ROOTDIR . 'tran/vjDn/tran_vjDn_update.php');
