<!DOCTYPE html>
<html>
	<title>T_H_sensing</title>
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
		.sensor_show{
			
			
			position:absolute;
			top:20px;
			left:800px; 
			
		}
		#data_show{
			
			position:absolute;
			top:100px;
			left:750px;
		}
		.chart{
			
			position:absolute;
			top:200px;
			left:150px;
	
		}
			
		#hu{
		
			position:absolute;
			left:420px;
			top:350px;
			
			
	}
		#chartContainer{
			
			position:absolute;
			left:420px;
			
		}
		
		#settle_btn{
			
			
			position:absolute;
			top:20px;
			left:200px;
		}
		
    </style>
</head>

<body class="w3-grey">
  
 <div>
 
 	<button onclick="set_data();" id="settle_btn">數據設置</button> 
 </div>
<nav class="commentcolor w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

  <a href="/index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-grey  w3-hover-text-light-gray">
    <i class="fa fa-home w3-xxlarge"></i>
    <p>HOME</p>
  </a>
  <a href="/T_H_sensing.php" class="w3-bar-item w3-button w3-padding-large w3-grey w3-hover-text-light-gray">
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

 
<div id="chartContainer" style="height: 300px; width: 50%;"></div>
<!--濕度-->
<script>
window.onload = function () {
var dps = []; // dataPoints

        var instance = (new Date()).getTime();
		var data;		
		function send(){
	
           $.get("dy_chart.php",function(data){
			  	data_temp=parseFloat(data);
				
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

            var updateInterval = 3000;
            var maxDataLength = 10; 
            var time = new Date();
            var updateCount = 0;
            var updateChart = function (count) {
                count = count || 1;
				send();
                for (var j = 0; j < count; j++) {
                    time.setSeconds(time.getSeconds() +2);
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
            // generates first set of dataPoints
            updateChart(maxDataLength);
            // update chart after specified time.
            setInterval(function () { updateChart();}, updateInterval);
}
</script>
<div id="hu" style="height: 300px; width: 50%;"></div>
<script type="text/javascript" > //溫度


var dataPoints = [];
var newDataCount = 10;
var xValue = 0;
var yValue = 0;
var data_temp;
var Permission = Notification.permission;
console.log(Permission);
 
var options = {
	 
	backgroundColor: "#C0C0C0",
	theme: "Temp_data",
	title: {
		text: "溫度數據"
	},
	data: [{
		type: "line",
		dataPoints: dataPoints
		//markerSize: 11,
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
            var updateInterval = 3000;
            var maxDataLength = 10; 
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

            // generates first set of dataPoints
            updateChart(maxDataLength);

            // update chart after specified time.
            setInterval(function () { updateChart();}, updateInterval);
			

</script>



<script>//推播
var permission = Notification.permission;
var notification;
console.log(permission);
var img="favicon-20200108020759719.ico";
        console.log(permission);
        var title = "IOT_Data!!";
        options = {

            body: "Tempature is higher than 33",
            icon:img
            
        };
function set_data(){
	
		alert("數據設置完畢!!溫度數據為34度");
		
		Data=34.0;
		check_data(Data);
	
		}

function notifyMe() {

            if (!("Notification" in window)) {
                alert("這瀏覽器不支援Web Notification");
            }
            else if (Notification.permission === "granted") {

                var notification = new Notification(title, options);

            }
            else if (Notification.permission !== "denied") {

                Notification.requestPermission(function (permission) {

                    if (permission === "granted") {
                        var notification = new Notification(title, options);
                    }
                });
            }
        }

		function check_permission(permission){
			
		if (permission === "denied") {

            console.log("permissiom is denied");
            notifyMe();
			
        }
		
		
        else {

            console.log("permissiom is granted");
        }

			
			
		}
        
       
         function check_data(get_data){
			
			if (get_data > 33.0) {
				data=get_data;
            var notification = new Notification(title, options);
            notification.onshow = function () {

                var _this = this;
                setTimeout(_this.close.bind(this), 9000);

            }

            notification.onclose = function () {

                console.log("close!!");
             
            }
            notification.onclick = function (event) {
                event.preventDefault(); // prevent the browser from focusing the Notification's tab
                alert("click");
            }
        }
			 
	}

</script>
  
  

  
  
  

</div> 
</body>
</html>
