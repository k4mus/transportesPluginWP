<?php

function tran_vjVh_create() {
	$id_vj = $_GET["id_vj"];
	$id_vh = $_GET["id_vh"];
	$km = $_POST["km"];
	$fecha = $_POST["fecha"];
	$estanque = $_POST["estanque"];
	$obvservacion = $_POST["obvservacion"];
	
	//volver
	if($id_vj) $page_volver= "tran_vj_update&id_vj=".$id_vj;
	else
	if($id_vh) $page_volver= "tran_vh_update&id_vh=".$id_vh;
	else
	$page_volver= "tran_vjVh_list";
	 //insert
	global $wpdb;
	$rows_vj = $wpdb->get_results("SELECT id_vj, name_vj from ".$wpdb->prefix ."vj");  
	$rows_vh = $wpdb->get_results("SELECT id_vh, name_vh from ".$wpdb->prefix ."vh");  
    
    if (isset($_POST['insert'])) {
		$id_vj= $_POST["id_vj"];
		$id_vh= $_POST["id_vh"];
		
        
        $table_name = $wpdb->prefix ."vjVh";

        $wpdb->insert(
                $table_name, //table
                array('id_vj'=>$id_vj ,'id_vh'=>$id_vh ,  'km' => $km , 'fecha' => $fecha , 'estanque' => $estanque , 'obvservacion' => $obvservacion  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_vjVh =$wpdb->insert_id;
		$message.="Orden de Viaje-Vehiculo inserted: ".$id_vjVh;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Viaje-Vehiculo</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_vjVh_update&id_vjVh='.$id_vjVh).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Vehiculo</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">ID_viaje</th>
                    <td><select type="text" id= "id_vj" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_vj as $row_vj) { ?>
						<option value="<?php echo $row_vj->id_vj; ?>"><?php if ( $row_vj->name_vj)echo $row_vj->name_vj;  else echo $row_vj->id_vj; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">ID_vehiculo</th>
                    <td><select type="text" id= "id_vh" name="id_vh" value="<?php echo $id_vh; ?>" <?php if ($id_vh) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_vh as $row_vh) { ?>
						<option value="<?php echo $row_vh->id_vh; ?>"><?php if ( $row_vh->name_vh)echo $row_vh->name_vh;  else echo $row_vh->id_vh; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Kilomentros al inicio</th>
					<td><input type="text" name="km" value="<?php echo $km; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
					<td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Estanque</th>
					<td>
						<input type="radio" name="estanque" value="1/4"/>1/4
						<input type="radio" name="estanque" value="1/2"/>1/2
						<input type="radio" name="estanque" value="3/4"/>3/4
						<input type="radio" name="estanque" value="lleno"/>lleno
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Obvservación</th>
					<td><input type="text" name="obvservacion" value="<?php echo $obvservacion; ?>" class="ss-field-width " /></td>
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