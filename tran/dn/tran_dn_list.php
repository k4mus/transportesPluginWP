<?php
error_reporting(0);
function tran_dn_list() {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
    <div class="wrap">
        <h2>Dineros</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_dn_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix ."dn";
		
        $rows = $wpdb->get_results("SELECT id_dn, $table_name.name_dn ,$table_name.signo  from $table_name   ");
        ?>
        <table id ="table_dn" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			?>
				<th class="manage-column ss-list-width">Concepto</th>
				<th class="manage-column ss-list-width">gasto/ingreso</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
            	<tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_dn_update&id_dn=' . $row->id_dn ); ?>"><?php echo $row->id_dn; ?></a>
					</td>
					<?php
					?>
					<td class="manage-column ss-list-width"><?php echo $row->name_dn; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->signo; ?></td>
			    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
	<script>
	$('#table_dn').DataTable();
	</script>
	
	<?php
	}