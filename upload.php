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
  <a href="contact.php">Contact</a>
  <a href="orderhistory.php">Order History</a>
<?php 
  include 'lappearordis.php'
 ?>

   <div class="gallery-upload">
 		<form action="uploadpage.php" method="POST" enctype="multipart/form-data">

 			<input type="text" name="id" placeholder="Movie ID">
 			<input type="text" name="mname" placeholder="Movie Name">			
 			<input type="date" name="rdate" placeholder="Release Date" style="width: 50%;">
 			<input type="text" name="mdescription" placeholder="Movie Description">
 			<input type="file" name="image">
 			<button type="submit" name="submit" value="submit">UPLOAD</button>
 		</form>
    <img src=$_GET['success']>
 	</div>

</body>
</html>