<?php
/*
Plugin Name: Transportes
Description: Registro de Gastos
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function rg_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."rg";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_rg` MEDIUMINT NOT NULL AUTO_INCREMENT,
            	`nombreEmpresa` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`fecha` varchar(50) CHARACTER SET utf8 NOT NULL ,
            PRIMARY KEY (`id_rg`),
            UNIQUE KEY `ix_` (`id_rg`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'rg_options_install');

//menu items
add_action('admin_menu','rg_modifymenu');

function rg_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Registro de Gastos', //page title
	'Registro de Gastos', //menu title
	'manage_options', //capabilities
	'tran_rg_list', //menu slug
	'tran_rg_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Registro de Gastos', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_rg_update', //menu slug
	'tran_rg_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Registro de Gastos', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_rg_create', //menu slug
	'tran_rg_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/rg/tran_rg_list.php');
require_once(ROOTDIR . 'tran/rg/tran_rg_create.php');
require_once(ROOTDIR . 'tran/rg/tran_rg_update.php');
