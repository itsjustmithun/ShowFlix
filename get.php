<?php 
	include 'dbh.php'	;
	include 'lappearordis.php';

	
	$lastid = mysql_insert_id() ;
	echo "image is " ;

	$id = addslashes($_REQUEST['id']);
	$image = mysql_query("SELECT * FROM movies WHERE id=$id");
	$image = mysql_fetch_assoc();
	$image = $image['image'];

	header("Content-type: image/jpeg");
 ?>