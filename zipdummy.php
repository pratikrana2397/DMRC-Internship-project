<?php
error_reporting(0);

if(isset($_POST["zipsubmit"]))
{
	$regno=$_POST["regno"];
}
$content = http_build_query (array (
'rg_no' => $regno,

));
 
$context = stream_context_create (array (
'http' => array (
'method' => 'POST',
'content' => $content,
)
));
 
$data=file_get_contents('http://zipnet.in/index.php?page=stolen_vehicles_search&criteria=search', null, $context);
echo $data;
$doc = new DOMDocument();
$doc->loadHtml($data);

$tables = $doc->query("//*[@id='AutoNumber1']");
$requiredTable = ''; // This will html of tables
foreach ($tables as $table) {
    $requiredTable .=  $doc->saveXML($table);
}
echo $requiredTable;
//echo file_get_contents("http://www.google.com");


?>


	



<form method="POST" style="display:none"enctype="multipart/form-data" action="zipmain.php" target="zipmain" id="myForm">
    <input type="hidden" name="img_val" id="img_val" value="" />
    <button type="submit" id="submitback" name="submitback"></button>
</form>


 <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="html2canvas.js"></script>
<script type="text/javascript" src="html2canvas.min.js"></script>
<script type="text/javascript">
	$( document ).ready(function() {
    capture();
});
	function capture() {
        
        	html2canvas(document.querySelector("#AutoNumber1")).then(canvas =>{
            document.body.appendChild(canvas);
                 $('#img_val').val(canvas.toDataURL("image/png"));
            //Submit the form manually
            document.getElementById("myForm").submit();
              
            
        });
    }
</script>


