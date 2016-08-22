<!-- Adrienne Young -->

<?php
	session_start();
	if($_SESSION['user']) {
		echo "<br><br><br><h4 style='text-align:center;'>Logging out...</h4>";
		session_unset();
	} 
	header("refresh:2,index.php");
?>