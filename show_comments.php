<?php
include_once("db_connect.php");
$commentQuery = "SELECT id, parent_id, comment, sender, images, date FROM comment WHERE parent_id = '0' ORDER BY id DESC";
$commentsResult = mysqli_query($conn, $commentQuery) or die("database error:". mysqli_error($conn));
$commentHTML = '';
while($comment = mysqli_fetch_assoc($commentsResult)){
	$commentHTML .= '
				<div class="card">
				<div class="card-header">
					'.$comment["sender"].'   . <span class="text-muted">'.$comment["date"].'</span>
				</div>
				<div class="card-body">
				<p class="card-text">
					'.$comment["comment"].'
				</p>
				</div>
			</div> 
			<br>
			';
	$commentHTML .= getCommentReply($conn, $comment["id"]);
}
echo $commentHTML;

function getCommentReply($conn, $parentId = 0, $marginLeft = 0) {
	$commentHTML = '';
	$commentQuery = "SELECT id, parent_id, comment, sender, date FROM comment WHERE parent_id = '".$parentId."'";	
	$commentsResult = mysqli_query($conn, $commentQuery);
	$commentsCount = mysqli_num_rows($commentsResult);
	if($parentId == 0) {
		$marginLeft = 0;
	} else {
		$marginLeft = $marginLeft + 48;
	}
	if($commentsCount > 0) {
		while($comment = mysqli_fetch_assoc($commentsResult)){  
			$commentHTML .= '
				<div class="card">
					<div class="card-header">
						'.$comment["sender"].'   . <span class="text-muted">'.$comment["date"].'</span>
					</div>
					<div class="card-body">
					<p class="card-text">
						'.$comment["comment"].'
					</p>
					</div>
				</div> <br>
				';
			$commentHTML .= getCommentReply($conn, $comment["id"], $marginLeft);
		}
	}
	return $commentHTML;
}
?>
<script type="text/javascript">
    var int=self.setInterval(showComments,15000);
    function showComments() {
        $.post( "show_comments.php", function( data ) {
          $("#showComments").html( data );
        });
    }
</script>