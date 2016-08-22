<!-- Adrienne Young -->

<!DOCTYPE html>
<html class="no-js" xml:lang="en" lang="en">
	<head>
        <!--  Bootstrap  -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <link rel='stylesheet' type='text/css' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>

        <!--  CSS Files -->
        <link rel="stylesheet" href="dogsRUs.css" type="text/css" media="screen"/>
		<!-- Raleway Font -->
		<link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <!--  Javascript Files -->
        <!--  For some reason, this does not work :: <script type="text/javascript" src="../resources/js/dogsRUs.js"></script>-->
        <script type="text/javascript" src="dogsRUs.js"></script>
	
	   <title>Dogs 'R Us</title>
	</head>
    
	<body>
    </body>
</html>

<?php 
   include("dbConnect2.php");

   echo'<nav class="navbar navbar-default navbar-fixed-top">
            <div class="container"> 
                <div class="navbar-header page-scroll"> 
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand page-scroll" href="index.php"><img src="http://payload43.cargocollective.com/1/6/223650/3179096/Phoebe_DementiaDog_Icon.jpg" alt="logo"></a>
                </div>';

    //Display different functions based on whether someone is a user or a shelter
	$sql="SELECT COUNT(user_name) 
            FROM users 
            WHERE user_name='$user'";

    $sql2="SELECT COUNT(user_name) 
            FROM shelters 
            WHERE user_name='$user'";

	$result=$conn->query($sql);
	$row=$result->fetch_assoc();

    $result2=$conn->query($sql2);
	$row2=$result2->fetch_assoc();

    if(isset($_SESSION) && ($_SESSION['user']!='')) {
         //User
       echo'<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="shelters.php">Shelter Reviews</a></li>
                    <li><a href="search.php">Search For Pets</a></li>';
        
        //Shelter
        if($row2['COUNT(user_name)'] > 0) {
             echo'<li><a href="AddPets.php">Add Pets</a></li>';
            }
        
        echo'</ul>
        </div>';
       }

    else {
        echo'<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="login.php">Log In</a></li>
                                <li><a href="register.php">Register</a></li>
                                <li><a href="shelters.php">Shelter Reviews</a></li>
                            </ul>
                        </div>';
        }

      echo'</div>
    </nav>';
?>

