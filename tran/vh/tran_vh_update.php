<?php

function tran_vh_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vh";
    $id_vh = $_GET["id_vh"];
	$name_vh = $_POST["name_vh"];
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
	
	
//update
    if (isset($_POST['update'])){
		
        $wpdb->update(
                $table_name, //table
				array(  'name_vh' => $name_vh, 'tipo' => $tipo, 'Tonelaje' => $Tonelaje, 'Patente' => $Patente, 'Marca' => $Marca, 'Modelo' => $Modelo, 'Año' => $Año, 'FechaCompra' => $FechaCompra, 'estanque' => $estanque, 'zona' => $zona, 'rendimiento' => $rendimiento, 'fecUltMantencion' => $fecUltMantencion, 'fecRevTecnica' => $fecRevTecnica, 'fecGases' => $fecGases, 'fecPermCirculacion' => $fecPermCirculacion, 'fecCambioAceite' => $fecCambioAceite, 'fecCambioFiltro' => $fecCambioFiltro, 'neumaticoRepuesto' => $neumaticoRepuesto, 'herramientas' => $herramientas, 'chalecoReflectante' => $chalecoReflectante), //data
                array('id_vh' => $id_vh ), //where
				array('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vh = %s", $id_vh));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("
		SELECT id_vh 
		,
		 name_vh , tipo , Tonelaje , Patente , Marca , Modelo , Año , FechaCompra , estanque , zona , rendimiento , fecUltMantencion , fecRevTecnica , fecGases , fecPermCirculacion , fecCambioAceite , fecCambioFiltro , neumaticoRepuesto , herramientas , chalecoReflectante 
		from $table_name where id_vh=%s", $id_vh));
        foreach ($results as $r) {
            $id_vh = $r->id_vh;
			$name_vh = $r->name_vh;
			$tipo = $r->tipo;
			$Tonelaje = $r->Tonelaje;
			$Patente = $r->Patente;
			$Marca = $r->Marca;
			$Modelo = $r->Modelo;
			$Año = $r->Año;
			$FechaCompra = $r->FechaCompra;
			$estanque = $r->estanque;
			$zona = $r->zona;
			$rendimiento = $r->rendimiento;
			$fecUltMantencion = $r->fecUltMantencion;
			$fecRevTecnica = $r->fecRevTecnica;
			$fecGases = $r->fecGases;
			$fecPermCirculacion = $r->fecPermCirculacion;
			$fecCambioAceite = $r->fecCambioAceite;
			$fecCambioFiltro = $r->fecCambioFiltro;
			$neumaticoRepuesto = $r->neumaticoRepuesto;
			$herramientas = $r->herramientas;
			$chalecoReflectante = $r->chalecoReflectante;
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
            <div class="updated"><p>Vehiculos deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Vehiculos updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Vehiculos</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_vh" value="<?php echo $id_vh; ?>" disabled /></td>
					</tr>
                    
					<th class="ss-th-width">Código Vehiculo</th> 
					<td><input type="text" name="name_vh" value="<?php echo $name_vh; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">tipo</th> 
					<td>
						<select type="text" id= "tipo" name="tipo" value="<?php echo $tipo; ?>  " class="combobox">
						<option value="">Select one...</option>
						<option value="FURGON">FURGON</option>
						<option value="CAMION">CAMION</option>
						<option value="REMOLQUE">REMOLQUE</option>
						<option value="SEMIREMOLQUE">SEMIREMOLQUE</option>
						<option value="TRACTO">TRACTO</option>
						</select>	
					</td>
					</tr>
					<th class="ss-th-width">Tonelaje</th> 
					<td><input type="text" name="Tonelaje" value="<?php echo $Tonelaje; ?>" class="ss-field-width numero" /></td>
					</tr>
					<th class="ss-th-width">Patente</th> 
					<td><input type="text" name="Patente" value="<?php echo $Patente; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Marca</th> 
					<td><input type="text" name="Marca" value="<?php echo $Marca; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Modelo</th> 
					<td><input type="text" name="Modelo" value="<?php echo $Modelo; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Año</th> 
					<td><input type="text" name="Año" value="<?php echo $Año; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Fecha Compra</th> 
					<td><input type="text" name="FechaCompra" value="<?php echo $FechaCompra; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Código Vehiculo</th> 
					<td><input type="text" name="estanque" value="<?php echo $estanque; ?>" class="ss-field-width numero" /></td>
					</tr>
					<th class="ss-th-width">Zona de Servicio</th> 
					<td>
						<input type="radio" name="zona" value="Norte" <?php if ($zona=="Norte") echo 'checked' ?> />Norte
						<input type="radio" name="zona" value="Centro" <?php if ($zona=="Centro") echo 'checked' ?> />Centro
						<input type="radio" name="zona" value="Sur" <?php if ($zona=="Sur") echo 'checked' ?> />Sur
					</td>
					</tr>
					<th class="ss-th-width">Rendimiento (kms/lt)</th> 
					<td><input type="text" name="rendimiento" value="<?php echo $rendimiento; ?>" class="ss-field-width numero" /></td>
					</tr>
					<th class="ss-th-width">Fecha Ultima mantención</th> 
					<td><input type="text" name="fecUltMantencion" value="<?php echo $fecUltMantencion; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Revisión Tecnica</th> 
					<td><input type="text" name="fecRevTecnica" value="<?php echo $fecRevTecnica; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Control de Gases</th> 
					<td><input type="text" name="fecGases" value="<?php echo $fecGases; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Permiso Circulación</th> 
					<td><input type="text" name="fecPermCirculacion" value="<?php echo $fecPermCirculacion; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Último Cambio de Aceite</th> 
					<td><input type="text" name="fecCambioAceite" value="<?php echo $fecCambioAceite; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Cambio Filtro</th> 
					<td><input type="text" name="fecCambioFiltro" value="<?php echo $fecCambioFiltro; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Neumático Repuesto</th> 
					<td>
						<input type="radio" name="neumaticoRepuesto" value="Si" <?php if ($neumaticoRepuesto=="Si") echo 'checked' ?> />Si
						<input type="radio" name="neumaticoRepuesto" value="No" <?php if ($neumaticoRepuesto=="No") echo 'checked' ?> />No
					</td>
					</tr>
					<th class="ss-th-width">Herramientas</th> 
					<td>
						<input type="radio" name="herramientas" value="Si" <?php if ($herramientas=="Si") echo 'checked' ?> />Si
						<input type="radio" name="herramientas" value="No" <?php if ($herramientas=="No") echo 'checked' ?> />No
					</td>
					</tr>
					<th class="ss-th-width">Chaleco Reflectante</th> 
					<td>
						<input type="radio" name="chalecoReflectante" value="Si" <?php if ($chalecoReflectante=="Si") echo 'checked' ?> />Si
						<input type="radio" name="chalecoReflectante" value="No" <?php if ($chalecoReflectante=="No") echo 'checked' ?> />No
					</td>
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