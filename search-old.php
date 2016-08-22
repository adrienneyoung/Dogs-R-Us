<?php
    include ("header.php");
    session_start();
   $user=$_SESSION['user'];

   if(isset($_SESSION) && ($_SESSION['user']!='')) {
		echo "<br><br><h4 style='text-align:center;'>Hello, " . $_SESSION['user'] . "</h4>";
}

else {
echo "<br><br><br><h4 style='text-align:center;'>Please log in or register</h4>";
}

if(isset($_SESSION) && ($_SESSION['user']!='')) {

?>



<html>
  
<head>
    <title>DogsRUs Search</title>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <script type="text/javascript">
      function searchQuery()
      {
        var petType = document.getElementById("petType").value;
        var breed = document.getElementById("breed").value;
        var furColor = document.getElementById("furColor").value;
        
        var queryString = 'petType=' +petType+ '&breed=' +breed+ '&furColor=' +furColor;
        $.ajax
        ({
          type: "POST",
          url: "ajaxGetSearch.php",
          data: queryString,
          cache: false,
          success: function(data)
          {
            if(data)
            {
                document.getElementById("div2").innerHTML = data;
            }        
          }
        });
        
      }
    </script>
      
  </head>
  <body>

    <div id="div1" style="width:25%;position:absolute;top:30%;left:5%">

    <h1><b> Search for Pets </b></h1> 

      <table style="border-collapse:separate;border-spacing:1em">
        <tr>
          <td>Pet Type</td>
          <td>
            <select id="petType">
		<option value="cat">Cat</option>
		<option value="dog">Dog</option>
		<option value="alpaca">Alpaca</option>	    
	    </select>
          </td>
        </tr>
        <tr>
          <td>Fur Color</td>
          <td>
            <select id="furColor">
		<option value="brown">Brown</option>	
		<option value="black">Black</option>
		<option value="golden">Golden</option>
		<option value="white">White</option>
		<option value="blue">Blue</option>
	    </select>
          </td>
        </tr>
        <tr>
          <td>Breed</td>
          <td>
            <input type="text" id="breed"></input>
          </td>
        </tr>
        <tr>
          <td rowspan="2">
            <input type="button" style="width:100px" value="Search" onclick="searchQuery()"></input>
          </td>
        </tr>
      </table>

	<h3><b><a href="index.php">Go Back</a></b></h3>

    </div>
    <div id="div2" style="width:65%;position:absolute;top:20%;left:40%">
      
    </div>
  </body>
</html>