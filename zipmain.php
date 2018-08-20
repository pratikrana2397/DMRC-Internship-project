<?php
$imgstr="";
if(isset($_POST['img_val']))
{
	$imgstr='<img src="'.$_POST['img_val'].'" style="height:600px;width:500px;"/>';

//Get the base-64 string from data

}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    html, body { height: 100%; width: 100%; margin: 0; }
	#zipimagebox
	{
		
		border-color: :black;
	    border-style: solid;
	}
</style>
<body>
<form action="zipdummy.php" method="post" target="zipdummy">
	<label>Regno</label><input type="text" name="regno"><br>
	<button type="submit" name="zipsubmit">submit</button>
</form>
<br>
<div class="row">
	 <div class="col-md-4 col-lg-3 G">
            <div class="row h-100">
              <div id="zipimagebox" class="col-lg-3  h-50">
	            <?php echo $imgstr ?>
             </div>
         </div>
     </div>
 </div>
</div>
<button>Save</button>
</body>
</html>