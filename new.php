<?php
    $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       $code='';
    $result= mysqli_query($db, "select * from users");
    $hello=mysqli_fetch_assoc($result);
    while($row = mysql_fetch_array($result)) {
echo $row['username'];
}  
?>


