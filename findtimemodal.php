<?php
$db = mysqli_connect('localhost', 'root', '', 'internship');
$q = $_GET['q'];

$query='SELECT * FROM data where No="'.$q. '"';
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
	 $parkedsince=$row["ParkedSince"];
}
echo "Vehicle is Parked Since:";
echo $parkedsince;
echo "<br><br>";
echo "No of Days Passed:";
$date1=date_create($parkedsince);
$date2=date_create(date("d-m-Y"));
$diff=date_diff($date1,$date2);
echo $diff->format("%a days");
?>