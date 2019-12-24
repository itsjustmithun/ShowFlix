<?php 
	session_start();
	include 'dbh.php';

	if(isset($_POST['submit']) && $_SESSION['userUid'] == "Admin"){

		$mname = $_POST['mname'];
		$rdate = $_POST['rdate'];
		$mdesc = $_POST['mdescription'];
		$file = $_FILE['image']['tmp_name'];
		if (!isset($_FILE['image']['tmp_name'])) {
			header("Location: upload.php?error=noimage");
			exit();
		}
		else {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
			$image_name = addslashes($_FILES['image']['mname']);
			$image_size = getimagesize($_FILES['image']['tmp_name']);

			if (!$image_size) {
				header("Location: upload.php?error=notimage");
				exit();
			}
			else {

				$sql = "INSERT INTO movies VALUES ('001',?,?,?,?);";
				$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt,$sql)) {
						header("Location: upload.php?error=sqlerror");
						exit();
					}
					else {					

						mysqli_stmt_bind_param($stmt,"ssss",$mname,$rdate,$mdesc,$image);
						mysqli_stmt_execute($stmt);
						header("Location: index.php?signup=success");
						exit();		
					}
				if(!$insert = mysql_query()) {
					header("Location: upload.php?error=failedimageupload");
					exit();
				}
				else {
					$lastid = mysql_insert_id();
					header("Location: upload.php?success=get.php?id=".$lastid);
					exit();
				}
			}

		}

	}
	else {
		header("Location: index.php");
		exit();
	}

	// To get image do the following:
	// $lastid = mysql_insert_id();
	// echo "image is "

	// $id = addslashes($_REQUEST['id']);
	// $image = mysql_query("SELECT * FROM movies WHERE id=$id");
	// $image = mysqli_fetch_assoc();
	// $image = $image['image'];

	// header("Content-type: image/jpeg");


 ?>

