<?php
header("Content-Type:text/html; charset=utf-8");

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
			location.href= ('/index.php');
		}
</script>

</head>

<body bgcolor="#000000">
	<h2 align="center" style="font-size:1.5cm; color: #ffffff;">LC-221</h2>
  <form action="LC-221.php" method="post">
  <div style="position:relative; margin:auto; width:90%">
  <span style="position:absolute; color:red; border:1px solid blue; min-width:20px;font-size:1cm;">
	<span id="myValue"></span>
	</span>
	<div>
	<input type="range" id="myRange" max="100" min="0" style="width:100%;height:50px;" name="Range"> 
	</div>
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
	
	<a href="/Mobile_PIR-130-DC.php" class="w3-button"  style="width:25%; position: fixed;bottom:0px;"><img src="/back.png"style="height: 200px; width: 200px;"></a>
</body>
</html>