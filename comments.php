<?php
include_once("db_connect.php");
$commentId = $_POST['commentId'];
$comment = $_POST['comment'];
$name = $_POST['name'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
$filename = $_FILES['images']['name_i'];
$ukuran = $_FILES['images']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);


	if($ukuran < 1044070){ 
	$xx = $rand.'_'.$filename;
	move_uploaded_file($_FILES['images']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
	mysqli_query($koneksi, "INSERT INTO user VALUES(NULL,'$nama','$kontak','$alamat','$xx')");
	
		if(!empty($name) && !empty($comment)){
			$insertComments = "INSERT INTO comment (parent_id, comment, sender) VALUES ('$commentId', '$comment', '$name')";
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

		header("location:index.php?alert=berhasil");
	}else{
		header("location:index.php?alert=gagak_ukuran");
	}
	
echo json_encode($status);
?>