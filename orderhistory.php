<?php
session_start();
include 'dbh.php';
if (!isset($_SESSION['userId'])) {
	header("Locatoin: index.php?error=Please Login First");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>



<div >
<?php

	$sql = "SELECT * FROM tickets WHERE uid=? ORDER BY dat DESC;";
    $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
	    header("Location: index.php?error=sqlorderprob");
	    exit();
	}
     else {



		mysqli_stmt_bind_param($stmt, "i",$_SESSION['userId']);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);



	}
	while ($details = mysqli_fetch_assoc($result)) {
		if($details['dat'] == date("Y-m-d") && $details['timings'] < time()){
			
			$tid=$details['tid'];
			$sno=$details['seatno'];

			//action="cancel.php?tid='.$details['tid'].'&dat='.$details['dat'].'&sno='.$details['seatno'].'&mid='.$details['mid'].'&t'.$details['timings'].'"
			echo '<form method="POST" action="cancel.php?tid='.$details['tid'].'&dat='.$details['dat'].'&sno='.$details['seatno'].'&mid='.$details['mid'].'&t'.$details['timings'].'&scno='.$details['scno'].'" style="border-style:groove;margin:30px;hieght:auto;width:auto;overflow:auto;padding:10px;background-color:#AAAAAA;" align="center" >
	        			<a style="font-size:30px;float: left">Ticket Id: '.$details['tid'].'</a>
	        			<a style="font-size:30px;">Movie Id: '.$details['mid'].'</a>
	        			<a style="font-size:30px;float:right" >Movie Name: '.$details['mname'].'</a><br>
	        			<a style="font-size:30px;float:left">Date: '.$details['dat'].'</a>
	        			<a style="font-size:30px;margin-right:10px;">Time: '.$details['timings'].'</a>
	        			<a style="font-size:30px;float:right;">Seat No: '.$details['seatno'].'</a>
								<button type="submit" >Cancel</button>
	       		</form>';

		}
		else {
			echo '<form style="border-style:groove;margin:30px;hieght:auto;width:auto;overflow:auto;padding:10px;background-color:#AAAAAA" align="center">
	        			<a style="font-size:30px;float: left">Ticket Id: '.$details['tid'].'</a>
	        			<a style="font-size:30px;">Movie Id: '.$details['mid'].'</a>
	        			<a style="font-size:30px;float:right" >Movie Name: '.$details['mname'].'</a><br>
	        			<a style="font-size:30px;float:left">Date: '.$details['dat'].'</a>
	        			<a style="font-size:30px;margin-right:10px;">Time: '.$details['timings'].'</a>
	        			<a style="font-size:30px;float:right;">Seat No: '.$details['seatno'].'</a>
	       		</form>';

		}

	}


?>
</div>
</body>
</html>
