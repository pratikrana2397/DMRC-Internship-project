<?php  
if(isset($_POST["submit"]))
	{
       $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       
      
       $query='INSERT INTO `users`(`stationid`, `password`) VALUES ("'.$_POST["stationid"].'","'.$_POST["password"].'")';
       $result= mysqli_query($db, $query);
       header("location:usertable.php");
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
 <h1><u>Add User</u></h1><br><br>
 <form action="add4.php" method="post">
 <font size="5px">StationID</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="stationid" name="stationid"></textarea><br><br>
 <font size="5px">Password</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="passwordid" name="password"></textarea><br><br>
 <br><br>
 <button type="submit" name="submit"><font size="5px"> Save</font></button>
	</form>
</body>
</html>