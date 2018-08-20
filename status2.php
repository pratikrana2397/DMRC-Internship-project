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
     $nooftimes=$row["checkednooftimes"];
  }
   if(isset($_POST["dummysubmit"])){
   
   $owneraddress=$_POST["dummy12"];
   $owneraddress=nl2br($owneraddress);
   //$owneraddress=$owneraddress.replace(/\n/g, '<br />');
 	if($_POST["dummy13"]=="MATCHED")
 	{
 		$query='UPDATE `data` SET `Status`="'.'MATCHED'.'",`online_regno`="'.$_POST["dummy1"].'",`online_chassisno`="'.$_POST["dummy3"].'",`online_engineno`="'.$_POST["dummy2"].'",`online_type`="'.$_POST["dummy4"].'",`online_make`="'.$_POST["dummy5"].'",`online_model`="'.$_POST["dummy6"].'",`online_color`="'.$_POST["dummy7"].'",`online_purchasedate`="'.$_POST["dummy8"].'",`online_body`="'.$_POST["dummy9"].'",`online_registerlocation`="'.$_POST["dummy10"].'",`online_ownername`="'.$_POST["dummy11"].'",`online_owneraddress`="'.$owneraddress.'" WHERE `No`="'.$no.'"';
 	}
 	if($_POST["dummy13"]=="NOTFOUND")
 	{
 		$query='UPDATE `data` SET `Status`="'.'RECHECK'.'",`online_regno`="'.$_POST["dummy1"].'",`online_chassisno`="'.$_POST["dummy3"].'",`online_engineno`="'.$_POST["dummy2"].'",`online_type`="'.$_POST["dummy4"].'",`online_make`="'.$_POST["dummy5"].'",`online_model`="'.$_POST["dummy6"].'",`online_color`="'.$_POST["dummy7"].'",`online_purchasedate`="'.$_POST["dummy8"].'",`online_body`="'.$_POST["dummy9"].'",`online_registerlocation`="'.$_POST["dummy10"].'",`online_ownername`="'.$_POST["dummy11"].'",`online_owneraddress`="'.$owneraddress.'" WHERE `No`="'.$no.'"';
 	}
 	if($_POST["dummy13"]=="PARTIALMATCHEDRECHECKYES")
 	{
 		$query='UPDATE `data` SET `Status`="'.'RECHECK'.'",`online_regno`="'.$_POST["dummy1"].'",`online_chassisno`="'.$_POST["dummy3"].'",`online_engineno`="'.$_POST["dummy2"].'",`online_type`="'.$_POST["dummy4"].'",`online_make`="'.$_POST["dummy5"].'",`online_model`="'.$_POST["dummy6"].'",`online_color`="'.$_POST["dummy7"].'",`online_purchasedate`="'.$_POST["dummy8"].'",`online_body`="'.$_POST["dummy9"].'",`online_registerlocation`="'.$_POST["dummy10"].'",`online_ownername`="'.$_POST["dummy11"].'",`online_owneraddress`="'.$owneraddress.'",`match_regno`="'.$_POST["dummy14"].'",`match_engineno`="'.$_POST["dummy15"].'",`match_chassisno`="'.$_POST["dummy16"].'",`match_type`="'.$_POST["dummy17"].'",`match_make`="'.$_POST["dummy18"].'",`match_model`="'.$_POST["dummy19"].'",`match_color`="'.$_POST["dummy20"].'",`match_remarks`="'.$_POST["dummy21"].'" WHERE `No`="'.$no.'"';
 		echo $query;
 	}
 	if($_POST["dummy13"]=="PARTIALMATCHEDRECHECKNO")
 	{
 		$query='UPDATE `data` SET `Status`="'.'MATCHED*'.'",`online_regno`="'.$_POST["dummy1"].'",`online_chassisno`="'.$_POST["dummy3"].'",`online_engineno`="'.$_POST["dummy2"].'",`online_type`="'.$_POST["dummy4"].'",`online_make`="'.$_POST["dummy5"].'",`online_model`="'.$_POST["dummy6"].'",`online_color`="'.$_POST["dummy7"].'",`online_purchasedate`="'.$_POST["dummy8"].'",`online_body`="'.$_POST["dummy9"].'",`online_registerlocation`="'.$_POST["dummy10"].'",`online_ownername`="'.$_POST["dummy11"].'",`online_owneraddress`="'.$owneraddress.'",`match_regno`="'.$_POST["dummy14"].'",`match_engineno`="'.$_POST["dummy15"].'",`match_chassisno`="'.$_POST["dummy16"].'",`match_type`="'.$_POST["dummy17"].'",`match_make`="'.$_POST["dummy18"].'",`match_model`="'.$_POST["dummy19"].'",`match_color`="'.$_POST["dummy20"].'",`match_remarks`="'.$_POST["dummy21"].'" WHERE `No`="'.$no.'"';
 	}
    
 	if($_POST["dummy13"]=="unrecognizable")
 	{
 		$query='UPDATE `data` SET `Status`="'.'unrecognizable'.'",`online_regno`="'.$_POST["dummy1"].'",`online_chassisno`="'.$_POST["dummy3"].'",`online_engineno`="'.$_POST["dummy2"].'",`online_type`="'.$_POST["dummy4"].'",`online_make`="'.$_POST["dummy5"].'",`online_model`="'.$_POST["dummy6"].'",`online_color`="'.$_POST["dummy7"].'",`online_purchasedate`="'.$_POST["dummy8"].'",`online_body`="'.$_POST["dummy9"].'",`online_registerlocation`="'.$_POST["dummy10"].'",`online_ownername`="'.$_POST["dummy11"].'",`online_owneraddress`="'.$owneraddress.'" WHERE `No`="'.$no.'"';
 	}
 	 $result= mysqli_query($db, $query);
 	 header("location:parktable.php");
 }  
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	label
    {
    	font-size:18px;
    }
    .modal-content{display:inline-block;}
