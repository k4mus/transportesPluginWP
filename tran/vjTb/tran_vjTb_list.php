<?php

function tran_vjTb_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Orden de Viaje-Trabajadores</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_vjTb_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "vjTb";

        $rows = $wpdb->get_results("SELECT id_vjTb,  Monto , Razon , Gasto_ingreso , fecha  from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">fecha</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width">
						<a href="<?php echo admin_url('admin.php?page=tran_vjTb_update&id_vjTb=' . $row->id_vjTb); ?>"><?php echo $row->id_vjTb; ?></a>
					</td>
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