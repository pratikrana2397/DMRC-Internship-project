<!DOCTYPE html>
<html>
<head>
	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<title></title>
</head>
<body>
<script type="text/javascript">
	$(document).ready(function() {
        $file = 'fileimage.jpg';
      
      //indicate the path and name for the new resized file
      $resizedFile = 'resizedFile.png';
      
      //call the function (when passing path to pic)
      smart_resize_image($file , null, SET_YOUR_WIDTH , SET_YOUR_HIGHT , false , $resizedFile , false , false ,100 );
      //call the function (when passing pic as string)
      
	});
</script>
</body>
</html>