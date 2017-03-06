<?php

function tran_vj_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vj";
    $id_vj = $_GET["id_vj"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	//volver
	$page_volver= "tran_vj_list";
	
	
//update
    if (isset($_POST['update'])){
		
        $wpdb->update(
                $table_name, //table
				array(  'nombreEmpresa' => $nombreEmpresa, 'fecha' => $fecha), //data
                array('id_vj' => $id_vj ), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vj = %s", $id_vj));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_vj , nombreEmpresa , fecha  from $table_name where id_vj=%s", $id_vj));
        foreach ($results as $r) {
            $id_vj = $r->id_vj;
			$nombreEmpresa = $r->nombreEmpresa;
			$fecha = $r->fecha;
        }
    }
    ?>
    <link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/css/ui.jqgrid.min.css">
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/js/jquery.jqgrid.min.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    <div class="wrap">
        <h2></h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Viaje deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje</a></li>
			<li><a href="#tabs-2" name=dnTab>Dineros</a></li>
			<li><a href="#tabs-3" name=tbTab>Trabajadores</a></li>
			<li><a href="#tabs-4" name=vhTab>Vehiculos</a></li>
			<li><a href="#tabs-5" name=otTab>Orden de Transporte</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_vj" value="<?php echo $id_vj; ?>" disabled /></td>
					</tr>
					<tr><th>empresa</th>
					<td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>fecha</th>
					<td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width datetime" /></td>
					</tr>
                </table>
				<div id='pager'></div>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
		</div>
		<div id="tabs-2">
			<?php	tran_vjDn_list($id_vj);?>
		</div>
		<div id="tabs-3">
			<?php	tran_vjTb_list($id_vj);?>
		</div>
		<div id="tabs-4">
			<?php	tran_vjVh_list($id_vj);?>
		</div>
		<div id="tabs-5">
			<?php	;?>
		</div>
        <?php } ?>
			<a href="<?php echo admin_url('admin.php?page='.$page_volver) ?>">&laquo; Volver</a>
			
    </div>
    <script>
		$( ".datetime" ).datepicker();
		$( "#tabs" ).tabs();
		
		
	</script>
    <?php
}