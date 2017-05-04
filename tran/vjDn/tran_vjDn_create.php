<?php

function tran_vjDn_create() {
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
	 //insert
	global $wpdb;
	$rows_vj = $wpdb->get_results("SELECT id_vj, name_vj from ".$wpdb->prefix ."vj");  
	$rows_dn = $wpdb->get_results("SELECT id_dn, name_dn from ".$wpdb->prefix ."dn");  
    
    if (isset($_POST['insert'])) {
		$id_vj= $_POST["id_vj"];
		$id_dn= $_POST["id_dn"];
		
        
        $table_name = $wpdb->prefix ."vjDn";

        $wpdb->insert(
                $table_name, //table
                array('id_vj'=>$id_vj ,'id_dn'=>$id_dn ,  'Monto' => $Monto , 'Razon' => $Razon , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_vjDn =$wpdb->insert_id;
		$message.="Orden de Viaje-Dineros inserted: ".$id_vjDn;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Viaje-Dineros</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_vjDn_update&id_vjDn='.$id_vjDn).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Dineros</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">viaje</th>
                    <td><select type="text" id= "id_vj" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_vj as $row_vj) { ?>
						<option value="<?php echo $row_vj->id_vj; ?>"><?php if ( $row_vj->name_vj)echo $row_vj->name_vj;  else echo $row_vj->id_vj; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">dinero</th>
                    <td><select type="text" id= "id_dn" name="id_dn" value="<?php echo $id_dn; ?>" <?php if ($id_dn) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_dn as $row_dn) { ?>
						<option value="<?php echo $row_dn->id_dn; ?>"><?php if ( $row_dn->name_dn)echo $row_dn->name_dn;  else echo $row_dn->id_dn; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Monto</th>
					<td><input type="text" name="Monto" value="<?php echo $Monto; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Razon</th>
					<td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class="ss-field-width " /></td>
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