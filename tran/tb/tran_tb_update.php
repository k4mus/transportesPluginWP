<?php

function tran_tb_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."tb";
    $id_tb = $_GET["id_tb"];
	$name_tb = $_POST["name_tb"];
	$rut = $_POST["rut"];
	$fechaIng = $_POST["fechaIng"];
	$cargo = $_POST["cargo"];
	//volver
	$page_volver= "tran_tb_list";
	
	
//update
    if (isset($_POST['update'])){
		
        $wpdb->update(
                $table_name, //table
				array(  'name_tb' => $name_tb, 'rut' => $rut, 'fechaIng' => $fechaIng, 'cargo' => $cargo), //data
                array('id_tb' => $id_tb ), //where
				array('%s','%s','%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_tb = %s", $id_tb));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_tb , name_tb , rut , fechaIng , cargo  from $table_name where id_tb=%s", $id_tb));
        foreach ($results as $r) {
            $id_tb = $r->id_tb;
			$name_tb = $r->name_tb;
			$rut = $r->rut;
			$fechaIng = $r->fechaIng;
			$cargo = $r->cargo;
        }
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/css/ui.jqgrid.min.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/free-jqgrid/4.13.6/js/jquery.jqgrid.min.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    <div class="wrap">
        <h2></h2>

        <?php if ($_POST['delete']) { ?>
            <div class="updated"><p>Trabajadores deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Trabajadores updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Trabajadores</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_tb" value="<?php echo $id_tb; ?>" disabled /></td>
					</tr>
                    
					<th class="ss-th-width">Código Trabajador</th> 
					<td><input type="text" name="name_tb" value="<?php echo $name_tb; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">Rut Trabajador</th> 
					<td><input type="text" name="rut" value="<?php echo $rut; ?>" class="ss-field-width rut" /></td>
					</tr>
					<th class="ss-th-width">Fecha Ingreso</th> 
					<td><input type="text" name="fechaIng" value="<?php echo $fechaIng; ?>" class="ss-field-width fecha" /></td>
					</tr>
					<th class="ss-th-width">Cargo</th> 
					<td>
						<input type="radio" name="cargo" value="Chofer" <?php if ($cargo=="Chofer") echo 'checked' ?> />Chofer
						<input type="radio" name="cargo" value="Pioneta" <?php if ($cargo=="Pioneta") echo 'checked' ?> />Pioneta
					</td>
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
		$( ".fecha" ).datepicker();
		$( "#tabs" ).tabs();
		$('.combobox').each( function( index, element ){
			$("option[value="+$(this).attr("value")+"]", this).attr('selected','selected');
		});
		$( ".numero" ).spinner();
		
	</script>
    <?php
}