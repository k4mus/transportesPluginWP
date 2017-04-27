<?php

function tran_dn_create() {
	$name_dn = $_POST["name_dn"];
	$signo = $_POST["signo"];
	
	//volver
	$page_volver= "tran_dn_list";
	 //insert
	global $wpdb;
    
    if (isset($_POST['insert'])) {
		
        
        $table_name = $wpdb->prefix ."dn";

        $wpdb->insert(
                $table_name, //table
                array(  'name_dn' => $name_dn , 'signo' => $signo  ), //data
                array('%s', '%s') //data format	 		
        );
        $id_dn =$wpdb->insert_id;
		$message.="Dineros inserted: ".$id_dn;
    }
    ?>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<link type="text/css" href="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/style-admin.css" rel="stylesheet" />
	<script src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php echo WP_PLUGIN_URL; ?>/transportes-plugin/js/combobox.js"></script>
    
    <div class="wrap">
        <h2>Add New Dineros</h2>
        <?php if (isset($message)): ?><div class="updated"><p><?php echo $message; ?></p></div><?php 
		echo '<script type="text/javascript">
           window.location = "'.admin_url('admin.php?page=tran_dn_update&id_dn='.$id_dn).'"
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
                    <th class="ss-th-width">Concepto</th>
					<td><input type="text" name="name_dn" value="<?php echo $name_dn; ?>" class="ss-field-width " /></td>
                </tr>
				<tr>
                    <th class="ss-th-width">gasto/ingreso</th>
					<td>
						<input type="radio" name="signo" value="1"/>1
						<input type="radio" name="signo" value="-1"/>-1
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