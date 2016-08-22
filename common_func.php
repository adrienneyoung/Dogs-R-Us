<?php
	/*
function get_connection() {
		$conn_string = "host=localhost port=5432 dbname=dogsrus user=postgres password=postgres";
		$dbconn = pg_connect($conn_string) or die ("Could not connect to server\n".pg_last_error($dbconn));
		return $dbconn;
	}
	*/

	function get_connection() {
		$conn_string = "host=ec2-54-221-249-201.compute-1.amazonaws.com port=5432 dbname=deje93g884ngbn user=vyskmusustwnun password=25QVVih68WwMB4PaAYdG09i4Za";
		$dbconn = pg_connect($conn_string) or die ("Could not connect to the server\n".pg_last_error($dbconn));
		return $dbconn;
	}


  function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
?>