<?php 
if($_POST['nisn']=="123456789" && $_POST['nama'] ="admin"){
	header("location:reportdatakeseluruhan.php");
} else {
	include "tampil.php";
	
}
?>