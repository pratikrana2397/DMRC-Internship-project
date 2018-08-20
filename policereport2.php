<?php
session_start();
//$_SESSION["sendername"]="";

  $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
  $query="SELECT * FROM data ORDER BY No";
  $result= mysqli_query($db, $query);
  $tablerows="";
  $p=1;
       while ($row=mysqli_fetch_array($result)) {
       	$tablerows.= '<tr >
       	     <td   style="font-size:15px; font-family:"Times New Roman", Times, serif;" align="center">'.$p.'</td>
       	     <td  class="noclass" onclick="viewfun(this)" style="font-size:15px; cursor: pointer; font-family:"Times New Roman", Times, serif;" align="center"><a
             >'.$row["No"].'</a></td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Station"].'</td>
       	     
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Reg.No."].'</td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Type"].'</td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Make"].'</td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Model"].'</td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["color"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["EngineNo"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["ChassisNo"].'</td>
       	     
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.date("d-m-Y", strtotime($row["ParkedSince"])).'</td>
       	     	
       	     </tr>';
       	     $p=$p+1;
       }
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		td, th {
    border: 2px solid black;
}
table {
    border-collapse: collapse;
    page-break-before: always;
}
	</style>
	<title></title>
</head>
<body>
	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<font size="4" face="Arial" style="font-family: "calibri", Garamond, 'Comic Sans MS';">No. DMRC/O&M/Ops/Parking Cell/48 hrs/ <?php echo date("m/Y");?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Date: <?php echo date("d.m.Y");?><br><br>
To,<br><br>
<b><?php echo $_SESSION["receivername"];?>,</b><br>
<?php echo $_SESSION["receiveraddress"];?><br><br>
<b>Sub:<?php echo $_SESSION["subjectofletter"];?>.</b><br><br>
Sir,<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["bodyofletter"];?><br>
<br><br><br><br><br><br><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<?php echo $_SESSION["sendername"];?>)<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $_SESSION["senderdesignation"];?><br><br><br>
Copy to,<br><br>
<?php echo $_SESSION["dmrccopyto"];?><br>

<?php echo $_SESSION["policecopyto"];?>
</font>

<br><br><br><br><br>
<b><hr size="3" color=black ></b>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font  size="5">Metro Bhawan,Fire Brigade Lane,Barakhamba Road,New Delhi-110001</font>


<table  id="table"   style="font-size: 14px;border-color:black;border-style: solid;">
	<tr>
	<td colspan="11">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Details of vehicles parked for more than 48 hours in various metro stations parking lots as on <?php echo date("d.m.Y");?>.</b></td>
    </tr>
	<tr>
		<th rowspan="2" style="width: 5px">SI.No.</th>
		<th rowspan="2" style="width: 5px">Vehicle ID.No.</th>
		<th rowspan="2" style="width: 50px">Station Name</th>
		<th rowspan="2" style="width: 10px">Vehicle Registration Number</th>
		<th rowspan="2" style="width: 10px">Type of vehicle(CAR/BIKE/Scooter/AUTO/}</th>
		<th rowspan="2" style="width: 10px">Vehicle Make(eg.MARUTI,BAJAJ,HYUNDAI etc)</th>
		<th rowspan="2" styl5e="width: 10px">Vehicle Model(eg.WagonR,Pulsar,i10 etc)</th>
		<th rowspan="2" style="width: 10px">Color of Vehicle</th>
		<th colspan="2" style="width: 10px">Chassis/Engine no.(if the vehicle's registration no. not available.)</th>
		<th rowspan="2" style="width: 10px">Vehicle Parked Since(Date)</th>
	</tr>
	<tr>
		<th>Chassis Number</th>
		<th>Engine no</th>
	</tr>
	<?php echo $tablerows;?>
</table>
</body>
</html>