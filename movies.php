<?php 
  session_start();
  include 'dbh.php';
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Movies!</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="topnav" id="myTopnav">
  <a href="index.php" >Home</a>
  <a href="movies.php" class="active">Movies</a>
  <a href="contact.php">Contact</a>
  <a href="orderhistory.php">Order History</a>

<?php
  include 'lappearordis.php';

  $sql = "SELECT * FROM movies WHERE (CURDATE()-rdate)>60";
  $stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt,$sql)) {
		header("Location: index.php?error=sqlerror");
		exit();
	}
	else {
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

  while ($row = mysqli_fetch_assoc($result)) {
  	if (isset($_SESSION['userId'])) {
  		echo '<form class="moviebox" style="width: auto;height: 200px;padding:20px;" method="GET" action="book.php">
 	<a style="font-size: 18px;padding-right: 20px;"><b>Movie ID :'.$row['id'].'</a></b><a style="font-size: 30px;">'.$row['mname'].'</a><a style="float:right;font-size: 18px;padding:10px;">Release Date :'.$row['rdate'].' Duration : '.$row['duration'].'hrs</a><br><a style="font-size: 15px;">'.$row['mdescription'].'</a><br><button type="submit" name="mid" value="'.$row['id'].'"style="margin-top:100px;">Book Tickets</button>
 	</form>';
  	}
  	else {
  		echo '<h2 style="margin-left: 50px; color:red;">Login to book ticket!</h2>
  		<form class="moviebox" style="width: auto;height: 200px;padding:20px;" method="GET" action="book.php">
 	<a style="font-size: 18px;padding-right: 20px;"><b>Movie ID :'.$row['id'].'</a></b><a style="font-size: 30px;">'.$row['mname'].'</a><a style="float:right;font-size: 18px;padding:10px;">Release Date :'.$row['rdate'].' Duration : '.$row['duration'].'hrs</a><br><a style="font-size: 15px;">'.$row['mdescription'].'</a><br><button type="submit" name="mid" value="'.$row['id'].'"style="margin-top:100px;" disabled>Book Tickets</button>
 	</form>';

  	}

  }
}




?>

</body>
</html>
