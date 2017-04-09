<?php

function tran_vh_create() {
	$name = $_POST["name"];
	$tipo = $_POST["tipo"];
	$Tonelaje = $_POST["Tonelaje"];
	$Patente = $_POST["Patente"];
	$Marca = $_POST["Marca"];
	$Modelo = $_POST["Modelo"];
	$Año = $_POST["Año"];
	$FechaCompra = $_POST["FechaCompra"];
	$estanque = $_POST["estanque"];
	$zona = $_POST["zona"];
	$rendimiento = $_POST["rendimiento"];
	$fecUltMantencion = $_POST["fecUltMantencion"];
	$fecRevTecnica = $_POST["fecRevTecnica"];
	$fecGases = $_POST["fecGases"];
	$fecPermCirculacion = $_POST["fecPermCirculacion"];
	$fecCambioAceite = $_POST["fecCambioAceite"];
	$fecCambioFiltro = $_POST["fecCambioFiltro"];
	$neumaticoRepuesto = $_POST["neumaticoRepuesto"];
	$herramientas = $_POST["herramientas"];
	$chalecoReflectante = $_POST["chalecoReflectante"];
	
	//volver
	$page_volver= "tran_vh_list";
	 //insert
	global $wpdb;
	
    if (isset($_POST['insert'])) {
		
        
        $table_name = $wpdb->prefix ."vh";

        $wpdb->insert(
                $table_name, //table
                array(  'name' => $name , 'tipo' => $tipo , 'Tonelaje' => $Tonelaje , 'Patente' => $Patente , 'Marca' => $Marca , 'Modelo' => $Modelo , 'Año' => $Año , 'FechaCompra' => $FechaCompra , 'estanque' => $estanque , 'zona' => $zona , 'rendimiento' => $rendimiento , 'fecUltMantencion' => $fecUltMantencion , 'fecRevTecnica' => $fecRevTecnica , 'fecGases' => $fecGases , 'fecPermCirculacion' => $fecPermCirculacion , 'fecCambioAceite' => $fecCambioAceite , 'fecCambioFiltro' => $fecCambioFiltro , 'neumaticoRepuesto' => $neumaticoRepuesto , 'herramientas' => $herramientas , 'chalecoReflectante' => $chalecoReflectante  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_vh =$wpdb->insert_id;
		$message.="Vehiculos inserted: ".$id_vh;
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Vehiculos</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_vh_update&id_vh='.$id_vh).'"
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
                    <th class="ss-th-width">Código Vehiculo</th>
					<td><input type="text" name="name" value="<?php echo $name; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">tipo</th>
					<td>
						<input type="radio" name="tipo" value="FURGON"/>FURGON
						<input type="radio" name="tipo" value="CAMION"/>CAMION
						<input type="radio" name="tipo" value="REMOLQUE"/>REMOLQUE
						<input type="radio" name="tipo" value="SEMIREMOLQUE"/>SEMIREMOLQUE
						<input type="radio" name="tipo" value="TRACTO"/>TRACTO
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Tonelaje</th>
					<td><input type="text" name="Tonelaje" value="<?php echo $Tonelaje; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Patente</th>
					<td><input type="text" name="Patente" value="<?php echo $Patente; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Marca</th>
					<td><input type="text" name="Marca" value="<?php echo $Marca; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Modelo</th>
					<td><input type="text" name="Modelo" value="<?php echo $Modelo; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Año</th>
					<td><input type="text" name="Año" value="<?php echo $Año; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha Compra</th>
					<td><input type="text" name="FechaCompra" value="<?php echo $FechaCompra; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Código Vehiculo</th>
					<td><input type="text" name="estanque" value="<?php echo $estanque; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Zona de Servicio</th>
					<td>
						<input type="radio" name="zona" value="Norte"/>Norte
						<input type="radio" name="zona" value="Centro"/>Centro
						<input type="radio" name="zona" value="Sur"/>Sur
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Rendimiento (kms/lt)</th>
					<td><input type="text" name="rendimiento" value="<?php echo $rendimiento; ?>" class="ss-field-width numero" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha Ultima mantención</th>
					<td><input type="text" name="fecUltMantencion" value="<?php echo $fecUltMantencion; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Revisión Tecnica</th>
					<td><input type="text" name="fecRevTecnica" value="<?php echo $fecRevTecnica; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Control de Gases</th>
					<td><input type="text" name="fecGases" value="<?php echo $fecGases; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Permiso Circulación</th>
					<td><input type="text" name="fecPermCirculacion" value="<?php echo $fecPermCirculacion; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Último Cambio de Aceite</th>
					<td><input type="text" name="fecCambioAceite" value="<?php echo $fecCambioAceite; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Cambio Filtro</th>
					<td><input type="text" name="fecCambioFiltro" value="<?php echo $fecCambioFiltro; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Neumático Repuesto</th>
					<td>
						<input type="radio" name="neumaticoRepuesto" value="Si"/>Si
						<input type="radio" name="neumaticoRepuesto" value="No"/>No
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Herramientas</th>
					<td>
						<input type="radio" name="herramientas" value="Si"/>Si
						<input type="radio" name="herramientas" value="No"/>No
					</td>
                </tr>
				<tr>
                    <th class="ss-th-width">Chaleco Reflectante</th>
					<td>
						<input type="radio" name="chalecoReflectante" value="Si"/>Si
						<input type="radio" name="chalecoReflectante" value="No"/>No
					</td>
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