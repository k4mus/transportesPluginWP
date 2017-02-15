<?php

function tran_vj_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vj";
    $id_vj = $_GET["id_vj"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
//update
    if (isset($_POST['update'])) {
        $wpdb->update(
                $table_name, //table
				array( 'nombreEmpresa' => $nombreEmpresa, 'fecha' => $fecha), //data
                array('id_vj' => $id_vj), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vj = %s", $id_vj));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_vj, nombreEmpresa , fecha  from $table_name where id_vj=%s", $id_vj));
        foreach ($results as $r) {
            $id_vj = $r->id_vj;
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
        <h2>Orden de Viaje</h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Viaje deleted</p></div>
            

        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje updated</p></div>
            

        <?php } else { ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Viaje</a></li>
			<li><a href="#tabs-2">Orden de Transporte</a></li>
			<li><a href="#tabs-3">Trabajadores</a></li>
			<li><a href="#tabs-4">Vehiculos</a></li>
			<li><a href="#tabs-5">Gastos</a></li>
		  </ul>
		  <div id="tabs-1">
            <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed'>
                    <tr><th>ID</th><td><input type="text" name="id_vj" value="<?php echo $id_vj; ?>" disabled /></td></tr>
					<tr><th>empresa</th><td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class=""/></td></tr>
					<tr><th>fecha</th><td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="datetime"/></td></tr>
					
                </table>
				<input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
				<input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
		
            </form>
		</div>
			<div id="tabs-2">
			<?php	tran_ot_list();?>
			</div>
			<div id="tabs-3">
			</div>
			<div id="tabs-4">
			</div>
			<div id="tabs-5">
			</div>
		</div>
        <?php } ?>
		<a href="<?php echo admin_url('admin.php?page=tran_vj_list') ?>">&laquo; Volver</a>
			
    </div>
    <script>
		$( ".datetime" ).datepicker();
		$( "#tabs" ).tabs();
		
	</script>
    <?php
}