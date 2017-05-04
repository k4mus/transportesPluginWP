<?php

function tran_vjVh_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vjVh";
    $id_vjVh = $_GET["id_vjVh"];
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
	
	
	$rows_vj = $wpdb->get_results("SELECT id_vj, name_vj from ".$wpdb->prefix ."vj");  
	$rows_vh = $wpdb->get_results("SELECT id_vh, name_vh from ".$wpdb->prefix ."vh");  
//update
    if (isset($_POST['update'])){
		$id_vj= $_POST["id_vj"];
		$id_vh= $_POST["id_vh"];
		
        $wpdb->update(
                $table_name, //table
				array( 'id_vj' => $id_vj , 'id_vh' => $id_vh ,  'km' => $km, 'fecha' => $fecha, 'estanque' => $estanque, 'obvservacion' => $obvservacion), //data
                array('id_vjVh' => $id_vjVh ), //where
				array('%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vjVh = %s", $id_vjVh));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("
		SELECT id_vjVh 
		 ,id_vj  ,id_vh ,
		 km , fecha , estanque , obvservacion 
		from $table_name where id_vjVh=%s", $id_vjVh));
        foreach ($results as $r) {
            $id_vjVh = $r->id_vjVh;
			$id_vj = $r->id_vj;
			$id_vh = $r->id_vh;
			$km = $r->km;
			$fecha = $r->fecha;
			$estanque = $r->estanque;
			$obvservacion = $r->obvservacion;
        }
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/css/ui.jqgrid.min.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/js/jquery.jqgrid.min.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    <div class="wrap">
        <h2></h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Viaje-Vehiculo deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje-Vehiculo updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Vehiculo</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_vjVh" value="<?php echo $id_vjVh; ?>" disabled /></td>
					</tr>
					<tr>
						<th>ID_viaje</th>
						<td><select type="text" id= "id_vj" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_vj as $row_vj) { ?>
							<option value="<?php echo $row_vj->id_vj; ?>"><?php if ($row_vj->name_vj)echo $row_vj->name_vj;  else echo $row_vj->id_vj; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>ID_vehiculo</th>
						<td><select type="text" id= "id_vh" name="id_vh" value="<?php echo $id_vh; ?>" <?php if ($id_vh) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_vh as $row_vh) { ?>
							<option value="<?php echo $row_vh->id_vh; ?>"><?php if ($row_vh->name_vh)echo $row_vh->name_vh;  else echo $row_vh->id_vh; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
                    
					<th class="ss-th-width">Kilomentros al inicio</th> 
					<td><input type="text" name="km" value="<?php echo $km; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">fecha</th> 
					<td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Estanque</th> 
					<td>
						<input type="radio" name="estanque" value="1/4" <?php if ($estanque=="1/4") echo 'checked' ?> />1/4
						<input type="radio" name="estanque" value="1/2" <?php if ($estanque=="1/2") echo 'checked' ?> />1/2
						<input type="radio" name="estanque" value="3/4" <?php if ($estanque=="3/4") echo 'checked' ?> />3/4
						<input type="radio" name="estanque" value="lleno" <?php if ($estanque=="lleno") echo 'checked' ?> />lleno
					</td>
					</tr>
					<th class="ss-th-width">Obvservación</th> 
					<td><input type="text" name="obvservacion" value="<?php echo $obvservacion; ?>" class="ss-field-width " /></td>
					</tr>
                </table>
				<div id='pager'></div>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
		</div>
        <?php } ?>
			<a href="<?php echo admin_url('admin.php?page='.$page_volver) ?>">&laquo; Volver</a>
			
    </div>
    <script>
		$( ".fecha" ).datepicker();
		$( "#tabs" ).tabs();
		$('.combobox').each( function( index, element ){
			$("option[value="+$(this).attr("value")+"]", this).attr('selected','selected');
		});
		$( ".numero" ).spinner();
		
	</script>
    <?php
}