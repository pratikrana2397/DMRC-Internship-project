<?php  
if(isset($_POST["submit"]))
	{
       $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       $query5="SELECT MAX(vehicleno) as vehicleno FROM vehicledata";
          $result5= mysqli_query($db, $query5);

     while ($row = mysqli_fetch_array($result5)) {
         $no=$row["vehicleno"];
      }
      $no=$no+1;
      
       $query='INSERT INTO `vehicledata`(`vehicleno`, `Type`, `Make`, `Model`) VALUES ("'.$no.'","'.$_POST["typename"].'","'.$_POST["makename"].'","'.$_POST["modelname"].'")';
       $result= mysqli_query($db, $query);
       header("location:vehicletable.php");
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
 <h1><u>Add Vehicle</u></h1><br><br>
 <form action="add1.php" method="post">
 <font size="5px">Type</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="typeid" name="typename"></textarea><br><br>
 <font size="5px">Make</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="makeid" name="makename"></textarea><br><br>
 <font size="5px">Model</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="modelid" name="modelname"></textarea><br><br>
 <button type="submit" name="submit"><font size="5px"> Save</font></button>
	</form>
</body>
</html>