<?php

function tran_otRt_create() {
	$id_ot = $_GET["id_ot"];
	$id_rt = $_GET["id_rt"];
	$Monto = $_POST["Monto"];
	$Razon = $_POST["Razon"];
	$Gasto_ingreso = $_POST["Gasto_ingreso"];
	$fecha = $_POST["fecha"];
	
	//volver
	if($id_ot) $page_volver= "tran_ot_update&id_ot=".$id_ot;
	else
	if($id_rt) $page_volver= "tran_rt_update&id_rt=".$id_rt;
	else
	$page_volver= "tran_otRt_list";
	 //insert
	global $wpdb;
	$rows_ot = $wpdb->get_results("SELECT id_ot, name_ot from ".$wpdb->prefix ."ot");  
	$rows_rt = $wpdb->get_results("SELECT id_rt, name_rt from ".$wpdb->prefix ."rt");  
    
    if (isset($_POST['insert'])) {
		$id_ot= $_POST["id_ot"];
		$id_rt= $_POST["id_rt"];
		
        
        $table_name = $wpdb->prefix ."otRt";

        $wpdb->insert(
                $table_name, //table
                array('id_ot'=>$id_ot ,'id_rt'=>$id_rt ,  'Monto' => $Monto , 'Razon' => $Razon , 'Gasto_ingreso' => $Gasto_ingreso , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_otRt =$wpdb->insert_id;
		$message.="Orden de Transporte - Ruta inserted: ".$id_otRt;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Transporte - Ruta</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_otRt_update&id_otRt='.$id_otRt).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Transporte - Ruta</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">ID_OrdenTrans</th>
                    <td><select type="text" id= "id_ot" name="id_ot" value="<?php echo $id_ot; ?>" <?php if ($id_ot) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_ot as $row_ot) { ?>
						<option value="<?php echo $row_ot->id_ot; ?>"><?php if ( $row_ot->name_ot)echo $row_ot->name_ot;  else echo $row_ot->id_ot; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">ID_ruta</th>
                    <td><select type="text" id= "id_rt" name="id_rt" value="<?php echo $id_rt; ?>" <?php if ($id_rt) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_rt as $row_rt) { ?>
						<option value="<?php echo $row_rt->id_rt; ?>"><?php if ( $row_rt->name_rt)echo $row_rt->name_rt;  else echo $row_rt->id_rt; ?></option>
						<?php } ?>
						</select>
					</td>
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
                    <th class="ss-th-width">Gasto</th>
					<td><input type="text" name="Gasto_ingreso" value="<?php echo $Gasto_ingreso; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
					<td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width fecha" /></td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
		</div>
		</div>
		<a href="<?php echo admin_url('admin.php?page='.$page_volver) ?>">&laquo; Volver</a>
    </div>
	<script>
		$( ".fecha" ).datepicker();
		$( ".numero" ).spinner();
		$("#tabs" ).tabs();
		$('.combobox').each( function( index, element ){
			$("option[value="+$(this).attr("value")+"]", this).attr('selected','selected');
		});
	</script>
    <?php
}