<?php
    include ("header.php");
    session_start();
    $user=$_SESSION['user'];

   if(isset($_SESSION) && ($_SESSION['user']!='')) {

    $cquery1="SELECT DISTINCT petType from petInfo";
    $result1 = $conn->query($cquery1);
    
    $cquery2="SELECT DISTINCT furColor from petInfo";
    $result2 = $conn->query($cquery2);
    
    $cquery3="SELECT DISTINCT breed from petInfo";
    $result3 = $conn->query($cquery3);

echo " <script src='js/jquery-2.1.4.min.js'></script>
    <script src='js/jquery-ui-1.11.4.custom/jquery-ui.min.js'></script>
    <script type='text/javascript'>
      function searchQuery()
      {
        var petType = document.getElementById('petType').value;
        var breed = document.getElementById('breed').value;
        var furColor = document.getElementById('furColor').value;
        
        var queryString = 'petType=' +petType+ '&breed=' +breed+ '&furColor=' +furColor;
        $.ajax
        ({
          type: 'POST',
          url: 'ajaxGetSearch.php',
          data: queryString,
          cache: false,
          success: function(data)
          {
            if(data)
            {
                document.getElementById('div2').innerHTML = data;
            }        
          }
        });
        
      }
    </script>";

echo " <div id='div1' style='width:25%;position:absolute;top:30%;left:5%'>

    <h1><b> Search for Pets </b></h1> 

      <table style='border-collapse:separate;border-spacing:1em'>
        <tr>
          <td>Pet Type</td>
          <td>
            <select id='petType'>";
            while($row1 = $result1->fetch_assoc()) 
            {
	          echo "<option value='" . $row1['petType'] . "'>" . $row1['petType'] . "</option>";
            }
 echo "	    
	    </select>
          </td>
        </tr>
        <tr>
          <td>Fur Color</td>
          <td>
            <select id='furColor'> <option value='Any'>Any</option>";
            while($row2 = $result2->fetch_assoc()) 
            {
	          echo "<option value='" . $row2['furColor'] . "'>" . $row2['furColor'] . "</option>";
            }
 echo "	
	    </select>
          </td>
        </tr>
        <tr>
          <td>Breed</td>
          <td>
            <select id='breed'> <option value='Any'>Any</option>";
            while($row3 = $result3->fetch_assoc()) 
            {
	          echo "<option value='" . $row3['breed'] . "'>" . $row3['breed'] . "</option>";
            }
 echo "	
	    </select>
          </td>
        </tr>
        <tr>
          <td rowspan='2'>
            <input type='button' style='width:100px' value='Search' onclick='searchQuery()'></input>
          </td>
        </tr>
      </table>

	<h3><b><a href='index.php'>Go Back</a></b></h3>

    </div>
    <div id='div2' style='width:65%;position:absolute;top:20%;left:40%'>
      
    </div>";
    }
    
    else 
    {
    echo "<br><br><br><h4 style='text-align:center;'>Please log in or register</h4>";
    }
?>