</style>
<body style="background-color: #5c5c8a;">
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

<div class="col-lg-4" style="float:left;">
<div class="container col-lg-12" style="background-color:#dcdcbc;border-radius: 10px;border:3px solid #cecece;vertical-align: middle;">
	 <br>
	 <div class="row">
      <label class=" col-lg-6 col-xs-6" >Registration No:</label>
      <label class=" col-lg-5"  style=""><?php echo $regno ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-6 col-xs-6" >Engine No:</label>
      <label class=" col-lg-5"  style=""><?php echo $engineno ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-6 col-xs-6" >Chassis No:</label>
      <label class=" col-lg-5"  style=""><?php echo $chassino ?></label>
     </div><br>
     <div class="row">
      <label class=" col-lg-5 col-xs-3" >Verdict:</label>
      <select class="col-lg-5 " style="width: 210px; height:26px; font-size: 20px;float-right" id="selectchoiceid" onchange="showrecheck(this.value)" required>
        <option value="">nothing</option>
        <option value="matched">Matched</option>
        <option value="partialmatched">Partially Matched</option>
        <option value="notfound">Not Found</option>
      </select>
     </div><br>
     <div id="partialmatchedchecks" style="display:none;">
     <div class="row">
     	<label class=" col-lg-12 col-xs-12" ><u>Tick the Parameters which do not match</u></label>
     </div><br>
     <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="regnocheckbox"  />
     	<label class="col-lg-5 col-xs-3" >Reg.No.</label>
     </div>
     <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="enginenocheckbox"  />
     	<label class="col-lg-5 col-xs-8" >Engine No.</label>
     </div>
     <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="chassisnocheckbox"  />
     	<label class="col-lg-5 col-xs-8" >Chassis No.</label>
     </div>
     <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="typecheckbox"  />
     	<label class="col-lg-5 col-xs-3" >Type</label>
     </div>
      <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="makecheckbox"  />
     	<label class="col-lg-5 col-xs-3" >Make</label>
     </div>
      <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="modelcheckbox"  />
     	<label class="col-lg-5 col-xs-3" >Model</label>
     </div>
     <div class="row col-lg-offset-3 col-xs-offset-3">
     	
     	<input class="col-lg-1 col-xs-1" type="checkbox" id="colorcheckbox"  />
     	<label class="col-lg-5 col-xs-3" >Color</label>
     </div><br>
      <div class="row col-lg-offset-0 col-xs-offset-0">
     	
     	<label class="col-lg-4" >Remarks</label>
     <input class="col-lg-6 col-xs-9"type="text"  id="partialmatchremarks" style="font-size: 15px;height:60px">
     </div><br><br>
     <div class="row"  >
      <label class=" col-lg-5 col-xs-3" >Send For Recheck?</label>
      <select class="col-lg-5 " id="recheckselect" style="width: 210px; height:26px; font-size: 20px;float-right"   >
        <option value="">nothing</option>
        <option value="yes">yes</option>
        <option value="no">No</option>    
      </select>
     </div>
     </div>
     <br>
     <div class="row">
      <button class="col-lg-offset-5 col-xs-offset-5" id="saveid" onclick="saveonlinedata()">Save</button>
     </div>
