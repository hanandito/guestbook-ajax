<?php 
	include('header.php');
?>
<title>Testimonial Harita Gallery - Harita</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="js/comments.js"></script>
<?php include('container.php');?>
	<div class="container pt-5">		
		<h2>Testimonial</h2>		
		<br>
		<div class="row">
			<div class="col-lg-12">
				<form method="POST" id="commentForm" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Name" required />
					</div>
					<div class="form-group my-3">
						<textarea name="comment" id="comment" class="form-control" placeholder="Enter Messages" rows="5" required></textarea>
					</div>
					<span id="message"></span>
					<br>
					<div class="form-group">
						<input type="hidden" name="commentId" id="commentId" value="0" />
            			<input type="file" name="foto" accept="image/*;capture=camera" value="Upload Image" onchange="preview()" /> 
						<img id="thumb" src="" width="150px"/>
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
					</div>
				</form>
			</div>
		</div>		
				
		<br>	   
	</div>	
	<script>
			function preview() {
				thumb.src=URL.createObjectURL(event.target.files[0]);
			}
	</script>
	
<?php include('footer.php');?>


