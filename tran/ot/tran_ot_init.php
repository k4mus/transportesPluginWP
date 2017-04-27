<?php
/*
Plugin Name: Transportes
Description: Orden de Transporte
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function ot_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."ot";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_ot` MEDIUMINT NOT NULL AUTO_INCREMENT,
				`name_ot` varchar(50) CHARACTER SET utf8,
				`rutEmpOrig` varchar(50) CHARACTER SET utf8,
				`nomEmporig` varchar(50) CHARACTER SET utf8,
				`telEmpOrig` MEDIUMINT,
				`id_rt` MEDIUMINT ,
				`dirEmpOrig` varchar(50) CHARACTER SET utf8,
				`ciudEmpOrig` varchar(50) CHARACTER SET utf8,
				`nomPerOrig` varchar(50) CHARACTER SET utf8,
				`fechaOrig` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`rutEmpDest` varchar(50) CHARACTER SET utf8,
				`nomEmpDest` varchar(50) CHARACTER SET utf8,
				`telEmpDest` varchar(50) CHARACTER SET utf8,
				`dirEmpDest` varchar(50) CHARACTER SET utf8,
				`ciudEmpDest` varchar(50) CHARACTER SET utf8,
				`nomPerDest` varchar(50) CHARACTER SET utf8,
				`fechaDest` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`formaPago` varchar(50) CHARACTER SET utf8,
				`cuentaCte` varchar(50) CHARACTER SET utf8,
				`boletaFactura` varchar(50) CHARACTER SET utf8,
				`nroPiezas` MEDIUMINT,
				`pesoCarga` MEDIUMINT,
				`largoCarga` MEDIUMINT,
				`anchoCarga` MEDIUMINT,
				`altoCarga` MEDIUMINT,
				`documentos` varchar(50) CHARACTER SET utf8,
				`instrucciones` varchar(50) CHARACTER SET utf8,
            PRIMARY KEY (`id_ot`),
            UNIQUE KEY `ix_` (`id_ot`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'ot_options_install');

//menu items
add_action('admin_menu','ot_modifymenu');

function ot_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Orden de Transporte', //page title
	'Orden de Transporte', //menu title
	'manage_options', //capabilities
	'tran_ot_list', //menu slug
	'tran_ot_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Orden de Transporte', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_ot_update', //menu slug
	'tran_ot_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Orden de Transporte', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_ot_create', //menu slug
	'tran_ot_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/ot/tran_ot_list.php');
require_once(ROOTDIR . 'tran/ot/tran_ot_create.php');
require_once(ROOTDIR . 'tran/ot/tran_ot_update.php');
