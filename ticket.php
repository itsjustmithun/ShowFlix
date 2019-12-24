<?php
session_start();
include 'dbh.php'
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
	<script type="text/javascript">
    function PrintDiv() {
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=300,height=300');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }


 </script>




<!-- div id="divToPrint" style="display:none;">
  <div style="width:200px;height:300px;background-color:teal;">

  </div>
</div> -->


<div id="divToPrint">
	<button onclick="location.href='index.php';" style="width: auto;height: auto;">Main Menu</button>
<?php
	echo '<h1 align="center">Booking successful!</h1>';
	$seatSelected = $_GET['seats'];
	$tid;
	$duration;
	$length = strlen($seatSelected);
	trim($seatSelected);
	while($seatSelected) {

			$pos1 = strpos($seatSelected, " ") ;
			$num = substr($seatSelected, 0,$pos1);
			$seatSelected = substr($seatSelected, $pos1+1);

				$price = $_GET['price'];
				$sql = "INSERT INTO screens VALUES(?,?,?,?,?,?);";
     			$stmt = mysqli_stmt_init($conn);
	     		if (!mysqli_stmt_prepare($stmt,$sql)) {
	          		header("Location: index.php?error=sqlerror");
	         		exit();
	    		}
     			else {
						$d = date("Y-m-d");
	       				 mysqli_stmt_bind_param($stmt, "iissii",$_GET['screenno'],$_GET['mid'],$_GET['t'],$d,$num,$price);
	        			 mysqli_stmt_execute($stmt);


        		}

        		$sql = "SELECT mname,duration FROM movies WHERE id=?";
     			$stmt = mysqli_stmt_init($conn);
	     		if (!mysqli_stmt_prepare($stmt,$sql)) {
	          		header("Location: index.php?error=sqlerrormoviename");
	         		exit();
	    		}
     			else {



	       				 mysqli_stmt_bind_param($stmt, "i",$_GET['mid']);
	        			 mysqli_stmt_execute($stmt);
	        			 $result = mysqli_stmt_get_result($stmt);
	        			 $mname = mysqli_fetch_assoc($result);
	        			 $duration = $mname['duration'];

	       		}




        		$sql = "INSERT INTO `tickets`(`uid`, `uname`, `mid`, `mname`, `seatno`, `timings`, `dat`, `price`,`scno`) VALUES (?,?,?,?,?,?,?,?,?)";
     			$stmt = mysqli_stmt_init($conn);
	     		if (!mysqli_stmt_prepare($stmt,$sql)) {
	          		header("Location: index.php?error=sqlerror2ndone");
	         		exit();
	    		}
     			else {
						$d = date("Y-m-d");
						$uid = $_SESSION['userId'];
						$uname = $_SESSION['userUid'];
						$timings = $_GET['t'];
	       				mysqli_stmt_bind_param($stmt,"isisissii",$uid,$uname,$_GET['mid'],$mname['mname'],$num,$_GET['t'],$d,$price,$_GET['screenno']);
	        			 mysqli_stmt_execute($stmt);


        		}

        		$sql = "SELECT tid FROM tickets WHERE seatno=?";
     			$stmt = mysqli_stmt_init($conn);
	     		if (!mysqli_stmt_prepare($stmt,$sql)) {
	          		header("Location: index.php?error=sqlerrorticket");
	         		exit();
	    		}
     			else {



	       				 mysqli_stmt_bind_param($stmt, "i",$num);
	        			 mysqli_stmt_execute($stmt);
	        			 $result = mysqli_stmt_get_result($stmt);
	        			 $tid = mysqli_fetch_assoc($result);
	        			 //echo $mname['mname'];

	       		}



        		echo '<form style="border-style:groove;margin:30px;hieght:auto;width:auto;overflow:auto;padding:10px;background-color:#AAAAAA" align="center">
        			<a style="font-size:30px;float: left">Ticket Id: '.$tid['tid'].'</a>
        			<a style="font-size:30px;">Movie Id: '.$_GET['mid'].'</a>
        			<a style="font-size:30px;float:right" >Movie Name: '.$mname['mname'].'</a><br>
        			<a style="font-size:30px;float:left">Date: '.$d.'</a>
        			<a style="font-size:30px;margin-right:10px;">Time: '.$_GET['t'].'</a>
        			<a style="font-size:30px;float:right">Duration: '.$duration.'</a><br>
        			<a style="font-size:30px;margin-right:10px;float: left;" >Screen No: '.$_GET['screenno'].'</a>
        			<a style="font-size:30px;float:right;">Seat No: '.$num.'</a>

        		</form>';
	}
?>
</div>




<div>
  <button type="button" value="print" onclick="PrintDiv();">Print</button>
</div>

</body>
</html>
