<?php

function tran_rt_create() {
	$name_rt = $_POST["name_rt"];
	$ciudad_orig = $_POST["ciudad_orig"];
	$comuna_orig = $_POST["comuna_orig"];
	$ciudad_dest = $_POST["ciudad_dest"];
	$comuna_orig = $_POST["comuna_orig"];
	$kms = $_POST["kms"];
	$precioBase = $_POST["precioBase"];
	$precioExtencion = $_POST["precioExtencion"];
	
	//volver
	$page_volver= "tran_rt_list";
	 //insert
	global $wpdb;
	
	$rows_ciudad = $wpdb->get_results("SELECT id_ciudad, name_ciudad from ".$wpdb->prefix ."ciudad");  
	$rows_comuna = $wpdb->get_results("SELECT id_comuna, name_comuna from ".$wpdb->prefix ."comuna");  
	$rows_ciudad = $wpdb->get_results("SELECT id_ciudad, name_ciudad from ".$wpdb->prefix ."ciudad");  
	$rows_comuna = $wpdb->get_results("SELECT id_comuna, name_comuna from ".$wpdb->prefix ."comuna");  
    if (isset($_POST['insert'])) {
		
        
        $table_name = $wpdb->prefix ."rt";

        $wpdb->insert(
                $table_name, //table
                array(  'name_rt' => $name_rt , 'ciudad_orig' => $ciudad_orig , 'comuna_orig' => $comuna_orig , 'ciudad_dest' => $ciudad_dest , 'comuna_orig' => $comuna_orig , 'kms' => $kms , 'precioBase' => $precioBase , 'precioExtencion' => $precioExtencion  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_rt =$wpdb->insert_id;
		$message.="Rutas inserted: ".$id_rt;
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Rutas</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_rt_update&id_rt='.$id_rt).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Transporte</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">Nombre Ruta</th>
					<td><input type="text" name="name_rt" value="<?php echo $name_rt; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ciudad Origen</th>
					<td><select type="text" id= "ciudad_orig" name="ciudad_orig" value="<?php echo $ciudad_orig; ?>  " class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_ciudad as $row_ciudad) { ?>
						<option value="<?php echo $row_ciudad->id_ciudad; ?>"><?php echo $row_ciudad->name_ciudad; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Comuna Origen</th>
					<td><select type="text" id= "comuna_orig" name="comuna_orig" value="<?php echo $comuna_orig; ?>  " class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_comuna as $row_comuna) { ?>
						<option value="<?php echo $row_comuna->id_comuna; ?>"><?php echo $row_comuna->name_comuna; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ciudad Destino</th>
					<td><select type="text" id= "ciudad_dest" name="ciudad_dest" value="<?php echo $ciudad_dest; ?>  " class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_ciudad as $row_ciudad) { ?>
						<option value="<?php echo $row_ciudad->id_ciudad; ?>"><?php echo $row_ciudad->name_ciudad; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Comuna Destino</th>
					<td><select type="text" id= "comuna_orig" name="comuna_orig" value="<?php echo $comuna_orig; ?>  " class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_comuna as $row_comuna) { ?>
						<option value="<?php echo $row_comuna->id_comuna; ?>"><?php echo $row_comuna->name_comuna; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Kms Aprox.</th>
					<td><input type="text" name="kms" value="<?php echo $kms; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Precio</th>
					<td><input type="text" name="precioBase" value="<?php echo $precioBase; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Precio Extención</th>
					<td><input type="text" name="precioExtencion" value="<?php echo $precioExtencion; ?>" class="ss-field-width numero" /></td>
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
		
	</script>
    <?php
}