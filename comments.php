<?php
include 'db_connect.php';

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


	if(!empty($_POST["name"]) && !empty($_POST["comment"])){
		
		$insertComments = "INSERT INTO comment (parent_id, comment, sender) VALUES ('".$_POST["commentId"]."', '".$_POST["comment"]."', '".$_POST["name"]."')";
		mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
		$message = '<label class="text-success mt-3 mb-3">Testimonial posted Successfully.</label> <br>';
		$status = array(
			'error'  => 0,
			'message' => $message
		);	
	} else {
		$message = '<label class="text-danger">Error: Testimonial not posted.</label>';
		$status = array(
			'error'  => 1,
			'message' => $message
		);	
	}


echo json_encode($status);
?>