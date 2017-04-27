<?php
/*
Plugin Name: Transportes
Description: Trabajadores
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function tb_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."tb";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_tb` MEDIUMINT NOT NULL AUTO_INCREMENT,
				`name_tb` varchar(50) CHARACTER SET utf8,
				`rut` varchar(50) CHARACTER SET utf8,
				`fechaIng` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`cargo` varchar(50) CHARACTER SET utf8,
            PRIMARY KEY (`id_tb`),
            UNIQUE KEY `ix_` (`id_tb`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'tb_options_install');

//menu items
add_action('admin_menu','tb_modifymenu');

function tb_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Trabajadores', //page title
	'Trabajadores', //menu title
	'manage_options', //capabilities
	'tran_tb_list', //menu slug
	'tran_tb_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Trabajadores', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_tb_update', //menu slug
	'tran_tb_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Trabajadores', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_tb_create', //menu slug
	'tran_tb_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/tb/tran_tb_list.php');
require_once(ROOTDIR . 'tran/tb/tran_tb_create.php');
require_once(ROOTDIR . 'tran/tb/tran_tb_update.php');
