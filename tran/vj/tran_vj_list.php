<?php

function tran_vj_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>Orden de Viaje</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=tran_vj_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "vj";

        $rows = $wpdb->get_results("SELECT id_vj,  nombreEmpresa , fecha  from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
				<th class="manage-column ss-list-width">empresa</th>
				<th class="manage-column ss-list-width">fecha</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->id_vj; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->nombreEmpresa; ?></td>
					<td class="manage-column ss-list-width"><?php echo $row->fecha; ?></td>
			        <td><a href="<?php echo admin_url('admin.php?page=tran_vj_update&id_vj=' . $row->id_vj); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
	
	<?php
	}