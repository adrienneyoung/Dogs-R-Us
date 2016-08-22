<?php 
    session_start();
    $user=$_SESSION['user'];
    include ("header.php");
    
  if(isset($_SESSION) && ($_SESSION['user']!='')) 
  {
    $petId = $_SESSION['petId'];
    $user_name = $_SESSION['user'];
    
    $sql = "SELECT pet_name, shelterId FROM petInfo where petId='$petId'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
      $row = $result->fetch_assoc(); 
      $petName = $row["pet_name"];
      $shelterId = $row["shelterId"];
    }
    
    echo "<script src='js/jquery-2.1.4.min.js'></script>
    <script src='js/jquery-ui-1.11.4.custom/jquery-ui.min.js'></script>
    <script type='text/javascript'>
    
      function adoptPet()
      {
		    var deliveryDate = document.getElementById('deliveryDate').value;
		    var deliveryTime = document.getElementById('deliveryTime').value;
        var deliveryAddress = document.getElementById('deliveryAddress').value;
        var fosterPeriod = document.getElementById('fosterPeriod').value;
        
        var insertString = 'petId=$petId&shelterId=$shelterId&user_name=$user_name&deliveryDate=' +deliveryDate+ '&deliveryTime=' +deliveryTime+ '&deliveryAddress=' +deliveryAddress+ '&fosterPeriod=' +fosterPeriod;
		
        $.ajax
        ({
          type: 'POST',
          url: 'ajaxAdoptPet.php',
          data: insertString,
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
    
    echo "<div id='divTemp' style='width:100%;position:absolute;top:20%;left:5%'>
          <h1> Adopt " .$petName. " now!</h1>          
          <br><br> ";
    
    echo "<div id='div1' style='width:100%;position:absolute;top:40%;left:15%'>
    <h1><b> Enter delivery information </b></h1>

      <table style='border-collapse:separate;border-spacing:1em'>
        <tr>
          <td>Delivery Date</td>
          <td>
            <input type='date' id='deliveryDate'></input> 
          </td>
        </tr>
        <tr>
          <td>Delivery Time</td>
          <td>
            <input type='time' id='deliveryTime'></input>
          </td>
        </tr>
        <tr>
          <td>Delivery Address</td>
          <td>
            <textarea rows='4' cols='50' type='text' id='deliveryAddress'></textarea>
          </td>
        </tr>
        <tr>
          <td>Foster Period</td>
          <td>
            <select id='fosterPeriod'>
              <option> 1 week </option>
              <option> 2 weeks </option>
              <option> 3 weeks </option>
              <option> 4 weeks </option>
            </select>  
          </td>
        </tr>
        <tr>
          <td rowspan='2'>
            <input type='button' style='width:200px' value='Adopt' onclick='adoptPet()'></input>
          </td>
        </tr>
        
        </div>
        <div id='div2' style='width:100%;position:absolute;top:90%;left:50%'>
      
        </div>";
  }
    
    else
    {
    echo "<br><br><h4 style='text-align:center;'>Please log in or register</h4>";
    }
?>