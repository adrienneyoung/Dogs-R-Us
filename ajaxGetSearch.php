<?php
include("dbConnect.php");

$conn = get_connection();
$petType=test_input($_POST["petType"]);
$breed=test_input($_POST["breed"]);
$furColor=test_input($_POST["furColor"]);

$sql = "SELECT petId, pet_name, picturePath FROM petInfo where petType='$petType' and adopted='0'";

if($breed != "Any")
{
	$sql .= "and breed='$breed'";
}

if($furColor != "Any")
{
	$sql .= "and furColor='$furColor'";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
$returnVal = "<table style='border-collapse:separate;border-spacing:1em'";

    // output data of each row
    while($row = $result->fetch_assoc()) 
    {		
	$returnVal .= "<tr>";
  $returnVal .= "<td>".$row["pet_name"]."</td>";
	$returnVal .= "<td><a href=petdetails.php?petId=" .$row["petId"]. "><img src='".$row["picturePath"]."' width='200' height='200'></a></td>";
	$returnVal .= "</tr>";
    }
$returnVal .= "</table>";
}

else
{
  $returnVal = "Sorry, no pets found with those filters. Please try with different/fewer filters";
}

$conn->close();
echo $returnVal;
?>