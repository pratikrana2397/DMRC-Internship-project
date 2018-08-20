
<?php

$q = $_GET['q'];
$content = http_build_query (array (
'ctl00$ContentPlaceHolder1$txtRegistration' => $q,
'ctl00$ContentPlaceHolder1$ddVehTypeName'=>'287-5',
));
 
$context = stream_context_create (array (
'http' => array (
	'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
'method' => 'POST',
'content' => $content,
)
));
 
$data=file_get_contents('http://164.100.44.112/vahansamanvay/PoliceEnquiry.aspx', null, $context);
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