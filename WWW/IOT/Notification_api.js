<script>

        
        var permission = Notification.permission;
        var notification;
        var img="iot.jpg";
        console.log(permission);
        var title = "IOT_Data!!";
        options = {

            body: "Temp_Data",
            icon:img
            
        };



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
        
       
         function check_data(var get_data){
			
			if (get_data > 32.0) {
            var notification = new Notification(title, options);
            notification.onshow = function () {

                var _this = this;
                setTimeout(_this.close.bind(this), 5000);

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