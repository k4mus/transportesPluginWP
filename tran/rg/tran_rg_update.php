<?php

function tran_rg_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."rg";
    $id_rg = $_GET["id_rg"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				array( 'nombreEmpresa' => $nombreEmpresa, 'fecha' => $fecha), //data
                array('id_rg' => $id_rg), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_rg = %s", $id_rg));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_rg, nombreEmpresa , fecha  from $table_name where id_rg=%s", $id_rg));
        foreach ($results as $r) {
            $id_rg = $r->id_rg;
			$nombreEmpresa = $r->nombreEmpresa;
			$fecha = $r->fecha;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
    <div class="wrap">
        <h2>Registro de Gastos</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Registro de Gastos deleted</p></div>
            

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Registro de Gastos updated</p></div>
            

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>ID</th><td><input type="text" name="id_rg" value="<?php echo $id_rg; ?>" disabled /></td></tr>
					<tr><th>empresa</th><td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class=""/></td></tr>
					<tr><th>fecha</th><td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="datetime"/></td></tr>
					
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>
			<a href="<?php echo admin_url('admin.php?page=tran_rg_list') ?>">&laquo; Volver</a>
			
    </div>
    <script>
		$( ".datetime" ).datepicker();
		$( ".datetime" ).onclick(function(){$(this).datepicker('show')});
	</script>
    <?php
}