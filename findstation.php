
<?php
$db = mysqli_connect('localhost', 'root', '', 'internship');
$q = $_GET['q'];
echo $q;
$query='SELECT DISTINCT station FROM stationinfo where line="'.$q. '"';
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
    echo '<option value="' . $row['station'] .'">' . $row['station'] .'</option>';

}

?>