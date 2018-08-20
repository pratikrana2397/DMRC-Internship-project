<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="jspdf.min.js"></script>
</head>
<body>
<a href="javascript:genPDF()">Download PDF</a>
<script type="text/javascript">
	function genPDF() {
	
	var doc = new jsPDF();
	
	doc.text(20,20,'TEST Message!!');
	doc.addPage();
	doc.text(20,20,'TEST Page 2!');
	doc.save('Test.pdf');
	
}
</script>
</body>
</html>