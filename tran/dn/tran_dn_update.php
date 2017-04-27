<?php

function tran_dn_update() {
    global $wpdb;
    $table_name = $wpdb->prefix ."dn";
    $id_dn = $_GET["id_dn"];
	$name_dn = $_POST["name_dn"];
	$signo = $_POST["signo"];
	//volver
	$page_volver= "tran_dn_list";
	
	
//update
    if (isset($_POST['update'])){
		
        $wpdb->update(
                $table_name, //table
				array(  'name_dn' => $name_dn, 'signo' => $signo), //data
                array('id_dn' => $id_dn ), //where
				array('%s','%s'), //data format
                array('%s') //where format
        );
    }
//delete
    else if (isset($_POST['delete'])) {
        $wpdb->query($wpdb->prepare("DELETE FROM $table_name WHERE id_dn = %s", $id_dn));
    } else {//selecting value to update	
        $results = $wpdb->get_results($wpdb->prepare("SELECT id_dn , name_dn , signo  from $table_name where id_dn=%s", $id_dn));
        foreach ($results as $r) {
            $id_dn = $r->id_dn;
			$name_dn = $r->name_dn;
			$signo = $r->signo;
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
            <div class="updated"><p>Dineros deleted</p></div>
        
        <?php } else if ($_POST['update']) { ?>
            <div class="updated"><p>Dineros updated</p></div>
        
        <?php } else { ?>
		
		<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Dineros</a></li>
		  </ul>
		  <div id="tabs-1">
			<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                <table class='wp-list-table widefat fixed' id="tabla">
                    <tr>
						<th>ID</th>
						<td><input type="text" name="id_dn" value="<?php echo $id_dn; ?>" disabled /></td>
					</tr>
                    
					<th class="ss-th-width">Concepto</th> 
					<td><input type="text" name="name_dn" value="<?php echo $name_dn; ?>" class="ss-field-width " /></td>
					</tr>
					<th class="ss-th-width">gasto/ingreso</th> 
					<td>
						<input type="radio" name="signo" value="1" <?php if ($signo=="1") echo 'checked' ?> />1
						<input type="radio" name="signo" value="-1" <?php if ($signo=="-1") echo 'checked' ?> />-1
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