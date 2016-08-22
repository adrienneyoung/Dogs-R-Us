<?php
include("dbConnect.php");

$conn = get_connection();
$petId = test_input($_POST["petId"]);
$shelterId = test_input($_POST["shelterId"]);
$user_name = test_input($_POST["user_name"]);
$deliveryDate = date("Y-m-d", strtotime($_POST["deliveryDate"]));
$deliveryTime = date('H:i:s', strtotime($_POST["deliveryTime"]));
$deliveryAddress = test_input($_POST["deliveryAddress"]);
$fosterPeriod = test_input($_POST["fosterPeriod"]);

$sql = "INSERT INTO adoption (petId, shelterId, user_name, delivery_date, delivery_time, delivery_address, foster_period) VALUES ('$petId', '$shelterId', '$user_name', '$deliveryDate', '$deliveryTime', '$deliveryAddress', '$fosterPeriod')";

if ($conn->query($sql) === TRUE) 
{
    echo "<h2> Great news! You have confirmed your adoption at " .$deliveryTime. " on " .$deliveryDate. "!<br><b><a href='index.php'>Home</a></b></h2>";
} 

else 
{
    echo "Error in insertion";
}

$conn->close();
?>