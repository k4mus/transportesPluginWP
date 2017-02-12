<?php

function tran_cm_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."cm";
    $id_cm = $_GET["id_cm"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				array( 'nombreEmpresa' => $nombreEmpresa, 'fecha' => $fecha), //data
                array('id_cm' => $id_cm), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_cm = %s", $id_cm));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_cm, nombreEmpresa , fecha  from $table_name where id_cm=%s", $id_cm));
        foreach ($results as $r) {
            $id_cm = $r->id_cm;
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
        <h2>Camiones</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Camiones deleted</p></div>
            

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Camiones updated</p></div>
            

        <?php } else { ?>
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>ID</th><td><input type="text" name="id_cm" value="<?php echo $id_cm; ?>" disabled /></td></tr>
					<tr><th>empresa</th><td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class=""/></td></tr>
					<tr><th>fecha</th><td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="datetime"/></td></tr>
					
                </table>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
        <?php } ?>
			<a href="<?php echo admin_url('admin.php?page=tran_cm_list') ?>">&laquo; Volver</a>
			
    </div>
    <script>
		$( ".datetime" ).datepicker();
		$( ".datetime" ).onclick(function(){$(this).datepicker('show')});
	</script>
    <?php
}