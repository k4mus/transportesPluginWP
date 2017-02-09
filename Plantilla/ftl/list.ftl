<?php

function ${plugin}_${tableName}_list() {
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/${plugin}/style-admin.css" rel="stylesheet" />
    <div class="wrap">
        <h2>${titulo}</h2>
        <div class="tablenav top">
            <div class="alignleft actions">
                <a href="<?php echo admin_url('admin.php?page=${plugin}_${tableName}_create'); ?>">Agregar...</a>
            </div>
            <br class="clear">
        </div>
        <?php
        global $wpdb;
        $table_name = $wpdb->prefix . "${tableName}";

        $rows = $wpdb->get_results("SELECT <#list columnas as col> col.name <#if col_has_next>,</#if></#list> from $table_name");
        ?>
        <table class='wp-list-table widefat fixed striped posts'>
            <tr>
				<th class="manage-column ss-list-width">ID</th>
			<#list columnas as col>
				<th class="manage-column ss-list-width">${col.alias}</th>
			</#list>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($rows as $row) { ?>
                <tr>
                    <td class="manage-column ss-list-width"><?php echo $row->${indice}; ?></td>
					<#list columnas as col>
					<td class="manage-column ss-list-width"><?php echo $row->${col.name}; ?></td>
					</#list>
			        <td><a href="<?php echo admin_url('admin.php?page=${plugin}_${tableName}_update&id=' . $row->${indice}); ?>">Update</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
	
	<?php
	}