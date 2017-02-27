<?php

function tran_ot_create() {
	$NomEmpRet = $_POST["NomEmpRet"];
	$telEmpRet = $_POST["telEmpRet"];
	$dirEmpRet = $_POST["dirEmpRet"];
	$ciudEmpRet = $_POST["ciudEmpRet"];
	$nomPerRet = $_POST["nomPerRet"];
	$fechaRet = $_POST["fechaRet"];
	$NomEmpEnt = $_POST["NomEmpEnt"];
	$telEmpEnt = $_POST["telEmpEnt"];
	$dirEmpEnt = $_POST["dirEmpEnt"];
	$ciudEmpEnt = $_POST["ciudEmpEnt"];
	$nomPerEnt = $_POST["nomPerEnt"];
	$fechaEnt = $_POST["fechaEnt"];
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
    if (isset($_POST['insert'])) {
		
        global $wpdb;
        $table_name = $wpdb->prefix ."ot";

        $wpdb->insert(
                $table_name, //table
                array(  'NomEmpRet' => $NomEmpRet , 'telEmpRet' => $telEmpRet , 'dirEmpRet' => $dirEmpRet , 'ciudEmpRet' => $ciudEmpRet , 'nomPerRet' => $nomPerRet , 'fechaRet' => $fechaRet , 'NomEmpEnt' => $NomEmpEnt , 'telEmpEnt' => $telEmpEnt , 'dirEmpEnt' => $dirEmpEnt , 'ciudEmpEnt' => $ciudEmpEnt , 'nomPerEnt' => $nomPerEnt , 'fechaEnt' => $fechaEnt , 'formaPago' => $formaPago , 'cuentaCte' => $cuentaCte , 'boletaFactura' => $boletaFactura , 'nroPiezas' => $nroPiezas , 'pesoCarga' => $pesoCarga , 'largoCarga' => $largoCarga , 'anchoCarga' => $anchoCarga , 'altoCarga' => $altoCarga , 'documentos' => $documentos , 'instrucciones' => $instrucciones  ), //data
                array('%s', '%s') //data format	 		
        );
        $message.="Orden de Transporte inserted";
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Transporte</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php endif; ?>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">Nombre Empresa</th>
                    <td><input type="text" name="NomEmpRet" value="<?php echo $NomEmpRet; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Telefono</th>
                    <td><input type="text" name="telEmpRet" value="<?php echo $telEmpRet; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Direccion</th>
                    <td><input type="text" name="dirEmpRet" value="<?php echo $dirEmpRet; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ciudad</th>
                    <td><input type="text" name="ciudEmpRet" value="<?php echo $ciudEmpRet; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Entrega</th>
                    <td><input type="text" name="nomPerRet" value="<?php echo $nomPerRet; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha</th>
                    <td><input type="text" name="fechaRet" value="<?php echo $fechaRet; ?>" class="ss-field-width datetime" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Nombre Empresa</th>
                    <td><input type="text" name="NomEmpEnt" value="<?php echo $NomEmpEnt; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Telefono</th>
                    <td><input type="text" name="telEmpEnt" value="<?php echo $telEmpEnt; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Direccion</th>
                    <td><input type="text" name="dirEmpEnt" value="<?php echo $dirEmpEnt; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ciudad</th>
                    <td><input type="text" name="ciudEmpEnt" value="<?php echo $ciudEmpEnt; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Persona Entrega</th>
                    <td><input type="text" name="nomPerEnt" value="<?php echo $nomPerEnt; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha Entrega</th>
                    <td><input type="text" name="fechaEnt" value="<?php echo $fechaEnt; ?>" class="ss-field-width datetime" /></td>
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
                    <td><input type="text" name="boletaFactura" value="<?php echo $boletaFactura; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">N° de Piezas</th>
                    <td><input type="text" name="nroPiezas" value="<?php echo $nroPiezas; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Peso(Kg)</th>
                    <td><input type="text" name="pesoCarga" value="<?php echo $pesoCarga; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Largo(m)</th>
                    <td><input type="text" name="largoCarga" value="<?php echo $largoCarga; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Ancho(m)</th>
                    <td><input type="text" name="anchoCarga" value="<?php echo $anchoCarga; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Alto(m)</th>
                    <td><input type="text" name="altoCarga" value="<?php echo $altoCarga; ?>" class="ss-field-width " /></td>
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
		<a href="<?php echo admin_url('admin.php?page='.$page_volver) ?>">&laquo; Volver</a>
    </div>
    <script>
		$( ".datetime" ).datepicker();
	</script>
    <?php
}