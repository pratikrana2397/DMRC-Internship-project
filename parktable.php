<?php

  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
   $user=current_user();

?>
<?php   
  if (isset($_POST['hiddensubmit'])) {
     $_SESSION['no2'] =  $_POST['uniqueno'];
     $db = mysqli_connect('localhost', 'root', '', 'internship');
 $query='SELECT * FROM data WHERE No="'.$_POST['uniqueno'].'"';
 $result= mysqli_query($db, $query);
$status='';
  while ($row=mysqli_fetch_array($result)) {
     $status=$row['Status'];
  }
  if($status=="Unchecked"||$status=="Unchecked(2)"||$status=="Unchecked(3)")
    header("location: status2.php");

  if($status=="MATCHED"||$status=="MATCHED*")
  {
    header("location:theftcheck.php");
  }
  }


  if (isset($_POST['hiddensubmit2'])) {
    echo "tyuuu";
     $_SESSION['no2'] =  $_POST['uniqueno2'];
     header("location: view2.php");
     }
     if (isset($_POST['hiddensubmit3'])) {
    echo "tyuuu";
     $_SESSION['no3'] =  $_POST['uniqueno3'];
     header("location: ownerreport00.php");
     }
     if (isset($_POST['hiddensubmit4'])) {
    echo "tyuuu";
     $_SESSION['no4'] =  $_POST['uniqueno4'];
     header("location: registrationedit2.php");
     }
