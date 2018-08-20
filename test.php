<!DOCTYPE html>
<html>
<head>
	<title></title>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
   <select id="source" name="source">
     <option>MANUAL</option>
     <option>ONLINE</option> </select>



<select id="status" name="status">
    <option>OPEN</option>
      <option>DELIVERED</option>
    </select>
<script type="text/javascript">
	$(document).ready(function() {

  $("#source").change(function() {

    var el = $(this) ;

    if(el.val() === "ONLINE" ) {
    $("#status").append("<option>SHIPPED</option>");
    }
      else if(el.val() === "MANUAL" ) {
        $("#status option:last-child").remove() ; }
  });

});
</script>
</body>
</html>