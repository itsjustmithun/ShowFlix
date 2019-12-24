<?php
if(isset($_GET['mid'])){
  session_start();
  include 'dbh.php';

  $_SESSION['mid'] = $_GET['mid'];
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
  include 'lappearordis.php';
?>


<form action="getsn.php" method="POST">

<select name="scnoandt" style="width: 350px;height:25px;float: left;margin: 10px;">

<?php

      $sql = "SELECT scno,timings,price FROM listscreens WHERE mid=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: book.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "s",$_SESSION['mid']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        echo '<option value='.$row['scno'].'&t='.$row['timings'].'&price='.$row['price'] .'>Screen Number:'.$row['scno'].' Timings: '.$row['timings'].' Price:'.$row['price'].'</option>';

        if (!isset($_GET['screenno']) || !isset($_GET['t'])) {
          header('Location: book.php?mid='.$_GET['mid'].'&screenno='.$row['scno'].'&t='.$row['timings'].'&price='.$row['price']);
        }
        while ($row = mysqli_fetch_assoc($result)) {
          if($row['scno'] == $_GET['screenno']){
            echo '<option value='.$row['scno'].'&t='.$row['timings'].'&price='.$row['price'] .' selected>Screen Number:'.$row['scno'].' Timings: '.$row['timings'].' Price:'.$row['price'].'</option>';
          }
          else {
          echo '<option value='.$row['scno'].'&t='.$row['timings'].'&price='.$row['price'] .'>Screen Number:'.$row['scno'].' Timings: '.$row['timings'].' Price:'.$row['price'].'</option>';
        }

        }
      }

?>



</select>

<button type="submit" value="submit" name="submit" style="float: left;width: 200px;height:30px;margin: 10px;padding-top: 8px;">Get Seats Available</button><br>
</form>



  <?php
    echo '<form method="POST" action="reserveseat.php?mid='.$_GET['mid'].'&screenno='.$_GET['screenno'].'&t='.$_GET['t'].'&price='.$_GET['price'].'" style="width:20px;height:30px">';
    echo '<div class="seat-order" style="position: absolute; width: auto; float: left; margin: 30px;"><button type="submit" name="seat-submit" style="float: left;">Book</button><br>';

      $sql = "SELECT seatsbooked FROM screens WHERE scno=? AND mid=? AND timings=? AND dat=? ORDER BY seatsbooked ASC;";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt,$sql)) {
        header("Location: book.php?error=sqlerror");
        exit();
      }
      else {
        $d = date("Y-m-d");
        mysqli_stmt_bind_param($stmt, "iiss",$_GET['screenno'],$_GET['mid'],$_GET['t'],$d);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $i  = 1;
          while ($row = mysqli_fetch_assoc($result)) {

              while(($i<$row['seatsbooked']) && ($i<41)) {
                echo '<input type="checkbox" name="seatno['.$i.']" >';
                $i++;
              }
              if ($row['seatsbooked']==$i) {
              echo '<input type="checkbox" name="seatno['.$i.']" disabled>';
              $i++;
              }

          }
          while($i < 41){
            echo '<input type="checkbox" name="seatno['.$i.']" >';
            $i++;
          }




        }



    echo '<div style="border: 5px solid black; text-align: center; width: auto; font-size: 40px; padding: 10px;">Screen this way</div></div><br>
    ';
    echo '</form>';



}
else {
  header("Location: index.php");
}


?>


</body>
</html>
