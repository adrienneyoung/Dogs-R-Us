<!-- Adrienne Young -->

<?php
    session_start();
    $user=$_SESSION['user'];
	include ("header.php");

    if(isset($_SESSION) && ($_SESSION['user']!='')) {
		echo "<br><br><br><h4 style='text-align:center;'>Welcome back, " . $_SESSION['user'] . "</h4>";
	}
	else {
		echo "<br><br><br><h4 style='text-align:center;'>Please log in or register</h4>";
	}	
	$query="SELECT * FROM  `petInfo`
                WHERE adopted = 0
    		ORDER BY petId DESC
    		LIMIT 3 ;";

?>
	
<div class="container">
	<div id="introJumbo" class = "jumbotron">
		<div class = "page-header">
			<!-- WHY ARE YOU ALL OPAQUE. DONT YOU DISAPPEAR ON ME UPDATE. It has been fixed.-->
			<img src="http://i.imgur.com/iggnrjj.png">
			<h1><strong>Find your new best friend!</strong></h1>
			<h2><strong>Our delivery service will bring animals to you.</strong></h2>
		</div>
	</div>

<!-- HOW IS THIS NOT OPAQUE AND THE OTHER ONE IS -->
	<div id = "howItWorks" class = "jumbotron">
		<div class ="row">
			<div class="col-md-8 col-lg-8">
				<h2><strong>How It Works</strong></h2>
				<ol>
					<strong>
					<h4><li>Search for pets with the filters you like</li></h4>
					<h4><li>Go through the catalog and find a pet</li></h4>
					<h4><li>Confirm that you want the pet and fill out information.</li></h4>
					<h4><li>For rentals, you may choose the length of your trial. (Max set by adoption center)</li></h4>
					<h4><li>(Optional!) Find other pets (max amount depends on type of pet) and have them delivered as well!</li></h4>
					<h4><li>Wait 1-3 business days as we deliver the pet and supplies to you</li></h4>
					<h4><li>Have fun with your new best friend!</li></h4>			
					</strong>
				</ol>
			</div>
			<div class = "col-md-4 col-lg-4">
				<img src="http://imgfave-herokuapp-com.global.ssl.fastly.net/image_cache/1382395306827202.jpg">			
			</div>
		</div>
	</div>
</div>
<?php 	

$result = $conn->query($query);
echo '<div id = "layout"><h2> Recently Put Up For Adoption </h2><div class="row">';
while($row = $result->fetch_assoc()) {
	echo'<div class= "col-md-4 col-lg-4" >';
	echo "<img src='" . $row['picturePath'] . "'><h4>" . $row['pet_name'] . "</h4><p>" . $row['pet_description'] . "</p>";	
	echo '</div>';
}	
echo'</div></div>';
?>


	