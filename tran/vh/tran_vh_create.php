<?php

function tran_vh_create() {
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
	//volver
	
	 //insert
    if (isset($_POST['insert'])) {
		
        global $wpdb;
        $table_name = $wpdb->prefix ."vh";

        $wpdb->insert(
                $table_name, //table
                array(  'nombreEmpresa' => $nombreEmpresa , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $message.="Vehiculos inserted";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="wrap">
        <h2>Add New Vehiculos</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">empresa</th>
                    <td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
                    <td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width datetime" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
		<a href="<?php echo admin_url('admin.php?page=tran_vh_list') ?>">&laquo; Volver</a>
    </div>
    <script>
		$( ".datetime" ).datepicker();
	</script>
    <?php
}