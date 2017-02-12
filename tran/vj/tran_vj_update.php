<?php

function tran_vj_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vj";
    $id_vj = $_GET["id_vj"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				array( 'nombreEmpresa' => $nombreEmpresa, 'fecha' => $fecha), //data
                array('id_vj' => $id_vj), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vj = %s", $id_vj));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_vj, nombreEmpresa , fecha  from $table_name where id_vj=%s", $id_vj));
        foreach ($results as $r) {
            $id_vj = $r->id_vj;
			$nombreEmpresa = $r->nombreEmpresa;
			$fecha = $r->fecha;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Orden de Viaje</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Viaje deleted</p></div>
            

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje updated</p></div>
            

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>ID</th><td><input type="text" name="id_vj" value="<?php echo $id_vj; ?>"/></td></tr>
					<tr><th>empresa</th><td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>"/></td></tr>
					<tr><th>fecha</th><td><input type="text" name="fecha" value="<?php echo $fecha; ?>"/></td></tr>
					
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>
			<a href="<?php echo admin_url('admin.php?page=tran_vj_list') ?>">&laquo; Volver</a>
    </div>
    <?php
}