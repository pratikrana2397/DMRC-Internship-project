<?php
require_once ('simple_html_dom.php');

$table = file_get_html('table.php');
echo "huhu";
foreach($table ->find('tr') as $tr){ // Foreach row in the table!
   $username = $tr->find('td', 0)->plaintext; // Find the first TD (starts with 0)
   $password= $tr->find('td', 1)->plaintext; // Find the second TD (which will be 1)
    echo "INSERT INTO users (id, username, password) VALUES (NULL, '$username', '$password') <br />"; // Do your insert query here!
} 
 ?>