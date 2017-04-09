<?php
error_reporting(0);
function tran_vjVh_list($id_vj,$id_vh) {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
    <div class="wrap">
        <h2>Orden de Viaje-Vehiculo</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_vjVh_create'.'&id_vj='.$id_vj.'&id_vh='.$id_vh); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "vjVh";
		
		$iid_vj=$id_vj;
		if(!$iid_vj)$iid_vj="id_vj";	
		$iid_vh=$id_vh;
		if(!$iid_vh)$iid_vh="id_vh";	
        $rows = $wpdb->get_results("SELECT id_vjVh,id_vj,id_vh,  Monto , Razon , Gasto_ingreso , fecha  from $table_name  where  id_vj=$iid_vj  AND    id_vh=$iid_vh    ");
        ?>
        <table id ="table_vjVh" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			if (!$id_vj) 
			echo "<th class='manage-column ss-list-width'>ID_viaje </th>"; 
			if (!$id_vh) 
			echo "<th class='manage-column ss-list-width'>ID_vehiculo </th>"; 
			?>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">fecha</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
            	<tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_vjVh_update&id_vjVh=' . $row->id_vjVh .'&id_vj='.$id_vj.'&id_vh='.$id_vh); ?>"><?php echo $row->id_vjVh; ?></a>
					</td>
					<?php
					if (!$id_vj) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_vj ."</td>"; 
					if (!$id_vh) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_vh ."</td>"; 
					?>
					<td class="manage-column ss-list-width"><?php echo $row->Monto; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Razon; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Gasto_ingreso; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecha; ?></td>
			    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
	<script>
	$('#table_vjVh').DataTable();
	</script>
	
	<?php
	}