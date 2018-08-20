
<?php
$db = mysqli_connect('localhost', 'root', '', 'internship');

$query='SELECT DISTINCT Type FROM vehicleData' ;
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['Type'] .'">' . $row['Type'] .'</option>';

}

?>