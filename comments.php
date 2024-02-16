<?php
include_once("db_connect.php");
$commentId = $_POST['commentId'];
$comment = $_POST['comment'];
$name = $_POST['name'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$xx = $rand.'_'.$filename;
		
			if(!empty($name) && !empty($comment)){
				
				move_uploaded_file($_FILES['foto']['tmp_name'], 'uploads/'.$rand.'_'.$filename);
				$insertComments = "INSERT INTO comment (parent_id, comment, sender, images) VALUES ('$commentId', '$comment', '$name', '$xx')";
				mysqli_query($conn, $insertComments) or die("database error: ". mysqli_error($conn));	
				$message = '<label class="text-success my-5">Testimonial posted Successfully.</label>';
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