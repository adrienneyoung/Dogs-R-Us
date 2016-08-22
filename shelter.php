<!-- Adrienne Young -->

<?php 
    include ("header.php");
    session_start();
    $user=$_SESSION['user'];

//Display shelter reviews
    $cquery="SELECT shelter_name, rating, review 
                  FROM shelterInfo JOIN shelterReview USING (shelterId)
                  ORDER BY shelter_name ASC";
    $result = $conn->query($cquery);
   
    if($result->num_rows > 0) {
         echo "<br><br><h1>Shelters</h1>";
    }

    while($row = $result->fetch_assoc()) {
	    echo "<h4>" . $row['shelter_name'] . "</h4> Rating: " . $row['rating'] . "<br> Review: " . $row['review'] . "<br><br>";
    }

//Users can review shelters if they are logged in
    if(isset($_SESSION) && ($_SESSION['user']!='')) {
        echo "<h1>Review a Shelter!</h1>";
        
        $squery="SELECT DISTINCT shelter_name, shelterId
                      FROM shelterInfo JOIN shelterReview USING (shelterId)
                      ORDER BY shelter_name DESC";
       $sresult = $conn->query($squery);

        echo '<form action="processReview.php" method="post">
                    Shelter: 
                    <select name = "shelter">'; 
                        while($row = $sresult->fetch_assoc()) {
                            echo "<option value=" . $row['shelterId'] . ">" . $row['shelter_name'] . "</option>";
                        }
                    echo '</select><br>';

        echo 'Rating: 
            <select name = "rating">
                <option value="1">1 star</option>
                <option value="2">2 stars</option>
                <option value="3">3 stars</option>
                <option value="4">4 stars</option>
                <option value="5">5 stars</option>
            </select><br>

        Comments:
        <input type="text" name="review"><br>

        <input type="submit" value="Review Shelter"></form><br><br>';
    }
?>