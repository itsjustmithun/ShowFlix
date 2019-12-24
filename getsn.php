<?php 
	session_start();
	header('Location: book.php?mid='.$_SESSION['mid'].'&screenno='.$_POST['scnoandt']);
 ?>