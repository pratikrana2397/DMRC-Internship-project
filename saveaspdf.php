<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<button onclick="savePageAsPDF()">Save Page As PDF</button>
<button onclick="window.print();return false;">Print</button>
<script type="text/javascript"> 
function savePageAsPDF() { 
   var pURL = "http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=" + "https://www.google.com/";
  window.open(pURL, "PDFOnline", "scrollbars=yes, resizable=yes,width=640, height=480,menubar,toolbar,location");
}
</script>
</body>
</html>