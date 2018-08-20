
<?php
$db = mysqli_connect('localhost', 'root', '', 'internship');
$q = $_GET['q'];
$query='SELECT DISTINCT Model FROM vehicleData where Make="'.$q. '"';
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['Model'] .'">' . $row['Model'] .'</option>';

}

?>