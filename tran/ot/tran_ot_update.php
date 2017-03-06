<?php

function tran_ot_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."ot";
    $id_ot = $_GET["id_ot"];
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
	
	$rows_rt = $wpdb->get_results("SELECT id_rt, name_rt from ".$wpdb->prefix ."rt");  
	
//update
    if (isset($_POST['update'])){
		
        $wpdb->update(
                $table_name, //table
				array(  'rutEmpOrig' => $rutEmpOrig, 'nomEmporig' => $nomEmporig, 'telEmpOrig' => $telEmpOrig, 'id_rt' => $id_rt, 'dirEmpOrig' => $dirEmpOrig, 'ciudEmpOrig' => $ciudEmpOrig, 'nomPerOrig' => $nomPerOrig, 'fechaOrig' => $fechaOrig, 'rutEmpDest' => $rutEmpDest, 'nomEmpDest' => $nomEmpDest, 'telEmpDest' => $telEmpDest, 'dirEmpDest' => $dirEmpDest, 'ciudEmpDest' => $ciudEmpDest, 'nomPerDest' => $nomPerDest, 'fechaDest' => $fechaDest, 'formaPago' => $formaPago, 'cuentaCte' => $cuentaCte, 'boletaFactura' => $boletaFactura, 'nroPiezas' => $nroPiezas, 'pesoCarga' => $pesoCarga, 'largoCarga' => $largoCarga, 'anchoCarga' => $anchoCarga, 'altoCarga' => $altoCarga, 'documentos' => $documentos, 'instrucciones' => $instrucciones), //data
                array('id_ot' => $id_ot ), //where
				array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_ot = %s", $id_ot));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_ot , rutEmpOrig , nomEmporig , telEmpOrig , id_rt , dirEmpOrig , ciudEmpOrig , nomPerOrig , fechaOrig , rutEmpDest , nomEmpDest , telEmpDest , dirEmpDest , ciudEmpDest , nomPerDest , fechaDest , formaPago , cuentaCte , boletaFactura , nroPiezas , pesoCarga , largoCarga , anchoCarga , altoCarga , documentos , instrucciones  from $table_name where id_ot=%s", $id_ot));
        foreach ($results as $r) {
            $id_ot = $r->id_ot;
			$rutEmpOrig = $r->rutEmpOrig;
			$nomEmporig = $r->nomEmporig;
			$telEmpOrig = $r->telEmpOrig;
			$id_rt = $r->id_rt;
			$dirEmpOrig = $r->dirEmpOrig;
			$ciudEmpOrig = $r->ciudEmpOrig;
			$nomPerOrig = $r->nomPerOrig;
			$fechaOrig = $r->fechaOrig;
			$rutEmpDest = $r->rutEmpDest;
			$nomEmpDest = $r->nomEmpDest;
			$telEmpDest = $r->telEmpDest;
			$dirEmpDest = $r->dirEmpDest;
			$ciudEmpDest = $r->ciudEmpDest;
			$nomPerDest = $r->nomPerDest;
			$fechaDest = $r->fechaDest;
			$formaPago = $r->formaPago;
			$cuentaCte = $r->cuentaCte;
			$boletaFactura = $r->boletaFactura;
			$nroPiezas = $r->nroPiezas;
			$pesoCarga = $r->pesoCarga;
			$largoCarga = $r->largoCarga;
			$anchoCarga = $r->anchoCarga;
			$altoCarga = $r->altoCarga;
			$documentos = $r->documentos;
			$instrucciones = $r->instrucciones;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/css/ui.jqgrid.min.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/js/jquery.jqgrid.min.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    <div class="wrap">
        <h2></h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Transporte deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Transporte updated</p></div>
        
        <?php } else { 
		
		?>
		
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Transporte</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_ot" value="<?php echo $id_ot; ?>" disabled /></td>
					</tr>
					<tr><th>Rut Empresa Origen</th>
					<td><input type="text" name="rutEmpOrig" value="<?php echo $rutEmpOrig; ?>" class="ss-field-width rut" /></td>
					</tr>
					<tr><th>Nombre Empresa Origen</th>
					<td><input type="text" name="nomEmporig" value="<?php echo $nomEmporig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Telefono Origen</th>
					<td><input type="text" name="telEmpOrig" value="<?php echo $telEmpOrig; ?>" class="ss-field-width phone" /></td>
					</tr>
					<tr><th>Ruta</th>
					<td><select type="text" id= "id_rt" name="id_rt" value="<?php echo $id_rt; ?>  " class="combobox">
						<option value="">Select one...</option>
						<?php foreach ($rows_rt as $row_rt) { ?>
						<option value="<?php echo $row_rt->id_rt; ?>"><?php echo $row_rt->name_rt; ?></option>
						<?php } ?>
						</select>
					</td>
					</tr>
					<tr><th>Direccion Origen</th>
					<td><input type="text" name="dirEmpOrig" value="<?php echo $dirEmpOrig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Ciudad Origen</th>
					<td><input type="text" name="ciudEmpOrig" value="<?php echo $ciudEmpOrig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Persona que Entrega </th>
					<td><input type="text" name="nomPerOrig" value="<?php echo $nomPerOrig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Fecha Entrega</th>
					<td><input type="text" name="fechaOrig" value="<?php echo $fechaOrig; ?>" class="ss-field-width datetime" /></td>
					</tr>
					<tr><th>Rut Empresa Destino</th>
					<td><input type="text" name="rutEmpDest" value="<?php echo $rutEmpDest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Nombre Empresa Destino</th>
					<td><input type="text" name="nomEmpDest" value="<?php echo $nomEmpDest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Telefono Destino</th>
					<td><input type="text" name="telEmpDest" value="<?php echo $telEmpDest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Direccion Destino</th>
					<td><input type="text" name="dirEmpDest" value="<?php echo $dirEmpDest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Ciudad Destino</th>
					<td><input type="text" name="ciudEmpDest" value="<?php echo $ciudEmpDest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Persona que Retira</th>
					<td><input type="text" name="nomPerDest" value="<?php echo $nomPerDest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Fecha Entrega</th>
					<td><input type="text" name="fechaDest" value="<?php echo $fechaDest; ?>" class="ss-field-width datetime" /></td>
					</tr>
					<tr><th>Forma de Pago</th>
					<td><input type="text" name="formaPago" value="<?php echo $formaPago; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Cuenta Corriente</th>
					<td><input type="text" name="cuentaCte" value="<?php echo $cuentaCte; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Boleta/Factura</th>
					<td>
						<input type="radio" name="boletaFactura" value="Boleta"  <?php if ($boletaFactura=="Boleta") echo 'checked' ?>/>Boleta
						<input type="radio" name="boletaFactura" value="Factura" <?php if ($boletaFactura=="Factura") echo 'checked' ?> />Factura
					</td>
					</tr>
					<tr><th>N° de Piezas</th>
					<td><input type="text" name="nroPiezas" value="<?php echo $nroPiezas; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Peso(Kg)</th>
					<td><input type="text" name="pesoCarga" value="<?php echo $pesoCarga; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Largo(m)</th>
					<td><input type="text" name="largoCarga" value="<?php echo $largoCarga; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Ancho(m)</th>
					<td><input type="text" name="anchoCarga" value="<?php echo $anchoCarga; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Alto(m)</th>
					<td><input type="text" name="altoCarga" value="<?php echo $altoCarga; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Documentos asociados</th>
					<td><input type="text" name="documentos" value="<?php echo $documentos; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Instrucciones</th>
					<td><input type="text" name="instrucciones" value="<?php echo $instrucciones; ?>" class="ss-field-width " /></td>
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
		$(".datetime").datepicker();
		$("#tabs" ).tabs();
		$('.combobox').each( function( index, element ){
			$("option[value="+$(this).attr("value")+"]", this).attr('selected','selected');
		});
		$( ".int" ).spinner();
		$(".phone").mask("(99) 9999?9-9999");

		$(".phone").on("blur", function() {
			var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );

			if( last.length == 3 ) {
				var move = $(this).val().substr( $(this).val().indexOf("-") - 1, 1 );
				var lastfour = move + last;
				var first = $(this).val().substr( 0, 9 );

				$(this).val( first + '-' + lastfour );
			}
		});
		
	</script>
    <?php
}