<?php

function tran_ot_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."ot";
    $id_ot = $_GET["id_ot"];
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
	
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				array( 'NomEmpRet' => $NomEmpRet, 'telEmpRet' => $telEmpRet, 'dirEmpRet' => $dirEmpRet, 'ciudEmpRet' => $ciudEmpRet, 'nomPerRet' => $nomPerRet, 'fechaRet' => $fechaRet, 'NomEmpEnt' => $NomEmpEnt, 'telEmpEnt' => $telEmpEnt, 'dirEmpEnt' => $dirEmpEnt, 'ciudEmpEnt' => $ciudEmpEnt, 'nomPerEnt' => $nomPerEnt, 'fechaEnt' => $fechaEnt, 'formaPago' => $formaPago, 'cuentaCte' => $cuentaCte, 'boletaFactura' => $boletaFactura, 'nroPiezas' => $nroPiezas, 'pesoCarga' => $pesoCarga, 'largoCarga' => $largoCarga, 'anchoCarga' => $anchoCarga, 'altoCarga' => $altoCarga, 'documentos' => $documentos, 'instrucciones' => $instrucciones), //data
                array('id_ot' => $id_ot), //where
				array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_ot = %s", $id_ot));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_ot, NomEmpRet , telEmpRet , dirEmpRet , ciudEmpRet , nomPerRet , fechaRet , NomEmpEnt , telEmpEnt , dirEmpEnt , ciudEmpEnt , nomPerEnt , fechaEnt , formaPago , cuentaCte , boletaFactura , nroPiezas , pesoCarga , largoCarga , anchoCarga , altoCarga , documentos , instrucciones  from $table_name where id_ot=%s", $id_ot));
        foreach ($results as $r) {
            $id_ot = $r->id_ot;
			$NomEmpRet = $r->NomEmpRet;
			$telEmpRet = $r->telEmpRet;
			$dirEmpRet = $r->dirEmpRet;
			$ciudEmpRet = $r->ciudEmpRet;
			$nomPerRet = $r->nomPerRet;
			$fechaRet = $r->fechaRet;
			$NomEmpEnt = $r->NomEmpEnt;
			$telEmpEnt = $r->telEmpEnt;
			$dirEmpEnt = $r->dirEmpEnt;
			$ciudEmpEnt = $r->ciudEmpEnt;
			$nomPerEnt = $r->nomPerEnt;
			$fechaEnt = $r->fechaEnt;
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
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="wrap">
        <h2>Orden de Transporte</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Transporte deleted</p></div>
            

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Transporte updated</p></div>
            

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>ID</th><td><input type="text" name="id_ot" value="<?php echo $id_ot; ?>" disabled /></td></tr>
					<tr><th>Nombre Empresa</th><td><input type="text" name="NomEmpRet" value="<?php echo $NomEmpRet; ?>" class=""/></td></tr>
					<tr><th>Telefono</th><td><input type="text" name="telEmpRet" value="<?php echo $telEmpRet; ?>" class=""/></td></tr>
					<tr><th>Direccion</th><td><input type="text" name="dirEmpRet" value="<?php echo $dirEmpRet; ?>" class=""/></td></tr>
					<tr><th>Ciudad</th><td><input type="text" name="ciudEmpRet" value="<?php echo $ciudEmpRet; ?>" class=""/></td></tr>
					<tr><th>Entrega</th><td><input type="text" name="nomPerRet" value="<?php echo $nomPerRet; ?>" class=""/></td></tr>
					<tr><th>Fecha</th><td><input type="text" name="fechaRet" value="<?php echo $fechaRet; ?>" class="datetime"/></td></tr>
					<tr><th>Nombre Empresa</th><td><input type="text" name="NomEmpEnt" value="<?php echo $NomEmpEnt; ?>" class=""/></td></tr>
					<tr><th>Telefono</th><td><input type="text" name="telEmpEnt" value="<?php echo $telEmpEnt; ?>" class=""/></td></tr>
					<tr><th>Direccion</th><td><input type="text" name="dirEmpEnt" value="<?php echo $dirEmpEnt; ?>" class=""/></td></tr>
					<tr><th>Ciudad</th><td><input type="text" name="ciudEmpEnt" value="<?php echo $ciudEmpEnt; ?>" class=""/></td></tr>
					<tr><th>Persona Entrega</th><td><input type="text" name="nomPerEnt" value="<?php echo $nomPerEnt; ?>" class=""/></td></tr>
					<tr><th>Fecha Entrega</th><td><input type="text" name="fechaEnt" value="<?php echo $fechaEnt; ?>" class="datetime"/></td></tr>
					<tr><th>Forma de Pago</th><td><input type="text" name="formaPago" value="<?php echo $formaPago; ?>" class=""/></td></tr>
					<tr><th>Cuenta Corriente</th><td><input type="text" name="cuentaCte" value="<?php echo $cuentaCte; ?>" class=""/></td></tr>
					<tr><th>Boleta/Factura</th><td><input type="text" name="boletaFactura" value="<?php echo $boletaFactura; ?>" class=""/></td></tr>
					<tr><th>N° de Piezas</th><td><input type="text" name="nroPiezas" value="<?php echo $nroPiezas; ?>" class=""/></td></tr>
					<tr><th>Peso(Kg)</th><td><input type="text" name="pesoCarga" value="<?php echo $pesoCarga; ?>" class=""/></td></tr>
					<tr><th>Largo(m)</th><td><input type="text" name="largoCarga" value="<?php echo $largoCarga; ?>" class=""/></td></tr>
					<tr><th>Ancho(m)</th><td><input type="text" name="anchoCarga" value="<?php echo $anchoCarga; ?>" class=""/></td></tr>
					<tr><th>Alto(m)</th><td><input type="text" name="altoCarga" value="<?php echo $altoCarga; ?>" class=""/></td></tr>
					<tr><th>Documentos asociados</th><td><input type="text" name="documentos" value="<?php echo $documentos; ?>" class=""/></td></tr>
					<tr><th>Instrucciones</th><td><input type="text" name="instrucciones" value="<?php echo $instrucciones; ?>" class=""/></td></tr>
					
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>
			<a href="<?php echo admin_url('admin.php?page=tran_ot_list') ?>">&laquo; Volver</a>
			
    </div>
    <script>
		$( ".datetime" ).datepicker();
	</script>
    <?php
}