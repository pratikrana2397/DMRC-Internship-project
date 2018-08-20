<?php 
 session_start(); 

$no= $_SESSION['no2'];
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 $query='SELECT * FROM data WHERE No="'.$no.'"';
 $result= mysqli_query($db, $query);
 
  while ($row=mysqli_fetch_array($result)) {
     $regno=$row['Reg.No.'];
     $engineno=$row['EngineNo'];
     $chassino=$row['ChassisNo'];
     $type=$row["Type"];
     $make=$row["Make"];
     $model=$row["Model"];
     $color=$row['color'];
     $status=$row['Status'];
     $station=$row['Station'];
     $nameplatephoto=$row["CarNameplatePhoto"];
     $frontphoto=$row["CarFrontPhoto"];
     $backphoto=$row["CarBackPhoto"];
     $leftphoto=$row["CarLeftPhoto"];
     $rightphoto=$row["CarRightPhoto"];
     $contractor=$row["Contractor"];
  }   
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<style type="text/css">
	label
    {
    	font-size:18px;
    }
    .modal-content{display:inline-block;}
</style>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body style="background-color:#339966;">
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
<div class='container' style="background-color:#ccffeb;border-radius: 10px;border:3px solid #cecece;vertical-align: middle;">
	<div class="col-lg-offset-4 col-xs-offset-3">
 <label  style="color:#0099ff;font-size:25px;border-bottom: 3px solid ;border-color:#0099ff;"><b>VEHICLE DETAILS</b></label>
    </div>
    <br>

  
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Vehicle ID:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $no ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Station:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $station ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-5" >Contractor:</label>
      <label class=" col-lg-5  col-xs-7"  style="font-weight:normal"><?php echo $contractor ?></label>
     </div><br>
    <div class="row">
      <label class=" col-lg-2 col-xs-6" >Registration No:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $regno ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Engine No:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $engineno ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Chassis No:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $chassino ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Type:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $type ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Make:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $make ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Model:</label>
      <label class=" col-lg-5"  style="font-weight:normal"><?php echo $model ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-2 col-xs-6" >Color:</label>
      <label class=" col-lg-5"  style="font-weight:normal;color:<?php echo $color ?>"><?php echo $color ?></label>
     </div><br>

     <div class="row">
     	 <label class=" col-lg-2" >Nameplate-Photo</label>
     	 <div class="col-lg-3">
       <img id="nameplatephotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($nameplatephoto); ?>" width="320"/>
         </div>
     </div>
     <br><br>
     <div class="row">
     	 <label class=" col-lg-2" >Front-Photo</label>
     	 <div class="col-lg-4">
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($frontphoto); ?>" width="320"/>
         </div>
       <label class=" col-lg-2" >Back-Photo</label>
         <div class="col-lg-2">
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($backphoto); ?>" width="320"/>
         </div>
     </div>
     <br><br>
       <div class="row">
     	 <label class=" col-lg-2" >Left-Photo</label>
     	 <div class="col-lg-4">
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($leftphoto); ?>" width="320"/>
         </div>
       <label class=" col-lg-2" >Right-Photo</label>
         <div class="col-lg-2">
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($rightphoto); ?>" width="320"/>
         </div>
     </div>
   </br>
     
<button type="button" style="display:none;" id="openmodalbutid"  data-toggle="modal" data-target="#myModal">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog modal-lg" >
    
      <!-- Modal content-->
      <div class="modal-content" style="margin: 0px;">
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
     <button type="button" class="btn btn-primary btn-lg" onclick="window.location.href='registrationedit.php'">Edit</button>
     
    <!--<div class="row">        
      <div class="col-lg-offset-2 col-lg-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>-->
<script type="text/javascript">
	
	$(document).ready(function() {
	$(document).on('click', function(event) {
    
         if (event.target.tagName.toUpperCase() == 'IMG') {
       
             
             $("#img01").attr("src",event.target.src);
             $("#openmodalbutid").trigger("click");
          }
        
       });
	});
</script> 
</div>
</body>
</html>