<?php
	$con = mysqli_connect("MySQL-8.2","root","","kickstarter");
	$texts=$_GET["texts"];
	$title=$_GET["title"];
	$goal=$_GET["goal"];
	$donated=$_GET["donated"];
	$id=$_GET["id"];
	$query = mysqli_query($con,"UPDATE projects SET texts='$texts', title='$title', goal='$goal', donated='$donated' WHERE id='$id'");
	header("Location: https://kickstarter.local/add.php");
?>