?>
<?php 
       $db = mysqli_connect('localhost', 'root', '', 'internship');
       $theftcolor="";
       if($user['user_level']=='3')
       $query="SELECT * FROM data ORDER BY No DESC";
       else
       $query='SELECT * FROM data WHERE Station="'.'DSG'.'" ORDER BY No DESC';
       
       $result= mysqli_query($db, $query);
       $code="";
       $p=1;
       while ($row=mysqli_fetch_array($result)) {

        if($row["theftstatus"]=="dontknow")
        $theftcolor="#99ddff";
        if($row["theftstatus"]=="yes")
        $theftcolor="#ff6666";
        if($row["theftstatus"]=="no")
        $theftcolor="green";
        
        $timecolor="#99ddff";
        if($user['user_level']!="3")
        {
         $parkedsince=$row["ParkedSince"];
         $date1=date_create($parkedsince);
         $date2=date_create(date("d-m-Y"));
         $diff=date_diff($date1,$date2);
         $days= $diff->format("%a");
         
         
         if($days>"30")
         {
          $timecolor="yellow";
         }
         if($days>"90")
         {
          $timecolor="orange";
         }
         if($days>"180")
         {
          $timecolor="red";
         }
       }
        $code.= '<tr >
             <td   style="font-size:15px; font-family:"Times New Roman", Times, serif;" align="center">'.$p.'</td>
             <td  class="noclass"  style="font-size:15px; cursor: pointer; font-family:"Times New Roman", Times, serif;" align="center"><a
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
             
             <td class="photoclass" align="center">'.'<img class="photoclass2" src="data:image/jpeg;base64,' . base64_encode($row['CarLeftPhoto']) . '" width="180" ></td>

             <td  class="statusclass" id="statusid" style="font-size:15px; cursor: pointer; font-family:"Times New Roman", Times, serif;"align="center"><a>'.$row["Status"].'</a></td>
              <td  style="font-size:15px; font-family:"Times New Roman", Times, serif;"align="center"><button class="noticeclass" ><i class="fa fa-sticky-note-o" style="font-size:20px"></i></button>&nbsp;&nbsp;&nbsp;<button style="background-color:'.$timecolor.'"class="timeclass"><i class="fa fa-hourglass"style="font-size:20px"></i></button>&nbsp;&nbsp;&nbsp;<button style="background-color:'.$theftcolor.'"class="theftclass"><i class="fa fa-user-secret"style="font-size:20px"></i></button>&nbsp;&nbsp;&nbsp;<button class="removeclass"><i class="fa fa-close"style="font-size:20px"></i></button></td>
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
   
    
.navbar-n li a{
  
  color:red;
}
a:hover { 
    color: blue;
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
    <li><a  style="cursor:pointer;color:white;" id="usertablelinkid" onclick="window.location.href='usertable.php'">User</a></li>
    <li><a  style="cursor:pointer;color:white;" id="stationtablelinkid" onclick="window.location.href='stationtable.php'">Station</a></li>
    <li><a  style="cursor:pointer;color:white;" id="contractortablelinkid" onclick="window.location.href='contractortable.php'">Contractor</a></li>
    <li><a  style="cursor:pointer;color:white;" id="vehicletablelinkid" onclick="window.location.href='vehicletable.php'">Vehicle</a></li>
    <li><a  style="cursor:pointer;color:white;" onclick="window.location.href='dashboard.php'"><?php echo $user['username']?></a></li>
    <li><a  style="cursor:pointer;color:white;"  onclick="window.location.href='dashboard.php?logout'">logout</a></li>
    </ul>

      </div>
  
</nav>
<div class="form-group row">
<div class="col-lg-1 col-xs-4" >
  <button class ="btn btn-primary" onclick="window.location.href='registration1.2.php'">Add new vehicle</button>
</div>
<div class="col-lg-1 col-xs-1" >
  <button class ="btn btn-primary" id="policereportbutid"onclick="window.location.href='policereport0.php'">PoliceReport</button>
</div>
</div>



    
<table id="table" style="border-color: black; border-width: 3px;" class="table table-striped table-advance table-hover tablesorter”">
                              <thead >
                              <tr style="border-color:  black;background-color: #4c4c4c; color: #fff; font-size: 15px ; border-width: 3px;" >
                                  <th style="border-color: black; border-width: 3px;background-color: lightblue;"  style="width: 5%"  '>#</th>
                                  
                                  <th style="border-color: black; border-width: 3px; background-color: lightblue;"  height='40'>No.</th>
                                  <th width="1%" style="border-color: orange; border-width: 3px; background-color: orange; "  >Station</th>
                                  <th width="7%" style="border-color: orange; border-width: 3px; background-color: orange; "  >Contractor</th>
                                  <th width="6%" style="border-color: orange; border-width: 3px; background-color: orange; "  >Parked Since</th>
                                  <th style="border-color: darkgreen; border-width: 3px; background-color: darkgreen; " >RegistrationNo</th>
                                  <th style="border-color: purple; border-width: 3px; background-color: purple; "  >Engine No</th>
                                  <th  style="border-color: purple; border-width: 3px; background-color: purple; " >Chassis No</th>
                                  <th width="5%" style="border-color: tan; border-width: 3px; background-color: tan; " >Type</th>
                                  
                                  <th width="7%" style="border-color: blue; border-width: 3px; background-color: blue; " >Company</th>
                                  
                                    <th style="border-color: blue; border-width: 3px; background-color: blue; " >Model</th>
                                  
                                  <th width="9%" style="border-color: pink; border-width: 3px; background-color: pink; "  >Car Image</th>
                                  <th width="9%" style="border-color: yellowgreen; border-width: 3px; background-color: yellowgreen; "  >Status</th>
                                  <th width="12%" style="border-color: royalblue; border-width: 3px; background-color: royalblue; "  >Action</th>
                              </tr>

                             

                              </thead>
                              <tbody id="tablebody">

                              <?php echo $code ?>
                             
                              </tbody>
                          </table>
 
 <button type="button" id="removebutid" style="display: none;"class="btn btn-primary" data-toggle="modal" data-target="#myModal" >Remove</button>
 <!--<input type="image" id="imgSrc" src="" size="7" />-->
 <!-- The Modal -->

 <!-- Modal -->
 <button type="button" style="display:none;" id="openmodalbutid"  data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" >
    
      <!-- Modal content-->
      <div class="modal-content" style="margin: 0px;display:inline-block;">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
    -->
        <div class="modal-body">
          <!--<p>Some text in the modal.</p>-->
          <img src="" id="img01" class="img-responsive" style="">
        </div>

        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>-->
      
    </div>
  </div>
  
</div>

 <button type="button" style="display:none;" id="openmatchmodalbutid"  data-toggle="modal" data-target="#myModal2">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade " id="myModal2" role="dialog">
    <div class="modal-dialog " >
    
      <!-- Modal content-->
      <div class="modal-content" style="margin: 0px;">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
    -->
        <div id="modalbodyid" class="modal-body">
          <!--<p>Some text in the modal.</p>-->
          
        </div>

        <div class="col-lg-offset-5">
        <button type="button" class="btn btn-default" onclick="recheckedit()" >Edit</button>
       </div>

        
      </div>
      
    </div>
  </div>
  <button type="button" style="display:none;" id="theftmodalbutid"  data-toggle="modal" data-target="#myModal3">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade " id="myModal3" role="dialog">
    <div class="modal-dialog " >
    
      <!-- Modal content-->
      <div class="modal-content" style="margin: 0px;display:inline-block;">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
    -->
        <div id="theftmodalbodyid" class="modal-body">
          <!--<p>Some text in the modal.</p>-->
          
        </div>

        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>-->
      
    </div>
  </div>
</div>
  <button type="button" style="display:none;" id="noticemodalbutid"  data-toggle="modal" data-target="#myModal4">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade " id="myModal4" role="dialog">
    <div class="modal-dialog " >
    
      <!-- Modal content-->
      <div class="modal-content" style="margin: 0px;display:inline-block;">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
    -->
        <div id="noticemodalbodyid" class="modal-body">
          <!--<p>Some text in the modal.</p>-->
          
        </div>

        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>-->
      
    </div>
  </div>
</div>
 <button type="button" style="display:none;" id="timemodalbutid"  data-toggle="modal" data-target="#myModal5">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade " id="myModal5" role="dialog">
    <div class="modal-dialog " >
    
      <!-- Modal content-->
      <div class="modal-content" style="margin: 0px;display:inline-block;">
        <!--<div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
    -->
        <div id="timemodalbodyid" class="modal-body">
          <!--<p>Some text in the modal.</p>-->
          
        </div>

        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>-->
      
    </div>
  </div>
</div>
  <div id="viewformhidden">
 <form action="parktable.php" method="POST">
   <input id="uniquenum" type="text" name="uniqueno">
   <button id="submitbut" type="submit" name="hiddensubmit"></button>
 </form>
 <form action="parktable.php" method="POST">
   <input id="uniquenum2" type="text" name="uniqueno2">

   <button id="submitbut2" type="submit" name="hiddensubmit2"></button>
 </form>
 <form action="parktable.php" method="POST">
   <input id="uniquenum3" type="text" name="uniqueno3">
   <button id="submitbut3" type="submit" name="hiddensubmit3"></button>
 </form>
 <form action="parktable.php" method="POST">
   <input id="uniquenum4" type="text" name="uniqueno4">
   <button id="submitbut4" type="submit" name="hiddensubmit4"></button>
 </form>
</div>
 <script type="text/javascript">
  var modal = document.getElementById('myModal');
  var $text;
  $(document).ready(function() {
     
   
  /* var date1 = new Date("7/13/2010");
var date2 = new Date("12/15/2010");
console.log(date1.getTime());
var timeDiff = Math.abs(date2.getTime() - date1.getTime());
var diffDays = Math.ceil(timeDiff / (1000 * 3600 * 24)); 
alert(diffDays);*/
     var user="<?php echo $station2?>";
     
     if(user!="admin")
     {
      $("#usertablelinkid").hide();
      $("#stationtablelinkid").hide();
      $("#contractortablelinkid").hide();
      $('#vehicletablelinkid').hide();
      $('#policereportbutid').hide();
     }
     $(document).on('click', function(event) {
    
         if (event.target.tagName.toUpperCase() == 'IMG') {
       
             
             $("#img01").attr("src",event.target.src);
             $("#openmodalbutid").trigger("click");
          }
        
       });
   
    
    $('body').on('click', '.statusclass', function () {
      var $row = $(this).closest("tr");    // Find the row
      $text = $row.find(".noclass").text();
      var $text2 = $row.find(".statusclass").text();
      console.log($text2);
     if($text2=="RECHECK")
     {
        
        getmatchdata($text);
     }
     else if($text2=="Theft")
     {
        console.log("im in theft");
        gettheftdata($text);
     }
     else
     {
     $('#uniquenum').val($text);
     $('#submitbut').trigger('click');
     }
   });

    $('body').on('click', '.noclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     $('#uniquenum2').val($text);
      //document.getElementById('removevehicleno').innerHTML=$text;
    // $('#removebutid').trigger('click');
    // Let's test it out
    $('#submitbut2').trigger('click');
   });

     
     $('body').on('click', '.noticeclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
    getnoticedata($text);
   });

    $('body').on('click', '.theftclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     gettheftdata($text);
   });
     $('body').on('click', '.timeclass', function () {
      var $row = $(this).closest("tr");    // Find the row
    var $text = $row.find(".noclass").text(); // Find the text
     gettimedata($text);
   });
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

               filename:'ParkingTable '+newStr, 
               title:'',
               exportOptions: {
                columns: [1,2,3,4,5,6,7,8,9,10,11,13]
                },
            },
            
        ]

      });
  
   
   function removedatafun2()
   {
     
    $('#submitbut2').trigger('click');
   }

   function getmatchdata(str)
   {
      if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("modalbodyid").innerHTML = this.responseText;
                $('#openmatchmodalbutid').trigger("click");
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findmatchmodal.php?q="+str,true);
        xmlhttp.send();
   }

    function removedatafun2()
   {
     
    $('#submitbut2').trigger('click');
   }

   function gettheftdata(str)
   {
      if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("theftmodalbodyid").innerHTML = this.responseText;
                $('#theftmodalbutid').trigger("click");
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findtheftmodal.php?q="+str,true);
        xmlhttp.send();
   }
   function getnoticedata(str)
   {
      if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("noticemodalbodyid").innerHTML = this.responseText;
                console.log(this.responseText);
                $('#noticemodalbutid').trigger("click");
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findnoticemodal.php?q="+str,true);
        xmlhttp.send();
   }
   function gettimedata(str)
   {
      if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("timemodalbodyid").innerHTML = this.responseText;
                console.log(this.responseText);
                $('#timemodalbutid').trigger("click");
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findtimemodal.php?q="+str,true);
        xmlhttp.send();
   }
   function recheckedit()
   {
     $('#uniquenum4').val($text);
     $('#submitbut4').trigger('click');
   }

 </script>
 </body>
 </html>