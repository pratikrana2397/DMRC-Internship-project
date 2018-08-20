<?php
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 session_start(); 
$no=$_SESSION['stationno'];
 $query='SELECT * FROM stationtable WHERE stationcode="'.$no.'"';
 $result= mysqli_query($db, $query);
 while ($row = mysqli_fetch_array($result)) {
        
         $line=$row["line"];
         $stationname=$row["stationname"];
         $stationcode=$row["stationcode"];
      }  
if(isset($_POST["submit"]))
	{
       $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       
      
       $query='UPDATE `stationtable` SET `line`="'.$_POST["linename"].'",`stationname`="'.$_POST["stationname"].'" WHERE `stationcode`="'.$no.'"';
       //echo $query;
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
 <h1><u>Edit Station Code</u>-> <?php echo $no ?></h1><br><br>
 <form action="edit3.php" method="post">
 <font size="5px">Line</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="lineid" name="linename"><?php echo $line ?></textarea><br><br>
 <font size="5px">StationName</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="stationnameid" name="stationname"><?php echo $stationname ?></textarea><br><br>
 <br><br>
 <button type="submit" name="submit"><font size="5px"> Save</font></button>
	</form>
</body>
</html>