</div>
</div>

<div class="col-lg-7" style="float:right;">
<div class="container col-lg-12" style="background-color:#ffdab3;border-radius: 10px;border:3px solid #cecece;vertical-align: middle;">
	 <br>
	 <div class="row col-lg-offset-1">
     <label class="col-lg-4" id="datalabelid">Copy Paste Vahan Data here</label>
     <input class="col-lg-6 col-xs-9"type="text" id="dataid" style="font-size: 30px;">
     <button class="col-lg-offset-1 " id="refreshid" onclick="refreshdatafun()">Refresh</button>
     </div><br>
     <div class="row col-lg-offset-7 col-xs-offset-4">
    <button id="submitid" onclick="submitdatafun()">Submit</button>
     </div><br>
     <div class="row col-lg-offset-4 col-xs-offset-2">
     <label class="col-lg-7" id="ourdataid" ><u>Our Data</u></label>
     <label id="onlinedataid" ><u>Online Data</u></label>
     </div><br>
     <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-2"id="reglabelid2" style="">Reg. No:</label>
     <label class="col-lg-5 col-xs-5"id="regid2" ><?php echo $regno ?></label>
     <label class="col-lg-3 col-xs-1"id="regid3" ></label>
     </div><br>
     <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-3"id="enginelabelid2" style="">Engine No:</label>
     <label class="col-lg-5 col-xs-6"id="engineid2" ><?php echo $engineno ?></label>
     <label class="col-lg-3 "id="engineid3" ></label>
     </div><br>
     <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-4"id="chassilabelid2" style="">Chassi No:</label>
     <label class="col-lg-5"id="chassiid2" ><?php echo $chassino ?></label>
     <label class="col-lg-3"id="chassiid3" ></label>
     </div><br>
     <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-4"id="typelabelid2" style="">Type:</label>
     <label class="col-lg-5 col-xs-4"id="typeid2" ><?php echo $type ?></label>
     <label class="col-lg-3 col-xs-3"id="typeid3" ></label>
     </div><br>
      <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-4"id="makelabelid2" style="">Make:</label>
     <label class="col-lg-5 col-xs-4"id="makeid2" ><?php echo $make ?></label>
     <label class="col-lg-3 col-xs-3"id="makeid3" ></label>
     </div><br>
      <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-4"id="modellabelid2" style="">Model:</label>
     <label class="col-lg-5 col-xs-4"id="modelid2" ><?php echo $model ?></label>
     <label class="col-lg-3 col-xs-3"id="modelid3" ></label>
     </div><br>
      <div class="row col-lg-offset-1 ">
     <label class="col-lg-3 col-xs-4"id="colorlabelid2" style="">Color:</label>
     <label class="col-lg-5 col-xs-4"id="colorid2" style="color:<?php echo $color ?>"><?php echo $color ?></label>
     <label class="col-lg-3 col-xs-3"id="colorid3" ></label>
     </div><br><br>
     <div class="row col-lg-offset-1 ">
     <img class="col-lg-2 col-xs-4" id="nameplatephotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($nameplatephoto); ?>" width="120"/>
     <img class="col-lg-2 col-xs-4" id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($frontphoto); ?>" width="120"/>
     <img class="col-lg-2 col-xs-4" id="backphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($backphoto); ?>" width="120"/>
     <label class="col-lg-3  col-lg-offset-1 col-xs-5"id="purchasedatelabelid2" style="">Purchase Date:</label>
     <label class="col-lg-2"id="purchasedateid3" ></label>
     </div><br>
     <div class="row col-lg-offset-2 ">
     <img class="col-lg-2 col-xs-4" id="leftphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($leftphoto); ?>" width="120"/>
     <img class="col-lg-2 col-xs-4" id="rightphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($rightphoto); ?>" width="120"/><br>
     <label class="col-lg-2 col-lg-offset-4 col-xs-offset- col-xs-2" id="bodylabelid2" style="">Body:</label>
     <label class="col-lg-2 col-xs-1" id="bodyid3" style=""></label>	
     </div><br>
