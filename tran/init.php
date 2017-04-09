<?php
/*
Plugin Name: Transportes
*/
// function to create the DB / Options / Defaults					

// run the install scripts upon plugin activation
register_activation_hook(__FILE__, 'tb_options_install');
register_activation_hook(__FILE__, 'vh_options_install');
register_activation_hook(__FILE__, 'rt_options_install');
register_activation_hook(__FILE__, 'dn_options_install');
register_activation_hook(__FILE__, 'ot_options_install');
register_activation_hook(__FILE__, 'vj_options_install');
register_activation_hook(__FILE__, 'vjDn_options_install');
register_activation_hook(__FILE__, 'vjVh_options_install');
register_activation_hook(__FILE__, 'vjTb_options_install');
register_activation_hook(__FILE__, 'otRt_options_install');
// run the install scripts upon plugin activation

//menu items
add_action('admin_menu','trans_modifymenu');
function trans_modifymenu() {
	
	//this is the main item for the menu
	add_menu_page('Transportes', //page title
	'Men&uacute; Transportes', //menu title
	'manage_options', //capabilities
	'menu_transportes', //menu slug
	'' //function
	);
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'tran/tb/tran_tb_init.php');
require_once(ROOTDIR . 'tran/vh/tran_vh_init.php');
require_once(ROOTDIR . 'tran/rt/tran_rt_init.php');
require_once(ROOTDIR . 'tran/dn/tran_dn_init.php');
require_once(ROOTDIR . 'tran/ot/tran_ot_init.php');
require_once(ROOTDIR . 'tran/vj/tran_vj_init.php');
require_once(ROOTDIR . 'tran/vjDn/tran_vjDn_init.php');
require_once(ROOTDIR . 'tran/vjVh/tran_vjVh_init.php');
require_once(ROOTDIR . 'tran/vjTb/tran_vjTb_init.php');
require_once(ROOTDIR . 'tran/otRt/tran_otRt_init.php');


