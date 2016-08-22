<!-- Adrienne Young -->

<?php
    include ("header.php");
    session_start();

    if(isset($_SESSION) && ($_SESSION['user']!='')) {
        echo "<br><br><br><h4 style='text-align:center;'>You are already signed in<br>Redirecting...</h4>";
        header("refresh:2,shelters.php");
    }
    else {
        echo "<br><br><h2>Please log in:</h2>";
        echo '<form action="processLogin.php" method="post">
                    Username:<br>
                    <input type="text" name="user"><br>
                    
                    Password:<br>
                    <input type="password" name="pass"><br>
                    
                    <input type="submit" name="Submit"<br>
            </form>';
    }
?>
	