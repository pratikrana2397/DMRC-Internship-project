<?php 
  session_start(); 
  if (!isset($_SESSION['stationid'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['stationid']);
    header("location: login.php");
  }
  if (isset($_POST['hiddensubmit'])) {
     $_SESSION['no'] =  $_POST['uniqueno'];
     $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 $query='SELECT * FROM data WHERE No="'.$_POST['uniqueno'].'"';
 $result= mysqli_query($db, $query);
$status='';
  while ($row=mysqli_fetch_array($result)) {
     $status=$row['Status'];
  }
  if($status=="Unchecked")
    header("location: status1.php");
  }

  if (isset($_POST['hiddensubmit2'])) {
    echo "tyuuu";
     $_SESSION['no2'] =  $_POST['uniqueno2'];
     header("location: view.php");
     }
?>
<?php 
       $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       $station1=$_SESSION['stationid'];
       $station2="";
       for($i=0;$station1[$i]!='\0';$i=$i+1)
       {
        
        if($station1[$i]=='@')
          break;
         $station2=$station2.$station1[$i];
       }
       if($station2=='admin')
       $query="SELECT * FROM data ORDER BY No DESC";
       else
       $query='SELECT * FROM data WHERE Station="'.$station2.'" ORDER BY No DESC';
          
       $result= mysqli_query($db, $query);
       $code="";
       $p=1;
       while ($row=mysqli_fetch_array($result)) {
        $code.= '<tr >
             <td   style="font-size:15px; font-family:"Times New Roman", Times, serif;" align="center">'.$p.'</td>
             <td  class="noclass" onclick="viewfun(this)" style="font-size:15px; cursor: pointer; font-family:"Times New Roman", Times, serif;" align="center"><a
             >'.$row["No"].'</a></td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Station"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Contractor"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["ParkedSince"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Reg.No."].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["EngineNo"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["ChassisNo"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Type"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Make"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Model"].'</td>
             
             <td align="center">'.'<img src="data:image/jpeg;base64,' . base64_encode($row['CarLeftPhoto']) . '" width="180" ></td>
             <td  class="statusclass" id="statusid" style="font-size:15px; cursor: pointer; font-family:"Times New Roman", Times, serif;"align="center"><a>'.$row["Status"].'</a></td>
             </tr>';
             $p=$p+1;
       }
   
?>
 
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.1/jquery.tablesorter.min.js"></script>
  <link href="http://mottie.github.io/tablesorter/css/theme.default.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
	<link rel="shortcut icon" href="../res/dmrclogo.jpg"/>
 	<style type="text/css">
 		#table
		{  overflow: scroll;
			position:absolute;
			top: 115px;
            left:20px;
		}
		#viewformhidden
    {
      display:none;
    }
    .header {
  overflow: hidden;
  background-color: royalblue;
  padding: 2px 2px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: royalblue;
  color: white;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  .header-right {
    float: none;
  }
}
 	</style>
 </head>
 <body>
 	<div class="header">
  <a href="#default" class="logo">DMRC Parking Portal</a>
  <div class="header-right">
  	<a  style="cursor:pointer" onclick="window.location.href='parktable.php'">Home</a>
    <a  style="cursor:pointer" onclick="window.location.href='usertable.php'">User</a>
    <a  style="cursor:pointer" onclick="window.location.href='stationtable.php'">Station</a>
    <a  style="cursor:pointer" onclick="window.location.href='contractortable.php'">Contractor</a>
    <a  style="cursor:pointer" onclick="window.location.href='vehicletable.php'">Vehicle</a>
    <a  style="cursor:pointer"><?php echo $_SESSION['stationid']?></a>
    <a  style="cursor:pointer" 	onclick="window.location.href='dashboard.php?logout'">logout</a>
    
  </div>
</div>
<table id="table" style="border-color: black; border-width: 3px;" class="table table-striped table-advance table-hover tablesorter”">
                              <thead >
                              <tr style="border-color:  black;background-color: #4c4c4c; color: #fff; font-size: 15px ; border-width: 3px;" >
                                  <th style="border-color: black; border-width: 3px;background-color: lightblue;"  style="width: 5%"  '>#</th>
                                  
                                  <th style="border-color: black; border-width: 3px; background-color: lightblue;"  height='40'>No.</th>
                                  <th style="border-color: orange; border-width: 3px; background-color: orange; "  >Station</th>
                                  <th width="7%" style="border-color: orange; border-width: 3px; background-color: orange; "  >Contractor</th>
                                  <th width="9%" style="border-color: orange; border-width: 3px; background-color: orange; "  >Parked Since</th>
                                  <th style="border-color: darkgreen; border-width: 3px; background-color: darkgreen; " >RegistrationNo</th>
                                  <th style="border-color: purple; border-width: 3px; background-color: purple; "  >Engine No</th>
                                  <th  style="border-color: purple; border-width: 3px; background-color: purple; " >Chassis No</th>
                                  <th width="7%" style="border-color: tan; border-width: 3px; background-color: tan; " >Type</th>
                                  
                                  <th width="7%" style="border-color: blue; border-width: 3px; background-color: blue; " >Company</th>
                                  
                                    <th style="border-color: blue; border-width: 3px; background-color: blue; " >Model</th>
                                  
                                  <th width="9%" style="border-color: pink; border-width: 3px; background-color: pink; "  >Car Image</th>
                                  <th width="9%" style="border-color: yellowgreen; border-width: 3px; background-color: yellowgreen; "  >Status</th>
                              </tr>

                             

                              </thead>
                              <tbody id="tablebody">

                              <?php echo $code ?>
                             
                              </tbody>
                          </table>
 <button class ="btn btn-primary" onclick="window.location.href='registration.php'">Add new vehicle</button>
 
 <button type="button" id="removebutid" style="display: none;"class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Remove</button>
 
 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>You sure want to delete vehicle no-><label id="removevehicleno"></label>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="removedatafun2()" data-dismiss="modal">Yes</button>
          <button type="button" class="btn btn-default" data-dismiss="modal">no</button>
        </div>
      </div>
      
    </div>
</div>

  <div id="viewformhidden">
 <form action="parktable2.php" method="POST">
   <input id="uniquenum" type="text" name="uniqueno">
   <button id="submitbut" type="submit" name="hiddensubmit"></button>
 </form>
 <form action="parktable2.php" method="POST">
   <input id="uniquenum2" type="text" name="uniqueno2">
   <button id="submitbut2" type="submit" name="hiddensubmit2"></button>
 </form>
</div>
 <script type="text/javascript">
 	$(document).ready(function() {
    /*$(".editclass").click(function() {
    	console.log("editbutton clicked");	
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum').val($text);
    // Let's test it out
    $('#submitbut').trigger('click');
});
    $(".removeclass").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum2').val($text);
     document.getElementById('removevehicleno').innerHTML=$text;
     $('#removebutid').trigger('click');
    // Let's test it out
   // $('#submitbut2').trigger('click');
});*/
    $('body').on('click', '.statusclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum').val($text);
    // Let's test it out
    $('#submitbut').trigger('click');
   });

    $('body').on('click', '.noclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum2').val($text);
      document.getElementById('removevehicleno').innerHTML=$text;
    // $('#removebutid').trigger('click');
    // Let's test it out
    $('#submitbut2').trigger('click');
   });
   });
 	$('#table').DataTable(
      {
        //searching:false

      });
 	
 	 
 	 function removedatafun2()
 	 {
 	 	 
 	 	$('#submitbut2').trigger('click');
 	 }
 </script>
 </body>
 </html>