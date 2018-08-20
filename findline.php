
<?php
$db = mysqli_connect('localhost', 'root', '', 'internship');

$query='SELECT DISTINCT line FROM stationinfo' ;
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
    echo '<option  value="' . $row['line'] .'">' . $row['line'] .'</option>';

}

?>