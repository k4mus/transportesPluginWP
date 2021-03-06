<?php

function tran_otRt_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."otRt";
    $id_otRt = $_GET["id_otRt"];
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
	
	
	$rows_ot = $wpdb->get_results("SELECT id_ot, name_ot from ".$wpdb->prefix ."ot");  
	$rows_rt = $wpdb->get_results("SELECT id_rt, name_rt from ".$wpdb->prefix ."rt");  
//update
    if (isset($_POST['update'])){
		$id_ot= $_POST["id_ot"];
		$id_rt= $_POST["id_rt"];
		
        $wpdb->update(
                $table_name, //table
				array( 'id_ot' => $id_ot , 'id_rt' => $id_rt ,  'Monto' => $Monto, 'Razon' => $Razon, 'Gasto_ingreso' => $Gasto_ingreso, 'fecha' => $fecha), //data
                array('id_otRt' => $id_otRt ), //where
				array('%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_otRt = %s", $id_otRt));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("
		SELECT id_otRt 
		 ,id_ot  ,id_rt ,
		 Monto , Razon , Gasto_ingreso , fecha 
		from $table_name where id_otRt=%s", $id_otRt));
        foreach ($results as $r) {
            $id_otRt = $r->id_otRt;
			$id_ot = $r->id_ot;
			$id_rt = $r->id_rt;
			$Monto = $r->Monto;
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
            <div class="updated"><p>Orden de Transporte - Ruta deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Transporte - Ruta updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Transporte - Ruta</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_otRt" value="<?php echo $id_otRt; ?>" disabled /></td>
					</tr>
					<tr>
						<th>ID_OrdenTrans</th>
						<td><select type="text" id= "id_ot" name="id_ot" value="<?php echo $id_ot; ?>" <?php if ($id_ot) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_ot as $row_ot) { ?>
							<option value="<?php echo $row_ot->id_ot; ?>"><?php if ($row_ot->name_ot)echo $row_ot->name_ot;  else echo $row_ot->id_ot; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>ID_ruta</th>
						<td><select type="text" id= "id_rt" name="id_rt" value="<?php echo $id_rt; ?>" <?php if ($id_rt) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_rt as $row_rt) { ?>
							<option value="<?php echo $row_rt->id_rt; ?>"><?php if ($row_rt->name_rt)echo $row_rt->name_rt;  else echo $row_rt->id_rt; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
                    
					<th class="ss-th-width">Monto</th> 
					<td><input type="text" name="Monto" value="<?php echo $Monto; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Razon</th> 
					<td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Gasto</th> 
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