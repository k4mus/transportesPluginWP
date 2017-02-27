<?php

function tran_vjDn_create() {
	$id_vj = $_GET["id_vj"];
	$id_dn = $_GET["id_dn"];
	$Monto = $_POST["Monto"];
	$Razon = $_POST["Razon"];
	$Gasto_ingreso = $_POST["Gasto_ingreso"];
	$fecha = $_POST["fecha"];
	
	//volver
	if($id_vj) $page_volver= "tran_vj_update&id_vj=".$id_vj;
	else
	if($id_dn) $page_volver= "tran_dn_update&id_dn=".$id_dn;
	else
		$page_volver= "tran_vjDn_list";
	
	 //insert
    if (isset($_POST['insert'])) {
		$id_vj= $_POST["id_vj"];
		$id_dn= $_POST["id_dn"];
		
        global $wpdb;
        $table_name = $wpdb->prefix ."vjDn";

        $wpdb->insert(
                $table_name, //table
                array('id_vj'=>$id_vj ,'id_dn'=>$id_dn ,  'Monto' => $Monto , 'Razon' => $Razon , 'Gasto_ingreso' => $Gasto_ingreso , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $message.="Orden de Viaje-Dineros inserted";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Viaje-Dineros</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">ID_viaje</th>
                    <td><input type="text" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">ID_dinero</th>
                    <td><input type="text" name="id_dn" value="<?php echo $id_dn; ?>" <?php if ($id_dn) echo readonly  ?> class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Monto</th>
                    <td><input type="text" name="Monto" value="<?php echo $Monto; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Razon</th>
                    <td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Gasto_ingreso</th>
                    <td><input type="text" name="Gasto_ingreso" value="<?php echo $Gasto_ingreso; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
                    <td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width datetime" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
		<a href="<?php echo admin_url('admin.php?page=tran_vjDn_list') ?>">&laquo; Volver</a>
    </div>
    <script>
		$( ".datetime" ).datepicker();
	</script>
    <?php
}