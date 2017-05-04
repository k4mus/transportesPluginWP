<?php

function tran_vjTb_create() {
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
	 //insert
	global $wpdb;
	$rows_vj = $wpdb->get_results("SELECT id_vj, name_vj from ".$wpdb->prefix ."vj");  
	$rows_tb = $wpdb->get_results("SELECT id_tb, name_tb from ".$wpdb->prefix ."tb");  
    
    if (isset($_POST['insert'])) {
		$id_vj= $_POST["id_vj"];
		$id_tb= $_POST["id_tb"];
		
        
        $table_name = $wpdb->prefix ."vjTb";

        $wpdb->insert(
                $table_name, //table
                array('id_vj'=>$id_vj ,'id_tb'=>$id_tb ,  'Rol' => $Rol , 'Razon' => $Razon , 'Gasto_ingreso' => $Gasto_ingreso , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_vjTb =$wpdb->insert_id;
		$message.="Orden de Viaje-Trabajadores inserted: ".$id_vjTb;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Viaje-Trabajadores</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_vjTb_update&id_vjTb='.$id_vjTb).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Trabajadores</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">ID_VJ</th>
                    <td><select type="text" id= "id_vj" name="id_vj" value="<?php echo $id_vj; ?>" <?php if ($id_vj) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_vj as $row_vj) { ?>
						<option value="<?php echo $row_vj->id_vj; ?>"><?php if ( $row_vj->name_vj)echo $row_vj->name_vj;  else echo $row_vj->id_vj; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">ID_TB</th>
                    <td><select type="text" id= "id_tb" name="id_tb" value="<?php echo $id_tb; ?>" <?php if ($id_tb) echo readonly  ?> class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_tb as $row_tb) { ?>
						<option value="<?php echo $row_tb->id_tb; ?>"><?php if ( $row_tb->name_tb)echo $row_tb->name_tb;  else echo $row_tb->id_tb; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">empresa</th>
					<td><input type="text" name="Rol" value="<?php echo $Rol; ?>" class="ss-field-width " /></td>
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