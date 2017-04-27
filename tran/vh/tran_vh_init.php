<?php
/*
Plugin Name: Transportes
Description: Vehiculos
Version: 1
Author: fmoreno
Author URI: http://
*/
// function to create the DB / Options / Defaults					
function vh_options_install() {

    global $wpdb;
	
    $table_name = $wpdb->prefix ."vh";
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "
	DROP TABLE IF EXISTS `$table_name`;
	
	CREATE TABLE $table_name (
            `id_vh` MEDIUMINT NOT NULL AUTO_INCREMENT,
				`name_vh` varchar(50) CHARACTER SET utf8,
				`tipo` varchar(50) CHARACTER SET utf8,
				`Tonelaje` MEDIUMINT,
				`Patente` varchar(50) CHARACTER SET utf8,
				`Marca` varchar(50) CHARACTER SET utf8,
				`Modelo` varchar(50) CHARACTER SET utf8,
				`Año` varchar(50) CHARACTER SET utf8,
				`FechaCompra` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`estanque` MEDIUMINT,
				`zona` varchar(50) CHARACTER SET utf8,
				`rendimiento` MEDIUMINT,
				`fecUltMantencion` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`fecRevTecnica` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`fecGases` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`fecPermCirculacion` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`fecCambioAceite` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`fecCambioFiltro` varchar(11) CHARACTER SET utf8 NOT NULL ,
				`neumaticoRepuesto` varchar(50) CHARACTER SET utf8,
				`herramientas` varchar(50) CHARACTER SET utf8,
				`chalecoReflectante` varchar(50) CHARACTER SET utf8,
            PRIMARY KEY (`id_vh`),
            UNIQUE KEY `ix_` (`id_vh`)
          ) AUTO_INCREMENT=0 $charset_collate; ";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($sql);
}

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'vh_options_install');

//menu items
add_action('admin_menu','vh_modifymenu');

function vh_modifymenu() {
	
	//this is the main item for the menu
	add_submenu_page("menu_transportes",
	'Vehiculos', //page title
	'Vehiculos', //menu title
	'manage_options', //capabilities
	'tran_vh_list', //menu slug
	'tran_vh_list' //function
	);

	//this submenu is HIDDEN, however, we need to add it anyways
	add_submenu_page(null, //parent slug
	'Update Vehiculos', //page title
	'Update', //menu title
	'manage_options', //capability
	'tran_vh_update', //menu slug
	'tran_vh_update'); //function

	//this is a submenu
	add_submenu_page(null, //parent slug
	'New Vehiculos', //page title
	'New', //menu title
	'manage_options', //capability
	'tran_vh_create', //menu slug
	'tran_vh_create'); //function
	
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/vh/tran_vh_list.php');
require_once(ROOTDIR . 'tran/vh/tran_vh_create.php');
require_once(ROOTDIR . 'tran/vh/tran_vh_update.php');
