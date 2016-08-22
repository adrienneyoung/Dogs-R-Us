<?php 
    include ("header.php");
    session_start();
    $user=$_SESSION['user'];
    
  if(isset($_SESSION) && ($_SESSION['user']!='')) 
  {
    $petId=$_GET['petId'];
    $_SESSION['petId']=$petId;
        
    $sql = "SELECT pet_name, dob, picturePath, pet_description, vaccination, vaccinationDate, shelter_name, shelter_description FROM petInfo join shelterInfo using (shelterId) where petId='$petId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
    $row = $result->fetch_assoc();  
    echo "<div id='div1' style='width:100%;position:absolute;top:20%;left:5%'>
          <h1> Here's " .$row["pet_name"]. "!</h1> 
          <img src='".$row["picturePath"]."' width='200' height='200'>
          <br>
          <h2> More about <b>" .$row["pet_name"]. "</b> </h2>
          <h3> " .$row["pet_description"]. " </h3>
          <br>
          <br>
          <h4> " .$row["pet_name"]. " was born on " .$row["dob"]. ". The last vaccine given was for " .$row["vaccination"]. " on " .$row["vaccinationDate"]. "</h4>
          <br>
          <h4> " .$row["pet_name"]. " is now at " .$row["shelter_name"]. " and needs a new home!</h4>
          <br>
          <h3> More about " .$row["shelter_name"]. "</h3>
          <h4> " .$row["shelter_description"]. "</h4>
          <br>
          <h1><a href=adopt.php> Adopt " .$row["pet_name"]. " Now!</a> or <a href=search.php>Go Back to Search</a> </h1> ";
    }
  }
    
    else
    {
    echo "<br><br><h4 style='text-align:center;'>Please log in or register</h4>";
    }
?>