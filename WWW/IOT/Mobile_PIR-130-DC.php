<?php
header("Content-Type:text/html; charset=utf-8");
header('refresh: 10;url="/Mobile_PIR-130-DC.php"');
?>
<html>
<head>
<link rel="stylesheet" href="/css/button-cr.css">
<title>192.168.198.13</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
		if(isMobile())
		{
			
		}
		else
		{
			location.href= ('/IOT/index.php');
		}
</script>
<script>
	var data;		
	   $.get("PIR-130-DC-per.php",function(data){
			data=parseInt(data);
			//document.write(data);
			$('#user-image').css('display','block');
			if(data==1)
			{	
				$('#user-image').css('display','none');
				$('#user-image-r').css('display','block');
			}
			else
			{
				$('#user-image-r').css('display','none');
				$('#user-image').css('display','block');
			}
		})
</script>
</head>

<body bgcolor="#000000">
	<h2 align="center" style="font-size:1.5cm; color: #ffffff;">PIR-130-DC</h2>
	<!--<div class="fa fa-user-circle-o  w3-white" style="font-size:500px;position:relative; left:center;top: 25%;left: 25%;" id='user-image'></div>-->
	<img src="/fa-user-circle-o.png"style="height:500px; width: 500px;position:absolute;top:300px;left:25%;display:none"id='user-image'></a>
	<img src="/fa-user-circle-o-r.png"style="height:500px; width: 500px;position:absolute;top:300px;left:25%;display:none"id='user-image-r'></a>
	<a href="/Mobile_LC-221.php" class="w3-button"  style="width:25%;  position: fixed;bottom:0px;right: 0px;"><img src="/next.png"style="height: 200px; width: 200px;"></a>
	<a href="/Mobile_F_L.php" class="w3-button"  style="width:25%; position: fixed;bottom:0px;"><img src="/back.png"style="height: 200px; width: 200px;"></a>
</body>
</html>