<?php
require_once dirname(__FILE__) . '/Phpmodbus/ModbusMaster.php';
$modbus = new ModbusMaster("192.168.198.175", "UDP");
if(isset($_POST['temp'])) //temp
	{
		$val1 = ($_POST['temp']);
		echo($val1);
		$data = array($val1);
		$dataTypes = array(1000);
		$modbus->writeSingleRegister(65, 0, $data, $dataTypes);
	}
?>
<!DOCTYPE html>
<html>
	<title>LC-221</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/w3.css">
    <link rel="stylesheet" href="/css/Montserrat.css">
	<link rel="stylesheet" href="/css/onoffswitch.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
	<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
	<script>
		function isMobile() {
		try{document.createEvent("TouchEvent");return true; }
		catch(e){ return false;}
		}
		if(isMobile()){location.href= ('/Mobile.php');}
		
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
   
<nav class="commentcolor w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

  <a href="/index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-text-light-gray">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="/T_H_sensing.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey w3-hover-text-light-gray">
    <i class="fa fa-tint w3-xxlarge"></i>
    <p>DL-100</p>
  </a>
  <a href="/F_L _control.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey w3-hover-text-light-gray">
    <i class="fa fa-eye w3-xxlarge"></i>
    <p>LC-103</p>
  </a>
  <a href="/PIR-130-DC.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey w3-hover-text-light-gray">
    <i class="fa fa-user-circle-o w3-xxlarge"></i>
    <p>PIR-130-DC</p>
  </a>
    <a href="/LC-221.php" class="w3-bar-item w3-button w3-padding-large w3-grey w3-hover-grey w3-hover-text-light-gray">
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
  <h1 class="w3-jumbo"><span class="w3-hide-small"></span>LC-221 </h1>
  <h5><span class="w3-hide-small"></span>(調光器)</h5>
  </header>
  <form action="LC-221.php" method="post">
  <div style="position:relative; margin:auto; width:90%" class="w3-center">
  <span style="position:relative; color:red; border:1px solid blue; min-width:10px;">
	<span id="myValue"></span>
	</span>
	<input type="range" id="myRange" max="100" min="0" style="width:50%" name="Range"> 
  </div> 
  <script type="text/javascript" charset="utf-8">
	var myRange = document.querySelector('#myRange');
	var myValue = document.querySelector('#myValue');
	var myUnits = 'myUnits';
	var off = myRange.offsetWidth / (parseInt(myRange.max) - parseInt(myRange.min));
	var px =  ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetParent.offsetWidth / 2);

	  myValue.parentElement.style.left = px + 'px';
	  myValue.parentElement.style.top = myRange.offsetHeight + 'px';
	  myValue.innerHTML = myRange.value ;

	  myRange.oninput =function(){
		let px = ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetWidth / 2);
		myValue.innerHTML = myRange.value ;
		myValue.parentElement.style.left = px + 'px';
		var temp = (myRange.value*100);
		console.log(temp);
		$.ajax(
		{
			url:"LC-221.php",
			data:{"temp":temp},method:"POST"  
		});
		
	  };
	  </script>
</form>
  <div class="w3-container w3-padding-32 w3-center w3-grey " id="about"> 
	</div>
	

  <div class="w3-padding-64 w3-content w3-text-black " id="photos">
  </div>
  
  <div class="w3-padding-64 w3-content w3-text-black " id="contact">	
  </div>

</div> 
</body>
</html>
