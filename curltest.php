<?php

function file_get_contents_curl($url) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);       
    
    $data = curl_exec($ch);
    if ($data === false) $data = curl_error($ch);
    curl_close($ch);

    return $data;
}
$data=file_get_contents_curl("https://www.google.com/");
echo $data;
?>