<?php
error_reporting(0);
function tran_vjTb_list($id_vj,$id_tb) {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
    <div class="wrap">
        <h2>Orden de Viaje-Trabajadores</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_vjTb_create'.'&id_vj='.$id_vj.'&id_tb='.$id_tb); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "vjTb";
		
		$iid_vj=$id_vj;
		if(!$iid_vj)$iid_vj="id_vj";	
		$iid_tb=$id_tb;
		if(!$iid_tb)$iid_tb="id_tb";	
        $rows = $wpdb->get_results("SELECT id_vjTb,id_vj,id_tb,  Monto , Razon , Gasto_ingreso , fecha  from $table_name  where  id_vj=$iid_vj  AND    id_tb=$iid_tb    ");
        ?>
        <table id ="table_vjTb" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			if (!$id_vj) 
			echo "<th class='manage-column ss-list-width'>ID_VJ </th>"; 
			if (!$id_tb) 
			echo "<th class='manage-column ss-list-width'>ID_TB </th>"; 
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
						<a href="<?php echo admin_url('admin.php?page=tran_vjTb_update&id_vjTb=' . $row->id_vjTb .'&id_vj='.$id_vj.'&id_tb='.$id_tb); ?>"><?php echo $row->id_vjTb; ?></a>
					</td>
					<?php
					if (!$id_vj) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_vj ."</td>"; 
					if (!$id_tb) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_tb ."</td>"; 
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
	$('#table_vjTb').DataTable();
	</script>
	
	<?php
	}