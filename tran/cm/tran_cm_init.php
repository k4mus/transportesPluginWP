<?php
/*
Plugin Name: Transportes
Description: Camiones
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function cm_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."cm";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_cm` MEDIUMINT NOT NULL AUTO_INCREMENT,
            	`nombreEmpresa` varchar(50) CHARACTER SET utf8 NOT NULL ,
            	`fecha` varchar(50) CHARACTER SET utf8 NOT NULL ,
            PRIMARY KEY (`id_cm`),
            UNIQUE KEY `ix_` (`id_cm`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'cm_options_install');

//menu items
add_action('admin_menu','cm_modifymenu');

function cm_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Camiones', //page title
	'Camiones', //menu title
	'manage_options', //capabilities
	'tran_cm_list', //menu slug
	'tran_cm_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Camiones', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_cm_update', //menu slug
	'tran_cm_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Camiones', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_cm_create', //menu slug
	'tran_cm_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/cm/tran_cm_list.php');
require_once(ROOTDIR . 'tran/cm/tran_cm_create.php');
require_once(ROOTDIR . 'tran/cm/tran_cm_update.php');
