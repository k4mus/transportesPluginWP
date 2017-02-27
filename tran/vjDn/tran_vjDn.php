<?php
/*
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
//$idVj = $_GET['id_vj']; // get the direction
if(!$sidx) $sidx =1;
// connect to the database
$db = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error()); 
mysql_select_db("bd_wordpress") or die("Error connecting to db."); 

$result = mysql_query("SELECT COUNT(1) FROM wp_vjDn");
$row = mysql_fetch_array($result,MYSQL_ASSOC);
$count = $row['count'];

if( $count >0 ) {
	$total_pages = ceil($count/$limit);
} else {
	$total_pages = 0;
}
if ($page > $total_pages) $page=$total_pages;
$start = $limit*$page - $limit; // do not put $limit*($page - 1)
$SQL = "SELECT  id_vjDn,  Monto , Razon , Gasto_ingreso , fecha FROM wp_vjDn";
$result = mysql_query( $SQL ) or die("Couldn t execute query.".mysql_error());
$responce= new StdClass;
$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $responce->rows[$i]['id']=$row[id_vjDn];
    $responce->rows[$i]['cell']=array($row[id_vjDn],$row[Monto],$row[Razon],$row[Gasto_ingreso],$row[fecha]);
    $i++;
}        
echo json_encode($responce);
*/