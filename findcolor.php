
<?php
$db = mysqli_connect('localhost', 'root', '', 'dmrc_park');

$query = "SELECT * FROM color";
$result= mysqli_query($db, $query);


while ($row = mysqli_fetch_array($result)) {
    echo '<option style="background-color:'.$row['colorname'].'" value="' . $row['colorname'] .'">' . $row['colorname'] .'</option>';

}

?>