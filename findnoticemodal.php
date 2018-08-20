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
     $theftstatus=$row['theftstatus'];
     $theftdata=$row['theftdata'];
     $noticestatus=$row['noticestatus'];
}

session_start(); 
 $_SESSION['no2']=$q;
if($noticestatus=="no")
{  
	echo '<font style="color:blue"size="6">OWNER NOTICE NOT SENT</font><br><br>';
	
}
else if($noticestatus=="yes")
{
   echo '<font style="color:green"size="6">OWNER NOTICE SENT</font><br><br>';
   
}
if($status=="MATCHED"||$status=="MATCHED*"||$status=="Theft"||$status=="OK")
{
  echo '<button onClick="window.open(\'ownerreport0.php\');">Print Owner Report</button><br><br>';
  if($noticestatus=="no")
  {  
  echo 'Notice Sent?';
  echo '<select><option>Nothing</option><option>Yes</option><option>No</option></select><br><br>';
  echo 'Upload Signed Notice<input type="file">';
  echo 'Remarks<textarea></textarea>';
  }
  
} 
else
{
  echo 'Vehicle Status Should be in MATCHED OR THEFT OR OK in order to print owner notice';
} 

?>