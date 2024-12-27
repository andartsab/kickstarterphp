<?php
	$con = mysqli_connect("MySQL-8.2","root","","kickstarter");
	$query = mysqli_query($con,"SELECT * FROM projects");
	mysqli_query($con, "INSERT INTO projects (title, texts, goal, donated, img, user) VALUES ('{$_GET["title"]}','{$_GET["texts"]}','{$_GET["goal"]}','{$_GET["donated"]}','{$_GET["img"]}','{$_GET["user"]}' )");
	header("Location: https://kickstarter.local/add.php");
?>