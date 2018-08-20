<?php
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 session_start(); 
$no=$_SESSION['vehicleno'];
 $query='SELECT * FROM vehicledata WHERE vehicleno="'.$no.'"';
 $result= mysqli_query($db, $query);
 while ($row = mysqli_fetch_array($result)) {
         $no=$row["vehicleno"];
         $type=$row["Type"];
         $make=$row["Make"];
         $model=$row["Model"];
      }

if(isset($_POST["submit2"]))
	{
      
       
      $query='UPDATE `vehicledata` SET `Type`="'.$_POST["typename"].'",`Make`="'.$_POST["makename"].'",`Model`="'.$_POST["modelname"].'" WHERE `vehicleno`="'.$no.'"';
      echo $query;
      
       $result= mysqli_query($db, $query);
      header("location: vehicletable.php");
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
 <h1><u>Edit Vehicle no</u>-> <?php echo $no ?></h1><br><br>
 <form action="add1-2.php" method="post">
 <font size="5px">Type</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="typeid" name="typename" ><?php echo $type ?></textarea><br><br>
 <font size="5px">Make</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="makeid" name="makename"><?php echo $make ?></textarea><br><br>
 <font size="5px">Model</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="modelid" name="modelname"><?php echo $model ?></textarea><br><br>
 <button type="submit" name="submit2"><font size="5px"> Save</font></button>
	</form>
</body>
</html>