<?php
header("Content-Type:text/html; charset=utf-8");
?>
<html>
<head>
<link rel="stylesheet" href="/IOT/css/button-cr.css">
<title>192.168.198.13</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/css/button-cr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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

<div id="chartContainer" style="height: 200px; width: 100%;"></div>
<!--濕度-->
 <script>
window.onload = function () {
var dps = []; // dataPoints
        var instance = (new Date()).getTime();
		var data;
		var temp;		
		function send(){
           $.get("dy_chart.php",function(data){
			  	data_temp=parseFloat(data);
				if((isNaN(data_temp)))
				{
					data_temp = temp;
				}
				else
				{
					temp = data_temp;
				}
            })
        }
            var chart = new CanvasJS.Chart("chartContainer", {
				
				backgroundColor: "#C0C0C0",
                title: {
                    text: "濕度數據"
                },
                axisX: {
                    title: "Interval of Time",
                    valueFormatString: "hh:mm:ss"
                },
                axisY: {
                    title: "Range of Data",
                },
                data: [{
                    type: "spline",
                    xValueType: "dateTime",
                    dataPoints: dps
                }]
            });

            var updateInterval = 1000;
            var maxDataLength = 6; 
            var time = new Date();
            var updateCount = 0;
            var updateChart = function (count) {
                count = count || 1;
				send();
                for (var j = 0; j < count; j++) {
                    time.setSeconds(time.getSeconds() +1);
                    dps.push({
                        x: time.getTime(),
                        y: data_temp
                    });
					
                    updateCount++;

                    if (dps.length > maxDataLength) {
                        dps.shift();
                    }
                }
                chart.render();
            };
            updateChart(maxDataLength);
            setInterval(function () { updateChart();}, updateInterval);
}
</script>
<br>
<div id="hu" style="height: 200px; width: 100%;"></div>
<script type="text/javascript" > //溫度
var dataPoints = [];
var xValue = 0;
var yValue = 0;
var data_temp;

var options = {
	 
	backgroundColor: "#C0C0C0",
	theme: "Temp_data",
	title: {
		text: "溫度數據"
	},
	data: [{
		type: "line",
		dataPoints: dataPoints
	}],
	axisX:{
		intervalType: "second",
		interval:3
	},
	axisY:{		
		title:'溫度數據範圍'
	}
};
var dps = []; // dataPoints
        var instance = (new Date()).getTime();
		var data;
		function send(){
           $.get("dy_temp_chart.php",function(temp){
			  	data=parseFloat(temp);
				if((isNaN(data)))
				{
					data = temp1;
				}
				else
				{
					temp1 = data;
				}
            })
        }
            var chart = new CanvasJS.Chart("hu", {
				
				backgroundColor: "#C0C0C0",
                title: {
                    text: "溫度數據"
                },
                axisX: {
                    title: "Interval of Time",
                    valueFormatString: "hh:mm:ss"
                },

                axisY: {
                    title: "Range of Data",
                },
                data: [{
                    type: "spline",
                    xValueType: "dateTime",
                    dataPoints: dps
                }]
            });
            var updateInterval = 2000;
            var maxDataLength = 6; 
            var time = new Date();
            var updateCount = 0;
            var updateChart = function (count) {
                count = count || 1;
				send();
                for (var j = 0; j < count; j++) {
                    time.setSeconds(time.getSeconds() +2);
                    dps.push({
                        x: time.getTime(),
                        y: data	
                    });
					
                    updateCount++;

                    if (dps.length > maxDataLength) {
                        dps.shift();
                    }
                }
                chart.render();
            };
            updateChart(maxDataLength);
            setInterval(function () { updateChart();}, updateInterval);
</script>


	<a href="/Mobile.php" class="w3-button"  style="width:25%; position: fixed;bottom:0px;"><img src="/back.png"style="height: 80px; width: 80px;"></a>
	<a href="/Mobile_PIR-130-DC.php" class="w3-button"  style="width:25%;  position: fixed;bottom:0px;right: 0px;"><img src="/next.png"style="height: 80px; width: 80px;"></a>
</body>
</html>