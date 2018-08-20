<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="StyleSheet" href="truesoft.css" type="text/css"> 
<link rel="stylesheet" type="text/css" href="css/style1.css" />
<body>
<label>RegNo</label><input type="text" name="regno" id="regnoid"><br>
<button onclick="zipfun()">press</button>
<div id="box"></div>
</body>
<script type="text/javascript">
	function zipfun() {

   
   
        if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	console.log("haha");
                document.getElementById("box").innerHTML = this.responseText;
              
            }
        };
        var str=$("#regnoid").val();
        xmlhttp.open("GET","zipnet3help.php?q="+str,true);
        xmlhttp.send();
    }

</script>
</html>