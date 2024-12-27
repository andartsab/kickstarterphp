<?php
$connect = mysqli_connect("MySQL-8.2","root","","kickstarter");
$query = mysqli_query($connect, "DELETE FROM projects WHERE id='{$_GET['id']}'");
header("Location: https://kickstarter.local/add.php");
?>