<?php
error_reporting(0);
function tran_tb_list() {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
    <div class="wrap">
        <h2>Trabajadores</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_tb_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix ."tb";
		
        $rows = $wpdb->get_results("SELECT id_tb,
		 
		$table_name.name_tb ,$table_name.rut ,$table_name.fechaIng ,$table_name.cargo  
		from $table_name 
		  ");
        ?>
        <table id ="table_tb" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			?>
				<th class="manage-column ss-list-width">Código Trabajador</th>
				<th class="manage-column ss-list-width">Rut Trabajador</th>
				<th class="manage-column ss-list-width">Fecha Ingreso</th>
				<th class="manage-column ss-list-width">Cargo</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
            	<tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_tb_update&id_tb=' . $row->id_tb ); ?>"><?php echo $row->id_tb; ?></a>
					</td>
					<?php
					?>
					<td class="manage-column ss-list-width"><?php echo $row->name_tb; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->rut; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fechaIng; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->cargo; ?></td>
			    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
	<script>
	$('#table_tb').DataTable();
	</script>
	
	<?php
	}