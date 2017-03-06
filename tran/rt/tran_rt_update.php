<?php

function tran_rt_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."rt";
    $id_rt = $_GET["id_rt"];
	$name_rt = $_POST["name_rt"];
	$ciudad_orig = $_POST["ciudad_orig"];
	$comuna_orig = $_POST["comuna_orig"];
	$ciudad_dest = $_POST["ciudad_dest"];
	$comuna_orig = $_POST["comuna_orig"];
	$kms = $_POST["kms"];
	$precioBase = $_POST["precioBase"];
	$precioExtencion = $_POST["precioExtencion"];
	//volver
	$page_volver= "tran_rt_list";
	
	
//update
    if (isset($_POST['update'])){
		
        $wpdb->update(
                $table_name, //table
				array(  'name_rt' => $name_rt, 'ciudad_orig' => $ciudad_orig, 'comuna_orig' => $comuna_orig, 'ciudad_dest' => $ciudad_dest, 'comuna_orig' => $comuna_orig, 'kms' => $kms, 'precioBase' => $precioBase, 'precioExtencion' => $precioExtencion), //data
                array('id_rt' => $id_rt ), //where
				array('%s','%s','%s','%s','%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_rt = %s", $id_rt));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_rt , name_rt , ciudad_orig , comuna_orig , ciudad_dest , comuna_orig , kms , precioBase , precioExtencion  from $table_name where id_rt=%s", $id_rt));
        foreach ($results as $r) {
            $id_rt = $r->id_rt;
			$name_rt = $r->name_rt;
			$ciudad_orig = $r->ciudad_orig;
			$comuna_orig = $r->comuna_orig;
			$ciudad_dest = $r->ciudad_dest;
			$comuna_orig = $r->comuna_orig;
			$kms = $r->kms;
			$precioBase = $r->precioBase;
			$precioExtencion = $r->precioExtencion;
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
            <div class="updated"><p>Rutas deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Rutas updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Rutas</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_rt" value="<?php echo $id_rt; ?>" disabled /></td>
					</tr>
					<tr><th>Nombre Ruta</th>
					<td><input type="text" name="name_rt" value="<?php echo $name_rt; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Ciudad Origen</th>
					<td><input type="text" name="ciudad_orig" value="<?php echo $ciudad_orig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Comuna Origen</th>
					<td><input type="text" name="comuna_orig" value="<?php echo $comuna_orig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Ciudad Destino</th>
					<td><input type="text" name="ciudad_dest" value="<?php echo $ciudad_dest; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Comuna Destino</th>
					<td><input type="text" name="comuna_orig" value="<?php echo $comuna_orig; ?>" class="ss-field-width " /></td>
					</tr>
					<tr><th>Kms Aprox.</th>
					<td><input type="text" name="kms" value="<?php echo $kms; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Precio</th>
					<td><input type="text" name="precioBase" value="<?php echo $precioBase; ?>" class="ss-field-width int" /></td>
					</tr>
					<tr><th>Precio Extención</th>
					<td><input type="text" name="precioExtencion" value="<?php echo $precioExtencion; ?>" class="ss-field-width int" /></td>
					</tr>
                </table>
				<div id='pager'></div>
                <input type='submit' name="update" value='Save' class='button'> &nbsp;&nbsp;
                <input type='submit' name="delete" value='Delete' class='button' onclick="return confirm('&iquest;Est&aacute;s seguro de borrar este elemento?')">
            </form>
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