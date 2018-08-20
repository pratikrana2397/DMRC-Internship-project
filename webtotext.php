<?php
if(isset($_POST["submit"]))
{
	$str=$_POST["webcopy"];
	
	
	$p=strpos($str, 'Registration No:');
	$l=strlen('Registration No:');
	$p=$p+$l+1;
    $ans='';
    for($i=$p;$str[$i]!="\t";$i=$i+1)
    {
     $ans=$ans.$str[$i];
    }
   echo $ans;
   echo " ";
	$p=strpos($str, 'Vehicle Class:');
	$l=strlen('Vehicle Class:');
	$p=$p+$l+1;
    $ans='';
    for($i=$p;$str[$i]!="\t";$i=$i+1)
    {
     $ans=$ans.$str[$i];
    }
   echo $ans;
    echo " ";
	$p=strpos($str, 'Color:');
	$l=strlen('Color:');
	$p=$p+$l+1;
    $ans='';
    for($i=$p;$str[$i]!="\t";$i=$i+1)
    {
     $ans=$ans.$str[$i];
    }
   echo $ans;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="webtotext.php" method="post">
<input type="text" name="webcopy"><br>
<button type="submit" name="submit">Submit</button>
</form>
</body>
</html>