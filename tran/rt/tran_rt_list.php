<?php
error_reporting(0);
function tran_rt_list() {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
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
        $table_name = $wpdb->prefix ."rt";
		
        $rows = $wpdb->get_results("SELECT id_rt, $table_name.name_rt ,$table_name.ciudad_orig ,$table_name.comuna_orig ,$table_name.ciudad_dest ,$table_name.comuna_orig ,$table_name.kms ,$table_name.precioBase ,$table_name.precioExtencion  from $table_name   ");
        ?>
        <table id ="table_rt" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			?>
				<th class="manage-column ss-list-width">Nombre Ruta</th>
				<th class="manage-column ss-list-width">Provincia Origen</th>
				<th class="manage-column ss-list-width">Comuna Origen</th>
				<th class="manage-column ss-list-width">Provincia Destino</th>
				<th class="manage-column ss-list-width">Comuna Destino</th>
				<th class="manage-column ss-list-width">Kms Aprox.</th>
				<th class="manage-column ss-list-width">Precio</th>
				<th class="manage-column ss-list-width">Precio Extención</th>
            </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </div>
	<script>
	$('#table_rt').DataTable();
	</script>
	
	<?php
	}