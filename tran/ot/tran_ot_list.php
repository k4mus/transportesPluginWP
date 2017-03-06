<?php
error_reporting(0);
function tran_ot_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Orden de Transporte</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_ot_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "ot";
		
        $rows = $wpdb->get_results("SELECT id_ot,  rutEmpOrig , nomEmporig , telEmpOrig , id_rt , dirEmpOrig , ciudEmpOrig , nomPerOrig , fechaOrig , rutEmpDest , nomEmpDest , telEmpDest , dirEmpDest , ciudEmpDest , nomPerDest , fechaDest , formaPago , cuentaCte , boletaFactura , nroPiezas , pesoCarga , largoCarga , anchoCarga , altoCarga , documentos , instrucciones  from $table_name   ");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			?>
				<th class="manage-column ss-list-width">Rut Empresa Origen</th>
				<th class="manage-column ss-list-width">Nombre Empresa Origen</th>
				<th class="manage-column ss-list-width">Telefono Origen</th>
				<th class="manage-column ss-list-width">Ruta</th>
				<th class="manage-column ss-list-width">Direccion Origen</th>
				<th class="manage-column ss-list-width">Ciudad Origen</th>
				<th class="manage-column ss-list-width">Persona que Entrega </th>
				<th class="manage-column ss-list-width">Fecha Entrega</th>
				<th class="manage-column ss-list-width">Rut Empresa Destino</th>
				<th class="manage-column ss-list-width">Nombre Empresa Destino</th>
				<th class="manage-column ss-list-width">Telefono Destino</th>
				<th class="manage-column ss-list-width">Direccion Destino</th>
				<th class="manage-column ss-list-width">Ciudad Destino</th>
				<th class="manage-column ss-list-width">Persona que Retira</th>
				<th class="manage-column ss-list-width">Fecha Entrega</th>
				<th class="manage-column ss-list-width">Forma de Pago</th>
				<th class="manage-column ss-list-width">Cuenta Corriente</th>
				<th class="manage-column ss-list-width">Boleta/Factura</th>
				<th class="manage-column ss-list-width">N° de Piezas</th>
				<th class="manage-column ss-list-width">Peso(Kg)</th>
				<th class="manage-column ss-list-width">Largo(m)</th>
				<th class="manage-column ss-list-width">Ancho(m)</th>
				<th class="manage-column ss-list-width">Alto(m)</th>
				<th class="manage-column ss-list-width">Documentos asociados</th>
				<th class="manage-column ss-list-width">Instrucciones</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_ot_update&id_ot=' . $row->id_ot ); ?>"><?php echo $row->id_ot; ?></a>
					</td>
					<?php
					?>
					<td class="manage-column ss-list-width"><?php echo $row->rutEmpOrig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nomEmporig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->telEmpOrig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->id_rt; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->dirEmpOrig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->ciudEmpOrig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nomPerOrig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fechaOrig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->rutEmpDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nomEmpDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->telEmpDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->dirEmpDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->ciudEmpDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nomPerDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fechaDest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->formaPago; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->cuentaCte; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->boletaFactura; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nroPiezas; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->pesoCarga; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->largoCarga; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->anchoCarga; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->altoCarga; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->documentos; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->instrucciones; ?></td>
			    </tr>
            <?php } ?>
        </table>
    </div>
	<script>
	
	</script>
	
	<?php
	}