<?php

function tran_ot_update() {
    global $wpdb;
    $table_name = $wpdb->prefix . "ot";
    $id_ot = $_GET["id_ot"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				array( 'nombreEmpresa' => $nombreEmpresa, 'fecha' => $fecha), //data
                array('id_ot' => $id_ot), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_ot = %s", $id_ot));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_ot, nombreEmpresa , fecha  from $table_name where id_ot=%s", $id_ot));
        foreach ($results as $r) {
			$nombreEmpresa = $r->nombreEmpresa;
			$fecha = $r->fecha;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/tran/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Orden de Transporte</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Transporte deleted</p></div>
            <a href="<?php echo admin_url('admin.php?page=tran_ot_list') ?>">&laquo; Volver</a>

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Transporte updated</p></div>
            <a href="<?php echo admin_url('admin.php?page=tran_ot_list') ?>">&laquo; Volver</a>

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
					<tr><th>empresa</th><td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>"/></td></tr>
					<tr><th>fecha</th><td><input type="text" name="fecha" value="<?php echo $fecha; ?>"/></td></tr>
					
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>

    </div>
    <?php
}