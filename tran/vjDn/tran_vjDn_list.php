<?php
error_reporting(0);
function tran_vjDn_list($id_vj,$id_dn) {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
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
        $table_name = $wpdb->prefix . "vjDn";
		
		$iid_vj=$id_vj;
		if(!$iid_vj)$iid_vj="id_vj";	
		$iid_dn=$id_dn;
		if(!$iid_dn)$iid_dn="id_dn";	
        $rows = $wpdb->get_results("SELECT id_vjDn,id_vj,id_dn,  Monto , Razon , Gasto_ingreso , fecha  from $table_name  where  id_vj=$iid_vj  AND    id_dn=$iid_dn    ");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			if (!$id_vj) 
			echo "<th class='manage-column ss-list-width'>ID_viaje </th>"; 
			if (!$id_dn) 
			echo "<th class='manage-column ss-list-width'>ID_dinero </th>"; 
			?>
				<th class="manage-column ss-list-width">Monto</th>
				<th class="manage-column ss-list-width">Razon</th>
				<th class="manage-column ss-list-width">Gasto_ingreso</th>
				<th class="manage-column ss-list-width">fecha</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_vjDn_update&id_vjDn=' . $row->id_vjDn .'&id_vj='.$id_vj.'&id_dn='.$id_dn); ?>"><?php echo $row->id_vjDn; ?></a>
					</td>
					<?php
					if (!$id_vj) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_vj ."</td>"; 
					if (!$id_dn) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_dn ."</td>"; 
					?>
					<td class="manage-column ss-list-width"><?php echo $row->Monto; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Razon; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->Gasto_ingreso; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecha; ?></td>
			    </tr>
            <?php } ?>
        </table>
    </div>
	<script>
	
	</script>
	
	<?php
	}