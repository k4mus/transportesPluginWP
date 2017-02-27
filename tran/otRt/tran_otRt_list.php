<?php
error_reporting(0);
function tran_otRt_list($id_ot,$id_rt) {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Orden de Transporte - Ruta</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_otRt_create'.'&id_ot='.$id_ot.'&id_rt='.$id_rt); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "otRt";
		
		$iid_ot=$id_ot;
		if(!$iid_ot)$iid_ot="id_ot";	
		$iid_rt=$id_rt;
		if(!$iid_rt)$iid_rt="id_rt";	
        $rows = $wpdb->get_results("SELECT id_otRt,id_ot,id_rt,  Monto , Razon , Gasto_ingreso , fecha  from $table_name  where  id_ot=$iid_ot  AND    id_rt=$iid_rt    ");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<?php
			if (!$id_ot) 
			echo "<th class='manage-column ss-list-width'>ID_OrdenTrans </th>"; 
			if (!$id_rt) 
			echo "<th class='manage-column ss-list-width'>ID_ruta </th>"; 
			?>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">fecha</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_otRt_update&id_otRt=' . $row->id_otRt .'&id_ot='.$id_ot.'&id_rt='.$id_rt); ?>"><?php echo $row->id_otRt; ?></a>
					</td>
					<?php
					if (!$id_ot) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_ot ."</td>"; 
					if (!$id_rt) 
						echo "<td class='manage-column ss-list-width'>" .$row->id_rt ."</td>"; 
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