<?php  
if(isset($_POST["submit"]))
	{
       $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       
      
       $query='INSERT INTO `stationtable`(`line`, `stationname`, `stationcode`) VALUES ("'.$_POST["linename"].'","'.$_POST["stationname"].'","'.$_POST["stationcodename"].'")';
       $result= mysqli_query($db, $query);
       header("location:stationtable.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.container {
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border: 4px solid black;
    box-sizing: border-box;
    margin: 100px;
    background-color: #E8F8F5;

}
	</style>
</head>
<body>
	
<div class="container">
 <h1><u>Add Station</u></h1><br><br>
 <form action="add3.php" method="post">
 <font size="5px">Line</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="lineid" name="linename"></textarea><br><br>
 <font size="5px">StationName</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="stationnameid" name="stationname"></textarea><br><br>
 <font size="5px">StationCode</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="stationcodeid" name="stationcodename"></textarea><br><br>
 <button type="submit" name="submit"><font size="5px"> Save</font></button>
	</form>
</body>
</html>