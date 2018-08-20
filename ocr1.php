<!DOCTYPE html>
<html>
<head>
	<script src='https://cdn.rawgit.com/naptha/tesseract.js/1.0.10/dist/tesseract.js'></script>
	<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<title></title>
</head>
<body>
<input type="text" id="url"  />
<input type="button" id="go_button" value="Run" />
<div id="ocr_results"> </div>
<div id="ocr_status"> </div>
</body>
<script type="text/javascript">
	$( document ).ready(function() {
   
});
	 document.getElementById("go_button")
        .addEventListener("click", function(e) {
        	console.log('im clicked');
            var url = document.getElementById("url").value;
            runOCR(url);
        });
	function runOCR(url) {
		Tesseract.recognize(url, {
    lang: 'eng',
   // tessedit_pageseg_mode: '7',
})
.then(function(result) {
            document.getElementById("ocr_results")
                    .innerText = result.text;
         })
.then(function(result){
    console.log(result)
});
    /*Tesseract.recognize(url)
         .then(function(result) {
            document.getElementById("ocr_results")
                    .innerText = result.text;
         }).progress(function(result) {
            document.getElementById("ocr_status")
                    .innerText = result["status"] + " (" +
                        (result["progress"] * 100) + "%)";
        });
        */
}
</script>
</html>