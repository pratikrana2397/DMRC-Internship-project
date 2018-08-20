<?php
$db = mysqli_connect('localhost', 'root', '', 'internship');
$q = $_GET['q'];

$query='SELECT * FROM data where No="'.$q. '"';
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
	 $regno=$row['Reg.No.'];
     $engineno=$row['EngineNo'];
     $chassino=$row['ChassisNo'];
     $type=$row["Type"];
     $make=$row["Make"];
     $model=$row["Model"];
     $color=$row['color'];
     $status=$row['Status'];
     $station=$row['Station'];
     $nameplatephoto=$row["CarNameplatePhoto"];
     $frontphoto=$row["CarFrontPhoto"];
     $backphoto=$row["CarBackPhoto"];
     $leftphoto=$row["CarLeftPhoto"];
     $rightphoto=$row["CarRightPhoto"];
     $contractor=$row["Contractor"];
     $ownername=$row["online_ownername"];
     $matchregno=$row['match_regno'];
     $matchengineno=$row['match_engineno'];
     $matchchassino=$row['match_chassisno'];
     $matchtype=$row["match_type"];
     $matchmake=$row["match_make"];
     $matchmodel=$row["match_model"];
     $matchcolor=$row['match_color'];
     $matchremarks=$row['match_remarks'];
}
if($ownername=="")
{  
	echo "<h1><u>NOT FOUND</u></h1><br><br>";
	echo '<strong><font size="3px">We could not identify the vehicle by the given details <br><br>';
	echo "Recheck all the data and enter engineno and chassino if already not given <br><br>";
	echo "*You are allowed to open the vehicle</font></strong>";
}
else
{
   if($matchregno==0|| $matchengineno==0||$matchchassino==0||$matchtype==0||$matchmake==0||$matchmodel==0||$matchcolor==0)
   {
   	echo "<h1><u>RECHECK</u></h1><br>";
	echo '<strong><font size="3px"><u>The following parameters didnt match with online database  </u><br><br>';
	if($matchregno==0)
	{
		echo '*Registration Number <br>';
	}
	if($matchengineno==0)
	{
		echo '*Engine Number <br>';
	}
	if($matchchassino==0)
	{
		echo '*Chassis Number <br>';
	}
	if($matchtype==0)
	{
		echo '*Type <br>';
	}
	if($matchmake==0)
	{
		echo '*Make <br>';
	}
	if($matchmodel==0)
	{
		echo '*Model <br>';
	}
	if($matchcolor==0)
	{
		echo '*Color <br>';
	}
	
   }
   echo "<br>";
   if($matchremarks!="")
   echo '<br>Remarks:  '.$matchremarks.'<br><br>';

   echo "Recheck all the data and enter engineno and chassino if already not given <br><br>";
   echo "*You are allowed to open the vehicle</font></strong>";
}

?>