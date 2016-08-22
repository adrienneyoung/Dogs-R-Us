<!-- Adrienne Young -->

<?php
	include ("dbConnect2.php");
    session_start();
    $user=$_SESSION['user'];

	$shelter=$_POST['shelter'];
	$rating=$_POST['rating'];
	$review=$_POST['review'];

     //Updates review when user writes another review for the shelter
	$cquery="SELECT shelterId, user_name 
            FROM shelterReview 
            WHERE shelterId='$shelter' AND user_name='$user'";
	$result=$conn->query($cquery);
   
	if($result->num_rows>0) {
		$rquery="UPDATE shelterReview 
                SET rating='$rating',  review = '$review'
                WHERE shelterId='$shelter' AND user_name='$user'";

		if($rresult = $conn->query($rquery))
                        echo "<br><br><br><h4 style='text-align:center;'>Successfully reviewed shelter</h4>";
		else
			echo "<br><br><br><h4 style='text-align:center;'>Could not review shelter</h4>";	
	}

        //Inserts a new review into the database
	else {
		$squery="INSERT INTO shelterReview (shelterId, user_name, rating, review) 
                VALUES 
                ('$shelter', '$user', '$rating', '$review')";

		if($sresult = $conn->query($squery))
			echo "<br><br><br><h4 style='text-align:center;'>Successfully rated shelter</h4>";
		else
			echo "<br><br><br><h4 style='text-align:center;'>Could not rate shelter</h4>";
	}
	
    echo "<br><br><br><h4 style='text-align:center;'>Redirecting...</h4>";
    header("refresh:2,shelters.php");
?>	