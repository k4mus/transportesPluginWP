<?php

function tran_vjDn_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vjDn";
    $id_vjDn = $_GET["id_vjDn"];
	$id_vj = $_GET["id_vj"];
	$id_dn = $_GET["id_dn"];
	$Monto = $_POST["Monto"];
	$Razon = $_POST["Razon"];
	$fecha = $_POST["fecha"];
	//volver
	if($id_vj) $page_volver= "tran_vj_update&id_vj=".$id_vj;
	else
	if($id_dn) $page_volver= "tran_dn_update&id_dn=".$id_dn;
	else
	$page_volver= "tran_vjDn_list";
	
	
	$rows_vj = $wpdb->get_results("SELECT id_vj, name_vj from ".$wpdb->prefix ."vj");  
	$rows_dn = $wpdb->get_results("SELECT id_dn, name_dn from ".$wpdb->prefix ."dn");  
//update
    if (isset($_POST['update'])){
		$id_vj= $_POST["id_vj"];
		$id_dn= $_POST["id_dn"];
		
        $wpdb->update(
                $table_name, //table
				array( 'id_vj' => $id_vj , 'id_dn' => $id_dn ,  'Monto' => $Monto, 'Razon' => $Razon, 'fecha' => $fecha), //data
                array('id_vjDn' => $id_vjDn ), //where
				array('%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vjDn = %s", $id_vjDn));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("
		SELECT id_vjDn 
		 ,id_vj  ,id_dn ,
		 Monto , Razon , fecha 
		from $table_name where id_vjDn=%s", $id_vjDn));
        foreach ($results as $r) {
            $id_vjDn = $r->id_vjDn;
			$id_vj = $r->id_vj;
			$id_dn = $r->id_dn;
			$Monto = $r->Monto;
			$Razon = $r->Razon;
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
            <div class="updated"><p>Orden de Viaje-Dineros deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje-Dineros updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Dineros</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_vjDn" value="<?php echo $id_vjDn; ?>" disabled /></td>
					</tr>
					<tr>
						<th>viaje</th>
						<td><select type="text" id= "id_vj" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_vj as $row_vj) { ?>
							<option value="<?php echo $row_vj->id_vj; ?>"><?php if ($row_vj->name_vj)echo $row_vj->name_vj;  else echo $row_vj->id_vj; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<th>dinero</th>
						<td><select type="text" id= "id_dn" name="id_dn" value="<?php echo $id_dn; ?>" <?php if ($id_dn) echo readonly  ?> class="combobox">
							<option value="">Select one...</option>
							<?php foreach ($rows_dn as $row_dn) { ?>
							<option value="<?php echo $row_dn->id_dn; ?>"><?php if ($row_dn->name_dn)echo $row_dn->name_dn;  else echo $row_dn->id_dn; ?></option>
							<?php } ?>
							</select>
						</td>
					</tr>
                    
					<th class="ss-th-width">Monto</th> 
					<td><input type="text" name="Monto" value="<?php echo $Monto; ?>" class="ss-field-width numero" /></td>
					</tr>
					<th class="ss-th-width">Razon</th> 
					<td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class="ss-field-width " /></td>
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