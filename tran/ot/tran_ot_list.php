<?php

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

        $rows = $wpdb->get_results("SELECT id_ot,  NomEmpRet , telEmpRet , dirEmpRet , ciudEmpRet , nomPerRet , fechaRet , NomEmpEnt , telEmpEnt , dirEmpEnt , ciudEmpEnt , nomPerEnt , fechaEnt , formaPago , cuentaCte , boletaFactura , nroPiezas , pesoCarga , largoCarga , anchoCarga , altoCarga , documentos , instrucciones  from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
				<th class="manage-column ss-list-width">Nombre Empresa</th>
				<th class="manage-column ss-list-width">Telefono</th>
				<th class="manage-column ss-list-width">Direccion</th>
				<th class="manage-column ss-list-width">Ciudad</th>
				<th class="manage-column ss-list-width">Entrega</th>
				<th class="manage-column ss-list-width">Fecha</th>
				<th class="manage-column ss-list-width">Nombre Empresa</th>
				<th class="manage-column ss-list-width">Telefono</th>
				<th class="manage-column ss-list-width">Direccion</th>
				<th class="manage-column ss-list-width">Ciudad</th>
				
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_ot_update&id_ot=' . $row->id_ot); ?>"><?php echo $row->id_ot; ?></a>
					</td>
					<td class="manage-column ss-list-width"><?php echo $row->NomEmpRet; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->telEmpRet; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->dirEmpRet; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->ciudEmpRet; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nomPerRet; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fechaRet; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->NomEmpEnt; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->telEmpEnt; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->dirEmpEnt; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->ciudEmpEnt; ?></td>
					
			    </tr>
            <?php } ?>
        </table>
    </div>
	
	<?php
	}