<?php
/*
Plugin Name: Transportes
Description: Orden de Transporte - Ruta
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function otRt_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."otRt";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_otRt` MEDIUMINT NOT NULL AUTO_INCREMENT,
			`id_ot` MEDIUMINT NOT NULL,
			`id_rt` MEDIUMINT NOT NULL,
				`Monto` varchar(50) CHARACTER SET utf8,
				`Razon` varchar(50) CHARACTER SET utf8,
				`Gasto_ingreso` varchar(50) CHARACTER SET utf8,
				`fecha` varchar(11) CHARACTER SET utf8 NOT NULL ,
            PRIMARY KEY (`id_otRt`),
            UNIQUE KEY `ix_` (`id_otRt`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'otRt_options_install');

//menu items
add_action('admin_menu','otRt_modifymenu');

function otRt_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Orden de Transporte - Ruta', //page title
	'Orden de Transporte - Ruta', //menu title
	'manage_options', //capabilities
	'tran_otRt_list', //menu slug
	'tran_otRt_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Orden de Transporte - Ruta', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_otRt_update', //menu slug
	'tran_otRt_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Orden de Transporte - Ruta', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_otRt_create', //menu slug
	'tran_otRt_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/otRt/tran_otRt_list.php');
require_once(ROOTDIR . 'tran/otRt/tran_otRt_create.php');
require_once(ROOTDIR . 'tran/otRt/tran_otRt_update.php');
