<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
<title>Reserve Seat!</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body>
<div align="center">
<?php
$numberoftkts = 0;
if (isset($_POST['seat-submit']) && !empty($_POST['seatno'])) {
	$seatno = $_POST['seatno'];
	echo '<h1 style="margin:10px;">Your seat numbers are:</h1> <br>';
	$seatSelected = "";
	foreach ($seatno as $key => $value) {
	 	echo '<h1 style="margin:15px;">Seat '.$key.'</h1><br>';
	 	$numberoftkts++;
		$seatSelected .= (string)$key.'+';

	 }
	 echo '<h1 style="margin:10px;">Total cost: '.($numberoftkts*$_GET['price']);

	 echo '</h1><br><br>';

	echo '<form method="POST" action="ticket.php?mid='.$_GET['mid'].'&screenno='.$_GET['screenno'].'&t='.$_GET['t'].'&price='.$_GET['price'].'&seats='.$seatSelected.'" style="width:auto;height:auto;float:left;">';
    echo '<button type="submit" style="width:500px;margin:20px;font-size:30px;">Yes, Please Book</button><br>';
    echo '</form>';
    echo '<form method="POST" action="book.php?mid='.$_GET['mid'].'&screenno='.$_GET['screenno'].'&t='.$_GET['t'].'&price='.$_GET['price'].'&seats='.$seatSelected.'" style="width:auto;height:auto;float:right;">';
    echo '<button type="submit" style="width:500px;margin:20px;font-size:30px;">No, Do not book</button><br>';
    echo '</form>';




}
else {
	header('Location: book.php?mid='.$_GET['mid'].'&screenno='.$_GET['screenno'].'&t='.$_GET['t'].'&price='.$_GET['price'].'&error=Chooseseats');
	exit();
}
?>
</div>
</body>
</html>
