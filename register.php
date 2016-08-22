<!-- Adrienne Young -->

<?php
    session_start();
    include ("header.php");

    if(isset($_SESSION) && ($_SESSION['user']!='')) {
        echo "<br><br><br><h4 style='text-align:center;'>You are already signed in<br>Redirecting...</h4>";
        header("refresh:2,index.php");
    }

    //User registration
    else {
        echo "<br><br><h2>Register here if you want to adopt pets:</h2>";
        echo '<form action="processRegistration.php" method="post">
                    First Name:<br>
                    <input type="text" name="first"><br>

                    Last Name:<br>
                    <input type="text" name="last"><br>

                    Address:<br>
                    <input type="text" name="add"><br>

                    Username:<br>
                    <input type="text" name="user"><br>

                    Password:<br>
                    <input type="password" name="pass"><br>

                    <input type="submit" value="Register">
            </form>';
        
        //Shelter registration
        $sql = "SELECT DISTINCT shelter_name, shelterId
                    FROM shelterInfo JOIN shelterReview USING (shelterId)
                    ORDER BY shelter_name DESC";
        $result = $conn->query($sql);
            
        echo "<br><br><h2>Register here if you are a shelter:</h2>";
        echo '<form action="processRegistrationShelter.php" method="post">
                    First Name:<br>
                    <input type="text" name="first"><br>

                    Last Name:<br>
                    <input type="text" name="last"><br>
                    
                    Shelter:<br>
                    
                    <select name = "shelter">'; 
                        while($row = $result->fetch_assoc()) {
                            echo "<option value=" . $row['shelterId'] . ">" . $row['shelter_name'] . "</option>";
                        }
                    echo '</select><br>

                    Username:<br>
                    <input type="text" name="user"><br>

                    Password:<br>
                    <input type="password" name="pass"><br>

                    <input type="submit" value="Register">
            </form>';
    }
?>