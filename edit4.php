<?php
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 session_start(); 
$no=$_SESSION['stationno'];
 $query='SELECT * FROM users WHERE stationid="'.$no.'"';
 $result= mysqli_query($db, $query);
 while ($row = mysqli_fetch_array($result)) {
        
         $password=$row["password"];
         
      } 
        
if(isset($_POST["submit"]))
	{
       $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       
      
       $query='UPDATE `users` SET `password`="'.$_POST["password"].'" WHERE `stationid`="'.$no.'"';
       //echo $query;
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
 <h1><u>Edit User Credentials</u>-> <?php echo $no ?></h1><br><br>
 <form action="edit4.php" method="post">

 <font size="5px">Password</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="passwordid" name="password"><?php echo $password; ?></textarea><br><br>
 <br><br>
 <button type="submit" name="submit"><font size="5px"> Save</font></button>
	</form>
</body>
</html>