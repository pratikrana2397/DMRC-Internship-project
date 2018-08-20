<?php
$db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
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
     $theftdata=$row['theftdata'];
}
echo base64_decode($theftdata);
?>