</div>
</div>
<form action="status2.php" method="post" style="display: none;">
	<input type="text" name="dummy1" id="dummy1id">
	<input type="text" name="dummy2" id="dummy2id">
	<input type="text" name="dummy3" id="dummy3id">
	<input type="text" name="dummy4" id="dummy4id">
	<input type="text" name="dummy5" id="dummy5id">
	<input type="text" name="dummy6" id="dummy6id">
	<input type="text" name="dummy7" id="dummy7id">
	<input type="text" name="dummy8" id="dummy8id">
	<input type="text" name="dummy9" id="dummy9id">
	<input type="text" name="dummy10" id="dummy10id">
	<input type="text" name="dummy11" id="dummy11id">
	<input type="text" name="dummy12" id="dummy12id">
	<input type="text" name="dummy13" id="dummy13id">
	<input type="text" name="dummy14" id="dummy14id">
	<input type="text" name="dummy15" id="dummy15id">
	<input type="text" name="dummy16" id="dummy16id">
	<input type="text" name="dummy17" id="dummy17id">
	<input type="text" name="dummy18" id="dummy18id">
	<input type="text" name="dummy19" id="dummy19id">
	<input type="text" name="dummy20" id="dummy20id">
	<input type="text" name="dummy21" id="dummy21id">
	<button type="submit" name="dummysubmit" id="dummysubmitid"</button>
</form>
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
          <img src="" id="img01" class="img-responsive" style="width:1000px;">
        </div>

        <!--<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>-->
      
    </div>
  </div>
  
