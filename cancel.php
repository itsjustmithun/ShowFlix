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
  <?php


  $sql = "DELETE FROM screens WHERE dat=CURDATE() AND seatsbooked=? AND scno=? AND mid=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
      header("Location: index.php?error=cancelerror");
    exit();
  }
  else {

       mysqli_stmt_bind_param($stmt, "iii",$_GET['sno'],$_GET['scno'],$_GET['mid']);
       mysqli_stmt_execute($stmt);

  }




    $tid = $_GET['tid'];
    $sql = "DELETE FROM tickets WHERE tid = ?;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
            header("Location: index.php?error=sqlerror");
          exit();
      }
      else {
        $d = date("Y-m-d");
        mysqli_stmt_bind_param($stmt, "i",$tid);
        mysqli_stmt_execute($stmt);


        }

        echo '<h1>Ticket cancelled! Successfully! Redirecting....</h1>';
        echo '<meta http-equiv="refresh" content="2;url=index.php" />';
   ?>
</body>
</html>
