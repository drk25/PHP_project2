<?php include("includes/header.php"); ?>

<?php if ( !$session->is_signed_in() ) { redirect("login.php"); } ?> 

<?php


if(empty($_GET['photo_id'])){
	redirect("photos.php");
}

$photo = Photo::find_by_id($_GET['photo_id');	

//if there is a photo then call delete_photo function
if($photo) {
	$photo->delete_photo();
}
else {
	redirect("photos.php");
}
?>