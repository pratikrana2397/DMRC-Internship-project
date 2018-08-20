
<?php
$db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
$q = $_GET['q'];
$query='SELECT DISTINCT Make FROM vehicleData where Type="'.$q. '"';
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['Make'] .'">' . $row['Make'] .'</option>';

}

?>