<?php 
$id = $_GET['uid'];
$con = new mysqli("localhost","root","","student");
$delete = $con->query("DELETE FROM std_info WHERE id='$id'");

header("location: index.php")

?>