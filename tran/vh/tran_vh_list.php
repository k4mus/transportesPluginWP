<?php
error_reporting(0);
function tran_vh_list() {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
    <div class="wrap">
        <h2>Vehiculos</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_vh_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix ."vh";
		
        $rows = $wpdb->get_results("SELECT id_vh,
		 
		$table_name.name_vh ,$table_name.tipo ,$table_name.Tonelaje ,$table_name.Patente ,$table_name.Marca ,$table_name.Modelo ,$table_name.Año ,$table_name.FechaCompra ,$table_name.estanque ,$table_name.zona ,$table_name.rendimiento ,$table_name.fecUltMantencion ,$table_name.fecRevTecnica ,$table_name.fecGases ,$table_name.fecPermCirculacion ,$table_name.fecCambioAceite ,$table_name.fecCambioFiltro ,$table_name.neumaticoRepuesto ,$table_name.herramientas ,$table_name.chalecoReflectante  
		from $table_name 
		  ");
        ?>
        <table id ="table_vh" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			?>
				<th class="manage-column ss-list-width">Código Vehiculo</th>
				<th class="manage-column ss-list-width">tipo</th>
				<th class="manage-column ss-list-width">Tonelaje</th>
				<th class="manage-column ss-list-width">Patente</th>
				<th class="manage-column ss-list-width">Marca</th>
				<th class="manage-column ss-list-width">Modelo</th>
				<th class="manage-column ss-list-width">Año</th>
				<th class="manage-column ss-list-width">Fecha Compra</th>
				<th class="manage-column ss-list-width">Código Vehiculo</th>
				<th class="manage-column ss-list-width">Zona de Servicio</th>
				<th class="manage-column ss-list-width">Rendimiento (kms/lt)</th>
				<th class="manage-column ss-list-width">Fecha Ultima mantención</th>
				<th class="manage-column ss-list-width">Revisión Tecnica</th>
				<th class="manage-column ss-list-width">Control de Gases</th>
				<th class="manage-column ss-list-width">Permiso Circulación</th>
				<th class="manage-column ss-list-width">Último Cambio de Aceite</th>
				<th class="manage-column ss-list-width">Cambio Filtro</th>
				<th class="manage-column ss-list-width">Neumático Repuesto</th>
				<th class="manage-column ss-list-width">Herramientas</th>
				<th class="manage-column ss-list-width">Chaleco Reflectante</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
            	<tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_vh_update&id_vh=' . $row->id_vh ); ?>"><?php echo $row->id_vh; ?></a>
					</td>
					<?php
					?>
					<td class="manage-column ss-list-width"><?php echo $row->name_vh; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->tipo; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Tonelaje; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Patente; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Marca; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Modelo; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Año; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->FechaCompra; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->estanque; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->zona; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->rendimiento; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecUltMantencion; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecRevTecnica; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecGases; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecPermCirculacion; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecCambioAceite; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecCambioFiltro; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->neumaticoRepuesto; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->herramientas; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->chalecoReflectante; ?></td>
			    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
	<script>
	$('#table_vh').DataTable();
	</script>
	
	<?php
	}