</div>
<script type="text/javascript">
	$(document).ready(function() {
	   $(document).on('click', function(event) {
		
         if (event.target.tagName.toUpperCase() == 'IMG') {
       
             
             $("#img01").attr("src",event.target.src);
             $("#openmodalbutid").trigger("click");
          }
        
       });
       var $times="<?php echo $nooftimes?>";
       console.log($times);
       if($times==3)
       {
       	console.log("thirdtimecoming");
       	$("#selectchoiceid").html('<option value="">nothing</option> <option value="matched">Matched</option><option value="unrecognizable">unrecognizable</option>');
       }
	});
	function submitdatafun()
	{

        $("#ourdataid").show();
        $("#onlinedataid").show();
        $("#otheronlinedataid").show();
        $("#reglabelid2").show();
        $("#enginelabelid2").show();
        $("#chassilabelid2").show();
        $("#typelabelid2").show();
        $("#makelabelid2").show();
        $("#modellabelid2").show();
        $("#colorlabelid2").show();
        $("#arealabelid2").show();
        $("#purchasedatelabelid2").show();
        $("#bodylabelid2").show();
        $("#regid2").show();
        $("#engineid2").show();
        $("#chassiid2").show();
        $("#typeid2").show();
        $("#makeid2").show();
        $("#modelid2").show();
        $("#colorid2").show();
        $("#areaid2").show();
        $("#purchasedateid3").show();
        $("#bodyid3").show();
        $("#frontphotoid").show();
        $("#backphotoid").show();
        $("#leftphotoid").show();
        $("#rightphotoid").show();
        
        if($("#dataid").val()=="")
        	return;
		str=$("#dataid").val();
		$("#dataid").val('');
		p=str.indexOf('Registration No:');
	    l=('Registration No:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!="\t";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('regid3').innerHTML=ans;
       regno=ans;
       p=str.indexOf('Engine No:');
	    l=('Engine No:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!=" ";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('engineid3').innerHTML=ans;
       engineno=ans;
       p=str.indexOf('Chassis No:');
	    l=('Chassis No:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!=" ";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('chassiid3').innerHTML=ans;
       chassisno=ans;
       p=str.indexOf('Vehicle Class:');

	    l=('Vehicle Class:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!="\t";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('typeid3').innerHTML=ans;
       type=ans;
       p=str.indexOf('Maker/Model:');
	    l=('Maker/Model:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!=",";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('makeid3').innerHTML=ans;
       make=ans;
      k=0;
       for(i=0;str[i]&&str[i]&&(k!=2);i++)
       	{
          if(str[i]==',')
          {
          	k++;
          }
       	}
       	l=i;
       	p=0;
	    p+=(l+1);
       ans='';
       q=str.indexOf('Seating Cap:');
       for(i=p;str[i]&&i<q;i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('modelid3').innerHTML=ans;
       model=ans;
       p=str.indexOf('Color:');
	    l=('Color:').length;

	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!="\t";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('colorid3').innerHTML=ans;
        color=ans;
        p=str.indexOf('This Vehicle is Registered in');
	    l=('This Vehicle is Registered in').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]!="[";i++)
       {
         ans=ans+str[i];
       }
      // document.getElementById('areaid3').innerHTML=ans;
       registerlocation=ans;
        p=str.indexOf('Purchase dt:');
	    l=('Purchase dt:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!="\t";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('purchasedateid3').innerHTML=ans;
       purchasedate=ans;
        p=str.indexOf('Body Type:');
	    l=('Body Type:').length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&str[i]!="\t";i++)
       {
         ans=ans+str[i];
       }
       document.getElementById('bodyid3').innerHTML=ans;
       body=ans;
        p=str.indexOf("Owner's Name:");
        q=str.indexOf("Father's Name:");
	    l=("Owner's Name:").length;
	    p+=(l+1);
       ans='';
       for(i=p;str[i]&&(i<q);i++)
       {
         ans=ans+str[i];
       }
       
       ownername=ans;
        p=str.indexOf('Present Address:');
        q=str.indexOf('Permanent Address:');
	    l=('Present Address:').length;
	    p+=(l+1);
       ans='';
       
       
        for(i=p;str[i]&&(i<q);i++)
       {
         ans=ans+str[i];
       }
       
       p=str.indexOf('City:');
        
	    l=('City:').length;
	    p+=(l+1);
       
       for(i=p;str[i]&&(str[i]!="\t");i++)
       {
         ans=ans+str[i];
       }
       owneraddress=ans;
       console.log(owneraddress);
	}
	function refreshdatafun()
	{
		$("#dataid").val('');

	}
	function saveonlinedata()
	{
		 
         if($("#selectchoiceid").val()=="matched")
         {
             $("#dummy1id").val(regno);
		     $("#dummy2id").val(engineno);
		     $("#dummy3id").val(chassisno);
		     $("#dummy4id").val(type);
		     $("#dummy5id").val(make);
		     $("#dummy6id").val(model);
		     $("#dummy7id").val(color);
		     $("#dummy8id").val(purchasedate);
		     $("#dummy9id").val(body);
		     $("#dummy10id").val(registerlocation);
         $("#dummy11id").val(ownername);

         
        
		     $("#dummy12id").val(owneraddress);
             $("#dummy13id").val("MATCHED");

             
		     $("#dummysubmitid").trigger('click');
         }
         	if($("#selectchoiceid").val()=="notfound")
         {
         	$("#dummy13id").val("NOTFOUND");
         	$("#dummysubmitid").trigger('click');
         }
         if($("#selectchoiceid").val()=="unrecognizable")
         {
         	$("#dummy13id").val("unrecognizable");
         	$("#dummysubmitid").trigger('click');
         }
         if($("#selectchoiceid").val()=="partialmatched")
         {
         	if($("#recheckselect").val()=="yes")
         	$("#dummy13id").val("PARTIALMATCHEDRECHECKYES");
            if($("#recheckselect").val()=="no")
            $("#dummy13id").val("PARTIALMATCHEDRECHECKNO");
              $("#dummy1id").val(regno);
		     $("#dummy2id").val(engineno);
		     $("#dummy3id").val(chassisno);
		     $("#dummy4id").val(type);
		     $("#dummy5id").val(make);
		     $("#dummy6id").val(model);
		     $("#dummy7id").val(color);
		     $("#dummy8id").val(purchasedate);
		     $("#dummy9id").val(body);
		     $("#dummy10id").val(registerlocation);
		     $("#dummy11id").val(ownername);
		     $("#dummy12id").val(owneraddress);
             if ($('#regnocheckbox').is(':checked')) {
             	$("#dummy14id").val("0");
             }
             else
             {
             	$("#dummy14id").val("1");
             }
              

             if ($('#enginenocheckbox').is(':checked')) {
             	$("#dummy15id").val("0");
             }
             else
             {
             	$("#dummy15id").val("1");
             }
             

             if ($('#chassisnocheckbox').is(':checked')) {
             	$("#dummy16id").val("0");
             }
             else
             {
             	$("#dummy16id").val("1");
             }

             
             if ($('#typecheckbox').is(':checked')) {
             	$("#dummy17id").val("0");
             }
             else
             {
             	$("#dummy17id").val("1");
             }
            

             if ($('#makecheckbox').is(':checked')) {
             	$("#dummy18id").val("0");
             }
             else
             {
             	$("#dummy18id").val("1");
             }
             

             if ($('#modelcheckbox').is(':checked')) {
             	$("#dummy19id").val("0");
             }
             else
             {
             	$("#dummy19id").val("1");
             }
             

             if ($('#colorcheckbox').is(':checked')) {
             	$("#dummy20id").val("0");
             }
             else
             {
             	$("#dummy20id").val("1");
             }
            $("#dummy21id").val($("#partialmatchremarks").val());
         	$("#dummysubmitid").trigger('click');
         }
         
         
	}
	function showrecheck(str)
	{
		if(str=="partialmatched")
		{
			$("#partialmatchedchecks").show();
		}
		else
		{
			$("#partialmatchedchecks").hide();
		}
	}
</script>
</body>
</html>