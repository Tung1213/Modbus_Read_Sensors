<?php
require_once dirname(__FILE__) . '/Phpmodbus/ModbusMasterUdp.php';
//dirname(__FILE__);得到的是檔案所在層目錄名 	
$data_true = array(TRUE);
$data_false = array(FALSE);
try 
{
	$modbus = new ModbusMasterUdp("192.168.198.175");
	if(isset($_POST['on'])) 
	{
        $modbus->writeSingleCoil(2, 00001, $data_true);
    }
    if(isset($_POST['off'])) {
        $modbus->writeSingleCoil(2, 00001, $data_false);
    }
	if(isset($_POST['fun_on'])) 
	{
        $modbus->writeSingleCoil(2, 00000, $data_true);
    }
    if(isset($_POST['fun_off'])) {
        $modbus->writeSingleCoil(2, 00000, $data_false);
    }
	if(isset($_POST["value"])) {
        $modbus->writeSingleCoil(2, 00001, $data_true);
    }
	if(isset($_POST["value1"]))
	{
		$modbus->writeSingleCoil(2, 00001, $data_false);
	}
}
catch (Exception $e) {
    // Print error information if any
    //echo $modbus;
    //echo $e;
    //exit;
}
?>
<!DOCTYPE html>
<html>
	<title>LC-103</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="/css/Montserrat.css">
	<link rel="stylesheet" href="/css/onoffswitch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
		function myFunction() {
		  // Get the checkbox
		  var checkBox = document.getElementById("on_off");
		  var value = "";
		  var value1 = "";
		  if (checkBox.checked == true)
		  {
			$.ajax({
				data: 'value=' +"on"+'value1=' +"",
				url: 'F_L _control.php',
				method: 'POST', 
			});
		  } else 
		  {
			$.ajax({
				data: 'value1=' +"on"+'value=' +"",
				url: 'F_L _control.php',
				method: 'POST', 
			});
		  }
		  
		}

	</script>
    <style>
		.commentcolor{color:green}
        body, h1, h2, h3, h4, h5, h6 {
            font-family: "Montserrat", sans-serif;
        }
        .w3-row-padding img {
            margin-bottom: 12px;
        }
        .w3-sidebar {
            width: 120px;
            background: #63E55E;
        }
        #main {
            margin-left: 120px;
        }
        @media only screen and (max-width: 600px) {
            #main {
                margin-left: 0;
            }
        }
		
    </style>
</head>

<body class="w3-grey">
   <script>
	
	
	
   
   
   
   
   
	
	</script>
<nav class="commentcolor w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

  <a href="/index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey  w3-hover-text-light-gray">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="/T_H_sensing.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey w3-hover-text-light-gray">
    <i class="fa fa-tint w3-xxlarge"></i>
    <p>DL-100</p>
  </a>
  <a href="/F_L _control.php" class="w3-bar-item w3-button w3-padding-large w3-grey w3-hover-text-light-gray">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>LC-103</p>
  </a>
  <a href="/PIR-130-DC.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey w3-hover-text-light-gray">
    <i class="fa fa-user-circle-o w3-xxlarge"></i>
    <p>PIR-130-DC</p>
  </a>
    <a href="/LC-221.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey w3-hover-text-light-gray">
    <i class="fa fa-lightbulb-o w3-xxlarge"></i>
    <p>LC-221</p>
  </a>
</nav>

<!-- Navbar on small screens (Hidden on medium and large screens) -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class=" w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#" class="w3-bar-item w3-button"  style="width:25% !important">HOME</a>
    <a href="#about" class="w3-bar-item w3-button"  style="width:25% !important">F_L_control</a>
	
    <a href="#photos" class="w3-bar-item w3-button"  style="width:25% !important">T_H_sensing</a>
    <a href="#contact" class="w3-bar-item w3-button"  style="width:25% !important">CONTACT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-grey " id="home"> 
  <h1 class="w3-jumbo"><span class="w3-hide-small"></span>LC-103(照明控制模組) </h1>
	<form action="F_L _control.php" method="post">
	
		電燈開關:<input type="submit" name="on" value="on">
				 <input type="submit" name="off" value="off">
		<br>
		風扇開關:<input type="submit" name="fun_on" value="on">
		<input type="submit" name="fun_off" value="off">
			
		<!--	<div class="onoffswitch" >
				<input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox"  id="on_off" onclick="myFunction()">
					<label class="onoffswitch-label" for="on_off" >
						<div class="onoffswitch-inner"></div>
						<div class="onoffswitch-switch"></div>
					</label>
			</div>-->
			
	</form>	
  </header>
  <div class="w3-container w3-padding-32 w3-center w3-grey " id="about"> 
	
	</div>
	

  <div class="w3-padding-64 w3-content w3-text-black " id="photos">
  </div>
  
  <div class="w3-padding-64 w3-content w3-text-black " id="contact">
  </div>

</div> 
</body>
</html>
