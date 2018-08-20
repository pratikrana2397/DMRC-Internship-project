<?php
error_reporting(0);
$content = http_build_query (array (
'rg_no' => 'DL2CV8335',

));
 
$context = stream_context_create (array (
'http' => array (
'method' => 'POST',
'content' => $content,
)
));
 
$data=file_get_contents('http://zipnet.in/index.php?page=stolen_vehicles_search&criteria=search', null, $context);
echo $data; 
//echo file_get_contents("http://www.google.com");


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="html2canvas.min.js"></script>
</head>
<body >
<button onclick="capture()">press me</button>



</body>
<script type="text/javascript">
	function capture() {
        
        	html2canvas(document.body).then(canvas =>{
           
                
               document.body.appendChild(canvas);
            
        });
    }
</script>

</html>