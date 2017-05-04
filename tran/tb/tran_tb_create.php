<?php

function tran_tb_create() {
	$name_tb = $_POST["name_tb"];
	$rut = $_POST["rut"];
	$fechaIng = $_POST["fechaIng"];
	$cargo = $_POST["cargo"];
	
	//volver
	$page_volver= "tran_tb_list";
	 //insert
	global $wpdb;
    
    if (isset($_POST['insert'])) {
		
        
        $table_name = $wpdb->prefix ."tb";

        $wpdb->insert(
                $table_name, //table
                array(  'name_tb' => $name_tb , 'rut' => $rut , 'fechaIng' => $fechaIng , 'cargo' => $cargo  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_tb =$wpdb->insert_id;
		$message.="Trabajadores inserted: ".$id_tb;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Trabajadores</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_tb_update&id_tb='.$id_tb).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Trabajadores</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">Código Trabajador</th>
					<td><input type="text" name="name_tb" value="<?php echo $name_tb; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Rut Trabajador</th>
					<td><input type="text" name="rut" value="<?php echo $rut; ?>" class="ss-field-width rut" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Fecha Ingreso</th>
					<td><input type="text" name="fechaIng" value="<?php echo $fechaIng; ?>" class="ss-field-width fecha" /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">Cargo</th>
					<td>
						<select type="text" id= "cargo" name="cargo" value="<?php echo $cargo; ?>  " class="combobox">
						<option value="">Select one...</option>
						<option value="Chofer">Chofer</option>
						<option value="Pioneta">Pioneta</option>
						</select>	
					</td>
                </tr>
            </table>
            <input type='submit' name="insert" value='Save' class='button'>
        </form>
		</div>
		</div>
		<a href="<?php echo admin_url('admin.php?page='.$page_volver) ?>">&laquo; Volver</a>
    </div>
	<script>
		$( ".fecha" ).datepicker();
		$( ".numero" ).spinner();
		$("#tabs" ).tabs();
		$('.combobox').each( function( index, element ){
			$("option[value="+$(this).attr("value")+"]", this).attr('selected','selected');
		});
	</script>
    <?php
}