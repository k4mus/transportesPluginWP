<?php
error_reporting(0);
function tran_vjDn_list($id_vj,$id_dn) {
    ?>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
 	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
    
    <div class="wrap">
        <h2>Orden de Viaje-Dineros</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_vjDn_create'.'&id_vj='.$id_vj.'&id_dn='.$id_dn); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix ."vjDn";
		
		$iid_vj=$id_vj;
		if(!$iid_vj)$iid_vj=$table_name .".id_vj";	
		$iid_dn=$id_dn;
		if(!$iid_dn)$iid_dn=$table_name .".id_dn";	
        $rows = $wpdb->get_results("SELECT id_vjDn, " .$wpdb->prefix ."vj.name_vj, " .$wpdb->prefix ."dn.name_dn, $table_name.Monto ,$table_name.Razon ,$table_name.fecha  from $table_name   left join " .$wpdb->prefix ."vj on " .$wpdb->prefix ."vj.id_vj = $table_name.id_vj    left join " .$wpdb->prefix ."dn on " .$wpdb->prefix ."dn.id_dn = $table_name.id_dn    where  $table_name.id_vj=$iid_vj  AND    $table_name.id_dn=$iid_dn    ");
        ?>
        <table id ="table_vjDn" $table_name class='wp-list-table widefat fixed striped posts'>
            <thead>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			if (!$id_vj) 
			echo "<th class='manage-column ss-list-width'>viaje </th>"; 
			if (!$id_dn) 
			echo "<th class='manage-column ss-list-width'>dinero </th>"; 
			?>
				<th class="manage-column ss-list-width">Monto</th>
				<th class="manage-column ss-list-width">Razon</th>
				<th class="manage-column ss-list-width">fecha</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($rows as $row) { ?>
            	<tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_vjDn_update&id_vjDn=' . $row->id_vjDn .'&id_vj='.$id_vj.'&id_dn='.$id_dn); ?>"><?php echo $row->id_vjDn; ?></a>
					</td>
					<?php
					if (!$id_vj) 
						echo "<td class='manage-column ss-list-width'>" .$row->name_vj ."</td>"; 
					if (!$id_dn) 
						echo "<td class='manage-column ss-list-width'>" .$row->name_dn ."</td>"; 
					?>
					<td class="manage-column ss-list-width"><?php echo $row->Monto; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Razon; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecha; ?></td>
			    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
	<script>
	$('#table_vjDn').DataTable();
	</script>
	
	<?php
	}