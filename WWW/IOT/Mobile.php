<?php
header("Content-Type:text/html; charset=utf-8");
require_once dirname(__FILE__) . '/Phpmodbus/ModbusMasterUdp.php';
$data_true = array(TRUE);
$data_false = array(FALSE);
try 
{
	$modbus = new ModbusMasterUdp("192.168.198.175");
	if(isset($_POST['on'])) 
	{
        $modbus->writeSingleCoil(2, 00001, $data_true);
    }
    if(isset($_POST['off'])) 
	{
        $modbus->writeSingleCoil(2, 00001, $data_false);
    }
	if(isset($_POST['fun_on'])) 
	{
        $modbus->writeSingleCoil(2, 00000, $data_true);
    }
    if(isset($_POST['fun_off'])) 
	{
        $modbus->writeSingleCoil(2, 00000, $data_false);
    }
}
catch (Exception $e) {
    // Print error information if any
    //echo $modbus;
    //echo $e;
    //exit;
}
?>
<html>
<head>
<link rel="stylesheet" href="/css/button-cr.css">
<title>192.168.198.13</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
		function isMobile() {
		try{document.createEvent("TouchEvent");return true; }
		catch(e){ return false;}
		}
		if(isMobile())
		{
			
		}
		else
		{
			location.href= ('/index.php');
		}
</script>
</head>

<body bgcolor="#000000">
<form action="Mobile.php" method="post">
		<h2 align="center" style="font-size:1.2cm; color: #ffffff;">電燈開關</h2>
		<input type="submit" style="width: 400px;height: 400px;background-color: #ffffff;border-radius:50%;font-size:1.5cm;" name="on" value="ON" />
		<input type="submit" style="width: 400px;height: 400px;background-color: #ffffff;border-radius:50%;font-size:1.5cm;position:absolute; right:0px;" name="off" value="OFF" />
		<h2 align="center" style="font-size:1.2cm; color: #ffffff;">風扇開關</h2>
		<input type="submit" style="width: 400px;height: 400px;background-color: #ffffff;border-radius:50%;font-size:1.5cm;" name="fun_on" value="ON" />
		<input type="submit" style="width: 400px;height: 400px;background-color: #ffffff;border-radius:50%;font-size:1.5cm;position:absolute; right:0px;" name="fun_off" value="OFF" />
		<br>

		<!--<div style="position:relative; margin:auto; width:90%">
				  <span style="position:absolute; color:red; border:3px solid blue; min-width:20px;font-size:1.2cm;">
					<span id="myValue"></span>
					</span>
					<input type="range" id="myRange" max="100" min="0" style="width:100%" name="Range"> 
		</div> 
	  <script type="text/javascript" charset="utf-8">
		var myRange = document.querySelector('#myRange');
		var myValue = document.querySelector('#myValue');
		var myUnits = 'myUnits';
		var off = myRange.offsetWidth / (parseInt(myRange.max) - parseInt(myRange.min));
		var px =  ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetParent.offsetWidth / 2);

		  myValue.parentElement.style.left = px + 'px';
		  myValue.parentElement.style.top = myRange.offsetHeight + 'px';
		  myValue.innerHTML = myRange.value;

		  myRange.oninput =function(){
			let px = ((myRange.valueAsNumber - parseInt(myRange.min)) * off) - (myValue.offsetWidth / 2);
			myValue.innerHTML = myRange.value;
			myValue.parentElement.style.left = px + 'px';
			var temp = (myRange.value*100);
			console.log(temp);
			$.ajax(
			{
				url:"text.php",
				data:{"temp":temp},method:"POST"  
			});
			
		  };
		 </script>-->
		
</form>
	<a href="/Mobile_F_L.php" class="w3-button"  style="width:25%;  position: fixed;bottom:0px;right: 0px;"><img src="/next.png"style="height: 200px; width: 200px;"></a>

</body>
</html>