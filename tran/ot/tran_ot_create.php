<?php

function tran_ot_create() {
	$rutEmpOrig = $_POST["rutEmpOrig"];
	$nomEmporig = $_POST["nomEmporig"];
	$telEmpOrig = $_POST["telEmpOrig"];
	$id_rt = $_POST["id_rt"];
	$dirEmpOrig = $_POST["dirEmpOrig"];
	$ciudEmpOrig = $_POST["ciudEmpOrig"];
	$nomPerOrig = $_POST["nomPerOrig"];
	$fechaOrig = $_POST["fechaOrig"];
	$rutEmpDest = $_POST["rutEmpDest"];
	$nomEmpDest = $_POST["nomEmpDest"];
	$telEmpDest = $_POST["telEmpDest"];
	$dirEmpDest = $_POST["dirEmpDest"];
	$ciudEmpDest = $_POST["ciudEmpDest"];
	$nomPerDest = $_POST["nomPerDest"];
	$fechaDest = $_POST["fechaDest"];
	$formaPago = $_POST["formaPago"];
	$cuentaCte = $_POST["cuentaCte"];
	$boletaFactura = $_POST["boletaFactura"];
	$nroPiezas = $_POST["nroPiezas"];
	$pesoCarga = $_POST["pesoCarga"];
	$largoCarga = $_POST["largoCarga"];
	$anchoCarga = $_POST["anchoCarga"];
	$altoCarga = $_POST["altoCarga"];
	$documentos = $_POST["documentos"];
	$instrucciones = $_POST["instrucciones"];
	
	//volver
	$page_volver= "tran_ot_list";
	 //insert
	global $wpdb;
	
	$rows_rt = $wpdb->get_results("SELECT id_rt, name_rt from ".$wpdb->prefix ."rt");  
    if (isset($_POST['insert'])) {
		
        
        $table_name = $wpdb->prefix ."ot";

        $wpdb->insert(
                $table_name, //table
                array(  'rutEmpOrig' => $rutEmpOrig , 'nomEmporig' => $nomEmporig , 'telEmpOrig' => $telEmpOrig , 'id_rt' => $id_rt , 'dirEmpOrig' => $dirEmpOrig , 'ciudEmpOrig' => $ciudEmpOrig , 'nomPerOrig' => $nomPerOrig , 'fechaOrig' => $fechaOrig , 'rutEmpDest' => $rutEmpDest , 'nomEmpDest' => $nomEmpDest , 'telEmpDest' => $telEmpDest , 'dirEmpDest' => $dirEmpDest , 'ciudEmpDest' => $ciudEmpDest , 'nomPerDest' => $nomPerDest , 'fechaDest' => $fechaDest , 'formaPago' => $formaPago , 'cuentaCte' => $cuentaCte , 'boletaFactura' => $boletaFactura , 'nroPiezas' => $nroPiezas , 'pesoCarga' => $pesoCarga , 'largoCarga' => $largoCarga , 'anchoCarga' => $anchoCarga , 'altoCarga' => $altoCarga , 'documentos' => $documentos , 'instrucciones' => $instrucciones  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_ot =$wpdb->insert_id;
		$message.="Orden de Transporte inserted: ".$id_ot;
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Transporte</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_ot_update&id_ot='.$id_ot).'"
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
                    <th class="ss-th-width">Rut Empresa Origen</th>
					<td><input type="text" name="rutEmpOrig" value="<?php echo $rutEmpOrig; ?>" class="ss-field-width rut" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Nombre Empresa Origen</th>
					<td><input type="text" name="nomEmporig" value="<?php echo $nomEmporig; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Telefono Origen</th>
					<td><input type="text" name="telEmpOrig" value="<?php echo $telEmpOrig; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ruta</th>
					<td><select type="text" id= "id_rt" name="id_rt" value="<?php echo $id_rt; ?>  " class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_rt as $row_rt) { ?>
						<option value="<?php echo $row_rt->id_rt; ?>"><?php echo $row_rt->name_rt; ?></option>
						<?php } ?>
						</select>
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Direccion Origen</th>
					<td><input type="text" name="dirEmpOrig" value="<?php echo $dirEmpOrig; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ciudad Origen</th>
					<td><input type="text" name="ciudEmpOrig" value="<?php echo $ciudEmpOrig; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Persona que Entrega </th>
					<td><input type="text" name="nomPerOrig" value="<?php echo $nomPerOrig; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha Entrega</th>
					<td><input type="text" name="fechaOrig" value="<?php echo $fechaOrig; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Rut Empresa Destino</th>
					<td><input type="text" name="rutEmpDest" value="<?php echo $rutEmpDest; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Nombre Empresa Destino</th>
					<td><input type="text" name="nomEmpDest" value="<?php echo $nomEmpDest; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Telefono Destino</th>
					<td><input type="text" name="telEmpDest" value="<?php echo $telEmpDest; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Direccion Destino</th>
					<td><input type="text" name="dirEmpDest" value="<?php echo $dirEmpDest; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ciudad Destino</th>
					<td><input type="text" name="ciudEmpDest" value="<?php echo $ciudEmpDest; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Persona que Retira</th>
					<td><input type="text" name="nomPerDest" value="<?php echo $nomPerDest; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha Entrega</th>
					<td><input type="text" name="fechaDest" value="<?php echo $fechaDest; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Forma de Pago</th>
					<td><input type="text" name="formaPago" value="<?php echo $formaPago; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Cuenta Corriente</th>
					<td><input type="text" name="cuentaCte" value="<?php echo $cuentaCte; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Boleta/Factura</th>
					<td>
						<input type="radio" name="boletaFactura" value="Boleta"/>Boleta
						<input type="radio" name="boletaFactura" value="Factura"/>Factura
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">N° de Piezas</th>
					<td><input type="text" name="nroPiezas" value="<?php echo $nroPiezas; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Peso(Kg)</th>
					<td><input type="text" name="pesoCarga" value="<?php echo $pesoCarga; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Largo(m)</th>
					<td><input type="text" name="largoCarga" value="<?php echo $largoCarga; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ancho(m)</th>
					<td><input type="text" name="anchoCarga" value="<?php echo $anchoCarga; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Alto(m)</th>
					<td><input type="text" name="altoCarga" value="<?php echo $altoCarga; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Documentos asociados</th>
					<td><input type="text" name="documentos" value="<?php echo $documentos; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Instrucciones</th>
					<td><input type="text" name="instrucciones" value="<?php echo $instrucciones; ?>" class="ss-field-width " /></td>
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