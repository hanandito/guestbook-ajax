<?php 
	include('header.php');
?>
<title>Testimonial Harita Gallery - Harita</title>
<script src="js/comments.js"></script>
<?php include('container.php');?>
	<div class="container pt-5">		
		<h2>Testimonial</h2>		
		<br>
		<div class="row">
			<div class="col-lg-12">
				<form method="POST" id="commentForm">
					<div class="form-group">
						<input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" required />
					</div>
					<div class="form-group my-3">
						<textarea name="comment" id="comment" class="form-control" placeholder="Enter Messages" rows="5" required></textarea>
					</div>
					<span id="message"></span>
					<br>
					<div class="form-group">
						<input type="hidden" name="commentId" id="commentId" value="0" />
						<input type="submit" name="submit" id="submit" class="btn btn-primary" value="Submit" />
					</div>
				</form>
			</div>
		</div>		
				
		<br>	   
	</div>	
<?php include('footer.php');?>

