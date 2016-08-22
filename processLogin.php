<!-- Adrienne Young -->

<?php
    include("dbConnect2.php");
    session_start();

    $user = $_POST['user'];
    $pass = $_POST['pass'];

    $sql = "SELECT password FROM users WHERE user_name = '$user'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql2 = "SELECT password FROM shelters WHERE user_name = '$user'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_assoc();

    if (!$result && !$result2) {
        echo "<br><br><br><h4 style='text-align:center;'>Error<br>Redirecting...</h4>";
        header("refresh:2,login.php");    
    }

    if($row['password']=='' && $row2['password']=='') {
        echo "<br><br><br><h4 style='text-align:center;'>Username not found<br>Redirecting...</h4>";
        header("refresh:2,login.php");
    }

    else if (md5($pass)==$row['password'] || md5($pass)==$row2['password']) {
        echo "<br><br><br><h4 style='text-align:center;'>Logged in successfully<br>Redirecting...</h4>";
        $_SESSION['user']=$user;
        header("refresh:2,index.php");
    }

    else {
        echo "<br><br><br><h4 style='text-align:center;'>Incorrect password<br>Redirecting...</h4>";
        header("refresh:2,index.php");
    }
?>		