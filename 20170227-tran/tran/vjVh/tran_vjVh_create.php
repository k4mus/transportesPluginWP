<?php

function tran_vjVh_create() {
	$Monto = $_POST["Monto"];
	$Razon = $_POST["Razon"];
	$Gasto_ingreso = $_POST["Gasto_ingreso"];
	$fecha = $_POST["fecha"];
	
    //insert
    if (isset($_POST['insert'])) {
        global $wpdb;
        $table_name = $wpdb->prefix ."vjVh";

        $wpdb->insert(
                $table_name, //table
                array( 'Monto' => $Monto , 'Razon' => $Razon , 'Gasto_ingreso' => $Gasto_ingreso , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $message.="Orden de Viaje-Vehiculo inserted";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Viaje-Vehiculo</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">empresa</th>
                    <td><input type="text" name="Monto" value="<?php echo $Monto; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">empresa</th>
                    <td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">empresa</th>
                    <td><input type="text" name="Gasto_ingreso" value="<?php echo $Gasto_ingreso; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
                    <td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width datetime" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
		<a href="<?php echo admin_url('admin.php?page=tran_vjVh_list') ?>">&laquo; Volver</a>
    </div>
    <script>
		$( ".datetime" ).datepicker();
		$( ".datetime" ).onclick(function(){$(this).datepicker('show')});
	</script>
    <?php
}