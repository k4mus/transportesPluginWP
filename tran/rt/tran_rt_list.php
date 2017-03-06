<?php
error_reporting(0);
function tran_rt_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Rutas</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_rt_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "rt";
		
        $rows = $wpdb->get_results("SELECT id_rt,  name_rt , ciudad_orig , comuna_orig , ciudad_dest , comuna_orig , kms , precioBase , precioExtencion  from $table_name   ");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			?>
				<th class="manage-column ss-list-width">Nombre Ruta</th>
				<th class="manage-column ss-list-width">Ciudad Origen</th>
				<th class="manage-column ss-list-width">Comuna Origen</th>
				<th class="manage-column ss-list-width">Ciudad Destino</th>
				<th class="manage-column ss-list-width">Comuna Destino</th>
				<th class="manage-column ss-list-width">Kms Aprox.</th>
				<th class="manage-column ss-list-width">Precio</th>
				<th class="manage-column ss-list-width">Precio Extención</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_rt_update&id_rt=' . $row->id_rt ); ?>"><?php echo $row->id_rt; ?></a>
					</td>
					<?php
					?>
					<td class="manage-column ss-list-width"><?php echo $row->name_rt; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->ciudad_orig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->comuna_orig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->ciudad_dest; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->comuna_orig; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->kms; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->precioBase; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->precioExtencion; ?></td>
			    </tr>
            <?php } ?>
        </table>
    </div>
	<script>
	
	</script>
	
	<?php
	}