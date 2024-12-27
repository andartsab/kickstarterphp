<?php
	$con = mysqli_connect("MySQL-8.2","root","","kickstarter");
	$query = mysqli_query($con,"SELECT * FROM projects WHERE id='{$_GET["id"]}'");
	$stroka = $query -> fetch_assoc();
	$donat = $stroka['donated'] + 10;
	echo $donat;
	mysqli_query($con, "UPDATE projects SET donated='" . $donat . "' WHERE id='{$_GET["id"]}'");
	header("Location: index.php");
?>