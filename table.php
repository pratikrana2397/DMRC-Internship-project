
<!DOCTYPE html>
<html>
<head>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>	
</head>
<body>
<table id="table" border="1">
<tr>
<th>Username</th>
<th>Password</th>
</tr>
<tr>
<td>User_1</td>
<td>Password_1</td>
</tr>
<tr>
<td>User_2</td>
<td>Password_2</td>
</tr>
</table>
<button onclick="showme()">show</button>
<script type="text/javascript">
	$(document).ready(function() {
	$("#table").append("<tr><td>User_1</td><td>Password_1</td></tr>");
	//include('showtable.php');
    });
    function showme()
    {
   var table = document.getElementById("table");
for (var i = 0, row; row = table.rows[i]; i++) {
   //iterate through rows
   //rows would be accessed using the "row" variable assigned in the for loop
   for (var j = 0, col; col = row.cells[j]; j++) {
     //iterate through columns
     //columns would be accessed using the "col" variable assigned in the for loop
     console.log(col.innerHTML);
   } 
   } 
}
</script>
</body>
</html>