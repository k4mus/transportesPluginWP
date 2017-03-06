<?php
/*
Plugin Name: Transportes
Description: Orden de Viaje
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function vj_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."vj";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_vj` MEDIUMINT NOT NULL AUTO_INCREMENT,
				`nombreEmpresa` varchar(50) CHARACTER SET utf8,
				`fecha` varchar(11) CHARACTER SET utf8 NOT NULL ,
            PRIMARY KEY (`id_vj`),
            UNIQUE KEY `ix_` (`id_vj`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'vj_options_install');

//menu items
add_action('admin_menu','vj_modifymenu');

function vj_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Orden de Viaje', //page title
	'Orden de Viaje', //menu title
	'manage_options', //capabilities
	'tran_vj_list', //menu slug
	'tran_vj_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Orden de Viaje', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_vj_update', //menu slug
	'tran_vj_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Orden de Viaje', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_vj_create', //menu slug
	'tran_vj_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/vj/tran_vj_list.php');
require_once(ROOTDIR . 'tran/vj/tran_vj_create.php');
require_once(ROOTDIR . 'tran/vj/tran_vj_update.php');
