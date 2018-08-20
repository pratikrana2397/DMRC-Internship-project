<?php
session_start(); 
  if (isset($_POST['hiddensubmit'])) {
     $_SESSION['contractorno'] =  $_POST['uniqueno'];
     
    header("location: edit2.php");
  }
  if (isset($_POST['hiddensubmit2'])) {
     
    $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 $query='DELETE FROM `stationinfo` WHERE `stationuniqueno`="'.$_POST["uniqueno2"].'"';
  $result= mysqli_query($db, $query);
    
  }
?>
<?php 
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 $query="SELECT * FROM stationinfo";
  $result= mysqli_query($db, $query);
       $code="";
       $p=1;
   while ($row=mysqli_fetch_array($result)) {
   		$code.= '<tr >
   		     
       	     <td   class="noclass" style="font-size:15px; font-family:"Times New Roman", Times, serif;" align="center">'.$row["stationuniqueno"].'</td>
       	     
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["line"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["station"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["Stationcode"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["contractor"].'</td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["contractorinfo"].'</td>
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center"><button class="editclass" ><i class="fa fa-edit"></i></button class="removeclass">&nbsp;&nbsp;&nbsp;<button class="removeclass"><i class="fa fa-trash"></i></button></td>
       	     </tr>';
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta charset="utf-8">
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
 	</style>
 </head>
 <body>
 	
<table id="table" style="border-color: black; border-width: 3px;" class="table table-striped table-advance table-hover tablesorter”">
                              <thead >
                              <tr style="border-color:  black;background-color: #4c4c4c; color: #fff; font-size: 15px ; border-width: 3px;" >
                              	
                              	  <th style="border-color: black; border-width: 3px;background-color: black;width: 1%;"    >#</th>
                              	 
                                  <th style="border-color: black; border-width: 3px;background-color: lightpink;width: 15%;"    >line</th>
                                  
                                  <th style="border-color: black; border-width: 3px; background-color: lightblue;width: 15%;"   height='30'>Station</th>
                                  <th style="border-color: orange; border-width: 3px; background-color: orange;width: 15%; "  >Stationcode</th>
                                  <th style="border-color: lightgreen; border-width: 3px; background-color: lightgreen;width: 15%; "  >Contractor Name</th>
                                  <th style="border-color: grey; border-width: 3px; background-color: grey;width: 25%; "  >Contractor Info</th>
                                  <th style="border-color: royalblue; border-width: 3px; background-color: royalblue;width: 25%; "  >Actions</th>
                              </tr>

                             

                              </thead>
                              <tbody id="tablebody">

                              <?php echo $code ?>
                             
                              </tbody>
                          </table>
 
 <button class ="btn btn-primary" onclick="window.location.href='add2.php'">Add New Contractor</button>
 
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
 <form action="stationtable.php" method="POST">
   <input id="uniquenum" type="text" name="uniqueno">
   <button id="submitbut" type="submit" name="hiddensubmit"></button>
 </form>
 <form action="stationtable.php" method="POST">
   <input id="uniquenum2" type="text" name="uniqueno2">
   <button id="submitbut2" type="submit" name="hiddensubmit2"></button>
 </form>
</div>
 <script type="text/javascript">
   $(document).ready(function() {
   /* $(".editclass").click(function() {
      console.log("edit button pressesd");
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum').val($text);
    // Let's test it out
   // $('#submitbut').trigger('click');
});*/
    $('body').on('click', '.editclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum').val($text);
    // Let's test it out
    $('#submitbut').trigger('click');
   });

    $('body').on('click', '.removeclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum2').val($text);
      document.getElementById('removevehicleno').innerHTML=$text;
     $('#removebutid').trigger('click');
    // Let's test it out
    //$('#submitbut2').trigger('click');
   });

    /*$(".removeclass").click(function() {
    var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum2').val($text);
     document.getElementById('removevehicleno').innerHTML=$text;
     $('#removebutid').trigger('click');
    // Let's test it out
   // $('#submitbut2').trigger('click');
});*/
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