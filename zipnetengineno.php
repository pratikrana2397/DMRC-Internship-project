
<?php

$q = $_GET['q'];
$content = http_build_query (array (
'engine_number' => $q,

));
 
$context = stream_context_create (array (
'http' => array (
	'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
'method' => 'POST',
'content' => $content,
)
));
 
$data=file_get_contents('http://zipnet.in/index.php?page=stolen_vehicles_search&criteria=search', null, $context);
echo $data;
/*
$tables = $doc->getElementsByTagName('table');
foreach($tables as $table) {
    // Loop through the DIVs looking for one withan id of "content"
    // Then echo out its contents (pardon the pun)
    if ($table->getAttribute('id') === 'AutoNumber1') {
         echo $table;
    }
}
*/

?>