<?php
session_start(); 
 if (isset($_POST['submit'])) {
     //echo $_POST["dummytext"];
     $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 
  $result= mysqli_multi_query($db, $_POST["dummytext"]);
  sleep(2);
    header("location: stationtable.php");
  }
  if (isset($_POST['hiddensubmit'])) {
     $_SESSION['stationno'] =  $_POST['uniqueno'];
     
    header("location: edit3.php");
  }
  if (isset($_POST['hiddensubmit2'])) {
     
    $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 $query='DELETE FROM `stationtable` WHERE `stationcode`="'.$_POST["uniqueno2"].'"';
  $result= mysqli_query($db, $query);
    
  }
?>
<?php 
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 $query="SELECT * FROM stationtable ORDER BY line";
  $result= mysqli_query($db, $query);
       $code="";
       $p=1;
   while ($row=mysqli_fetch_array($result)) {
   		$code.= '<tr >
   		     
       	    
       	     
       	     <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["line"].'</td>
             <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["stationname"].'</td>
             <td  class="noclass" style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center">'.$row["stationcode"].'</td>
             
       	    
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
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.7.7/xlsx.core.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xls/0.7.4-a/xls.core.min.js"></script>
  <link rel="shortcut icon" href="../res/dmrclogo.jpg"/>
 	<style type="text/css">
 		
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
a:hover { 
    color: white;
    text-decoration: none;
}
a
{
  color:black;
}
 	</style>
 </head>
 <body>
 	 <nav class="navbar navbar-default" >
  
  <div class="container-fluid" style="background-color:#0099ff;">
    
    <div class="navbar-header" style="height:50px;margin-bottom: 10px;">
      
      <a  href="profile.php" style="font-size: 20px;"> <b> Delhi Metro Rail Corporation </b></a> <a href="#" > <img src="dmrc.png" height="56" width="56"></a>
    </div>
       
    <ul class="nav navbar-nav navbar-right" style="font-size: 20px">
      
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='parktable.php'">Home</a></li>
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='usertable.php'">User</a></li>
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='stationtable.php'">Station</a></li>
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='contractortable.php'">Contractor</a></li>
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='vehicletable.php'">Vehicle</a></li>
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='dashboard.php'"><?php echo $_SESSION['stationid']?></a></li>
    <li><a  style="cursor:pointer;color:white;"  onclick="window.location.href='dashboard.php?logout'">logout</a></li>
    </ul>

      </div>
  
</nav>
<div class="form-group row">

<div class="col-lg-1 col-xs-1" >
  <button class ="btn btn-primary" id="importbut">Upload Excel</button>
</div>
</div>


<input style="display:none" type="file" id="excelfile" />

<form  style="display:none;" action="stationtable.php" method="post">
  <input type="text" name="dummytext" id="dummytext">
  <button type="submit" name="submit" id="submit">submit</button>
</form>
<table id="table" style="border-color: black; border-width: 3px;" class="table table-striped table-advance table-hover tablesorter”">
                              <thead >
                              <tr style="border-color:  black;background-color: #4c4c4c; color: #fff; font-size: 15px ; border-width: 3px;" >
                              	
                              	  
                              	 
                                  <th style="border-color: black; border-width: 3px;background-color: lightpink;width: 15%;"    >line</th>
                                  
                                  <th style="border-color: black; border-width: 3px; background-color: lightblue;width: 15%;"   height='30'>Station</th>
                                  <th style="border-color: black; border-width: 3px; background-color: orange;width: 15%; "  >Stationcode</th>
                                  
                                 

                             

                              </thead>
                              <tbody id="tablebody">

                              <?php echo $code ?>
                             
                              </tbody>
                          </table>
 
 
 
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
          <p>You sure want to delete station code-><label id="removevehicleno"></label>?</p>
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
$('#excelfile').attr('title', '');

        $('#importbut').click(function () {
    $("#excelfile").trigger('click');
});
    $("#excelfile").change(function(){
         //submit the form here
         ExportToTable();
 });
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
 	var d = new Date();
  var myStr = d.toString();
        var newStr = myStr.replace(/:/g, "꞉");
  $('#table').DataTable(
      {
        //searching:false
        dom: 'Bfrtip',
        buttons: [
             {
                extend: 'excel',"className": 'btn btn-primary',"text":'Download Excel',

 filename:'StationTable '+newStr, 
 title:'',
            },
            
        ]

      });
 	 
 	 
 	 function removedatafun2()
 	 {
 	 	 
 	 	$('#submitbut2').trigger('click');
 	 }
   function ExportToTable() {  
     var regex = /^([a-zA-Z0-9()꞉\s_\\.\-:])+(.xlsx|.xls)$/;
     /*Checks whether the file is a valid excel file*/  
     if (regex.test($("#excelfile").val().toLowerCase())) {  
         var xlsxflag = false; /*Flag for checking whether excel is .xls format or .xlsx format*/  
         if ($("#excelfile").val().toLowerCase().indexOf(".xlsx") > 0) {  
             xlsxflag = true;  
         }  
         /*Checks whether the browser supports HTML5*/  
         if (typeof (FileReader) != "undefined") {  
             var reader = new FileReader();  
             reader.onload = function (e) {  
                 var data = e.target.result;  
                 /*Converts the excel data in to object*/  
                 if (xlsxflag) {  
                     var workbook = XLSX.read(data, { type: 'binary' });  
                 }  
                 else {  
                     var workbook = XLS.read(data, { type: 'binary' });  
                 }  
                 /*Gets all the sheetnames of excel in to a variable*/  
                 var sheet_name_list = workbook.SheetNames;  
  
                 var cnt = 0; /*This is used for restricting the script to consider only first sheet of excel*/  
                 sheet_name_list.forEach(function (y) { /*Iterate through all sheets*/  
                     /*Convert the cell value to Json*/  
                     if (xlsxflag) {  
                         var exceljson = XLSX.utils.sheet_to_json(workbook.Sheets[y]);  
                     }  
                     else {  
                         var exceljson = XLS.utils.sheet_to_row_object_array(workbook.Sheets[y]);  
                     }  
                     if (exceljson.length > 0 && cnt == 0) {  
                         BindTable(exceljson, '#exceltable');  
                         cnt++;  
                     }  
                 });  
               //  $('#exceltable').show();  
             }  
             if (xlsxflag) {/*If excel file is .xlsx extension than creates a Array Buffer from excel*/  
                 reader.readAsArrayBuffer($("#excelfile")[0].files[0]);  
             }  
             else {  
                 reader.readAsBinaryString($("#excelfile")[0].files[0]);  
             }  
         }  
         else {  
             alert("Sorry! Your browser does not support HTML5!");  
         }  
     }  
     else {  
         alert("Please upload a valid Excel file!");  
     }  
 }  
$str='DELETE FROM `stationtable` WHERE 1;INSERT INTO `stationtable`(`line`, `stationname`, `stationcode`) VALUES';
 function BindTable(jsondata, tableid) {/*Function used to convert the JSON array to Html Table*/  
     var columns = BindTableHeader(jsondata, tableid); /*Gets all the column headings of Excel*/  
     for (var i = 0; i < jsondata.length; i++) {  
         var row$ = $('<tr/>');
         $str+='(';  
         for (var colIndex = 0; colIndex < columns.length; colIndex++) {  
             var cellValue = jsondata[i][columns[colIndex]];  
             if (cellValue == null)  
                 cellValue = "";
                 if(colIndex==0)
                 $str+='"';
                 else
                 $str+=',"';
                 $str+=cellValue;
                 $str+='"';  
             row$.append($('<td/>').html(cellValue));  
         } 
         if(i!=jsondata.length-1) 
         $str+='),';
         else
         $str+=');';
         $(tableid).append(row$);  
     }  
    $('#dummytext').val($str);
    $('#submit').trigger('click');
 }  
 function BindTableHeader(jsondata, tableid) {/*Function used to get all column names from JSON and bind the html table header*/  
     var columnSet = [];  
     var headerTr$ = $('<tr/>');  
     for (var i = 0; i < jsondata.length; i++) {  
         var rowHash = jsondata[i];  
         for (var key in rowHash) {  
             if (rowHash.hasOwnProperty(key)) {  
                 if ($.inArray(key, columnSet) == -1) {/*Adding each unique column names to a variable array*/  
                     columnSet.push(key);  
                     headerTr$.append($('<th/>').html(key));  
                 }  
             }  
         }  
     }  
     $(tableid).append(headerTr$);  
     return columnSet;  
 }  
 </script>
 </body>
 </html>