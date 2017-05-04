<?php

function tran_vjTb_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vjTb";
    $id_vjTb = $_GET["id_vjTb"];
	$id_vj = $_GET["id_vj"];
	$id_tb = $_GET["id_tb"];
	$Rol = $_POST["Rol"];
	$Razon = $_POST["Razon"];
	$Gasto_ingreso = $_POST["Gasto_ingreso"];
	$fecha = $_POST["fecha"];
	//volver
	if($id_vj) $page_volver= "tran_vj_update&id_vj=".$id_vj;
	else
	if($id_tb) $page_volver= "tran_tb_update&id_tb=".$id_tb;
	else
	$page_volver= "tran_vjTb_list";
	
	
	$rows_vj = $wpdb->get_results("SELECT id_vj, name_vj from ".$wpdb->prefix ."vj");  
	$rows_tb = $wpdb->get_results("SELECT id_tb, name_tb from ".$wpdb->prefix ."tb");  
//update
    if (isset($_POST['update'])){
		$id_vj= $_POST["id_vj"];
		$id_tb= $_POST["id_tb"];
		
        $wpdb->update(
                $table_name, //table
				array( 'id_vj' => $id_vj , 'id_tb' => $id_tb ,  'Rol' => $Rol, 'Razon' => $Razon, 'Gasto_ingreso' => $Gasto_ingreso, 'fecha' => $fecha), //data
                array('id_vjTb' => $id_vjTb ), //where
				array('%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vjTb = %s", $id_vjTb));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("
		SELECT id_vjTb 
		 ,id_vj  ,id_tb ,
		 Rol , Razon , Gasto_ingreso , fecha 
		from $table_name where id_vjTb=%s", $id_vjTb));
        foreach ($results as $r) {
            $id_vjTb = $r->id_vjTb;
			$id_vj = $r->id_vj;
			$id_tb = $r->id_tb;
			$Rol = $r->Rol;
			$Razon = $r->Razon;
			$Gasto_ingreso = $r->Gasto_ingreso;
			$fecha = $r->fecha;
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
            <div class="updated"><p>Orden de Viaje-Trabajadores deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje-Trabajadores updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Trabajadores</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_vjTb" value="<?php echo $id_vjTb; ?>" disabled /></td>
					</tr>
					<tr>
						<th>ID_VJ</th>
						<td><select type="text" id= "id_vj" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_vj as $row_vj) { ?>
							<option value="<?php echo $row_vj->id_vj; ?>"><?php if ($row_vj->name_vj)echo $row_vj->name_vj;  else echo $row_vj->id_vj; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>ID_TB</th>
						<td><select type="text" id= "id_tb" name="id_tb" value="<?php echo $id_tb; ?>" <?php if ($id_tb) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_tb as $row_tb) { ?>
							<option value="<?php echo $row_tb->id_tb; ?>"><?php if ($row_tb->name_tb)echo $row_tb->name_tb;  else echo $row_tb->id_tb; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
                    
					<th class="ss-th-width">empresa</th> 
					<td><input type="text" name="Rol" value="<?php echo $Rol; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">empresa</th> 
					<td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">empresa</th> 
					<td><input type="text" name="Gasto_ingreso" value="<?php echo $Gasto_ingreso; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">fecha</th> 
					<td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width fecha" /></td>
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