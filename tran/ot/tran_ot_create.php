<?php

function tran_ot_create() {
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix ."ot";

        $wpdb->insert(
                $table_name, //table
                array( 'nombreEmpresa' => $nombreEmpresa , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $message.="Orden de Transporte inserted";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Add New Orden de Transporte</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">empresa</th>
                    <td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class="ss-field-width" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
                    <td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
		<a href="<?php echo admin_url('admin.php?page=tran_ot_list') ?>">&laquo; Volver</a>
    </div>
    <?php
}