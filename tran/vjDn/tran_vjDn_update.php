<?php

function tran_vjDn_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."vjDn";
    $id_vjDn = $_GET["id_vjDn"];
	$id_vj = $_GET["id_vj"];
	$id_dn = $_GET["id_dn"];
	$Monto = $_POST["Monto"];
	$Razon = $_POST["Razon"];
	$Gasto_ingreso = $_POST["Gasto_ingreso"];
	$fecha = $_POST["fecha"];
	//volver
	if($id_vj) $page_volver= "tran_vj_update&id_vj=".$id_vj;
	else
	if($id_dn) $page_volver= "tran_dn_update&id_dn=".$id_dn;
	else
	$page_volver= "tran_vjDn_list";
	
//update
    if (isset($_POST['update'])){
		$id_vj= $_POST["id_vj"];
		$id_dn= $_POST["id_dn"];
		
        $wpdb->update(
                $table_name, //table
				array( 'id_vj' => $id_vj , 'id_dn' => $id_dn ,  'Monto' => $Monto, 'Razon' => $Razon, 'Gasto_ingreso' => $Gasto_ingreso, 'fecha' => $fecha), //data
                array('id_vjDn' => $id_vjDn ), //where
				array('%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_vjDn = %s", $id_vjDn));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_vjDn  ,'id_vj'  ,'id_dn' , Monto , Razon , Gasto_ingreso , fecha  from $table_name where id_vjDn=%s", $id_vjDn));
        foreach ($results as $r) {
            $id_vjDn = $r->id_vjDn;
			$id_vj = $r->id_vj;
			$id_dn = $r->id_dn;
			$Monto = $r->Monto;
			$Razon = $r->Razon;
			$Gasto_ingreso = $r->Gasto_ingreso;
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
    <div class="wrap">
        <h2></h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Orden de Viaje-Dineros deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Orden de Viaje-Dineros updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Viaje-Dineros</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_vjDn" value="<?php echo $id_vjDn; ?>" disabled /></td>
					</tr>
					<tr>
						<th>ID_viaje</th>
						<td><input type="text" name="id_vj" value="<?php echo $id_vj; ?>"  <?php if ($id_vj) echo readonly  ?> /></td>
					</tr>
					<tr>
						<th>ID_dinero</th>
						<td><input type="text" name="id_dn" value="<?php echo $id_dn; ?>"  <?php if ($id_dn) echo readonly  ?> /></td>
					</tr>
					<tr><th>Monto</th><td><input type="text" name="Monto" value="<?php echo $Monto; ?>" class=""/></td></tr>
					<tr><th>Razon</th><td><input type="text" name="Razon" value="<?php echo $Razon; ?>" class=""/></td></tr>
					<tr><th>Gasto_ingreso</th><td><input type="text" name="Gasto_ingreso" value="<?php echo $Gasto_ingreso; ?>" class=""/></td></tr>
					<tr><th>fecha</th><td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="datetime"/></td></tr>
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