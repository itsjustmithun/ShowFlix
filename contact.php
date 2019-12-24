<?php 
  session_start();
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
  <a href="movies.php">Movies</a>
  <a href="contact.php" class="active">Contact</a>
  <a href="orderhistory.php">Order History</a>
<?php 
  include 'lappearordis.php'
 ?>
 <h3 style="margin: 50px">e-mail: mitbusiness15@gmail.com</h3>

</body>
</html>