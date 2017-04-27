<?php

function tran_vj_create() {
	$name_vj = $_POST["name_vj"];
	$nombreEmpresa = $_POST["nombreEmpresa"];
	$fecha = $_POST["fecha"];
	
	//volver
	$page_volver= "tran_vj_list";
	 //insert
	global $wpdb;
    
    if (isset($_POST['insert'])) {
		
        
        $table_name = $wpdb->prefix ."vj";

        $wpdb->insert(
                $table_name, //table
                array(  'name_vj' => $name_vj , 'nombreEmpresa' => $nombreEmpresa , 'fecha' => $fecha  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_vj =$wpdb->insert_id;
		$message.="Orden de Viaje inserted: ".$id_vj;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Orden de Viaje</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_vj_update&id_vj='.$id_vj).'"
		</script>';
		endif; ?>
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Orden de Transporte</a></li>
		  </ul>
		<div id="tabs-1">
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <p> </p>
            <table class='wp-list-table widefat fixed'>
				<tr>
                    <th class="ss-th-width">codVIaje</th>
					<td><input type="text" name="name_vj" value="<?php echo $name_vj; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">empresa</th>
					<td><input type="text" name="nombreEmpresa" value="<?php echo $nombreEmpresa; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">fecha</th>
					<td><input type="text" name="fecha" value="<?php echo $fecha; ?>" class="ss-field-width fecha" /></td>
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