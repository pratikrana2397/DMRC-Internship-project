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
   
   if($_POST["dummy2"]=="yes")
   {
   	$query='UPDATE data SET Status="Theft",theftdata="'.base64_encode($_POST["dummy1"]).'" ,theftstatus="yes" WHERE `No`="'.$no.'"';
   }
   else
   {
   	$query='UPDATE data SET Status="OK",theftdata="'.base64_encode($_POST["dummy1"]).'" ,theftstatus="no" WHERE `No`="'.$no.'"';
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
    input[type="checkbox"]{
      width: 17px; /*Desired width*/
      height: 17px; /*Desired height*/
      cursor: pointer;
      
    }
    .modal-content{display:inline-block;}
</style>
<body style="background-color: #b30000;">
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
<div class="container col-lg-12" style="background-color:#dfbf9f;border-radius: 10px;border:3px solid #cecece;vertical-align: middle;">
	 <br>
	 <div class="row">
	 	<div class=" col-lg-5">
	  <input class=""  type="checkbox" name="selectno" id="regnocheckbox"  />
      <label class="col-lg-offset-1" >Reg. No:</label>
       </div>
      <textarea class=" "  id="regnoid" style="font-size:20px;height:38px;width:150px;"><?php echo $regno ?></textarea>
     </div><br>
     <div class="row">
      <div class=" col-lg-5">
      <input class=""  type="checkbox" name="selectno" id="enginenocheckbox"  />
      <label class=" col-lg-offset-1" >Engine No:</label>
      </div>
      <textarea class=""  id="enginenoid"style="font-size:20px;height:38px;width:250px;"><?php echo $engineno ?></textarea>
     </div><br>
     <div class="row">
      <div class=" col-lg-5">
      <input class=""  type="checkbox" name="selectno" id="chassisnocheckbox"  />
      <label class="col-lg-offset-1" >Chassis No:</label>
      </div>
      <textarea class=""  id="chassisnoid" style="font-size:20px;height:38px;width:250px;"><?php echo $chassino ?></textarea>
     </div><br><br>
     <div class="row">
      <button class="col-lg-offset-3 btn-btn-default" onclick="zipfun()">Check Zipnet</button>
      <button class="col-lg-offset-1 btn-btn-default" onclick="vahansamfun()">Check Vahan Samanvay</button>
     </div><br><br>
     <div class="row">
      <label class=" col-lg-5 col-xs-3" >Is it the Theft Vehicle?</label>
      <select class="col-lg-5 " style="width: 210px; height:26px; font-size: 20px;float-right" id="selectchoiceid"  required>
        <option value="">nothing</option>
        <option value="yes">yes</option>
        <option value="no">No</option>    
      </select>
     </div><br>
    
     
     <br>
     <div class="row">
      <button class="col-lg-offset-5 col-xs-offset-5" id="saveid" onclick="saveonlinedata()">Save</button>
     </div>
</div>
</div>

<div class="col-lg-offset-1 col-lg-7 col-xs-12" style="">
<div class="container col-lg-12 "  style="background-color:white;border-radius: 10px;border:3px solid #cecece;vertical-align: middle;">
	<div id="box" class="col-lg-12 col-xs-6"style="min-height: 750px;">
		
	</div>
</div>
</div>
<form action="theftcheck.php" method="post" style="display: none;">
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
	function zipfun() {
     
        if ($('#regnocheckbox').is(':checked')) {
      	zipregno();
       } else   
        if ($('#enginenocheckbox').is(':checked')) {
        zipengineno();
       } else
        if ($('#chassisnocheckbox').is(':checked')) {
        zipchassisno();
       } else
       {
       	alert("Pick one of Three");
       }
    }
    var zipnetresult;
    function zipregno()
	{
        
        document.getElementById("box").innerHTML = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><img class="col-lg-offset-6" style="width:70px;" src="loadingimage.gif">';

		 if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	console.log("haha");
                document.getElementById("box").innerHTML = this.responseText;
                zipnetresult=this.responseText;
            }
        };
        var str=$("#regnoid").val();
        console.log(str);
        xmlhttp.open("GET","zipnetreg.php?q="+str,true);
        xmlhttp.send();
	}
	function zipengineno()
	{
		document.getElementById("box").innerHTML = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><img class="col-lg-offset-6" style="width:70px;" src="loadingimage.gif">';
		 if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	console.log("haha");
                document.getElementById("box").innerHTML = this.responseText;
                zipnetresult=this.responseText;
            }
        };
        var str=$("#enginenoid").val();
        console.log(str);
        xmlhttp.open("GET","zipnetengineno.php?q="+str,true);
        xmlhttp.send();
	}
	function zipchassisno()
	{
		document.getElementById("box").innerHTML = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><img class="col-lg-offset-6" style="width:70px;" src="loadingimage.gif">';
		 if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	console.log("haha");
                document.getElementById("box").innerHTML = this.responseText;
                zipnetresult=this.responseText;
            }
        };
        var str=$("#chassisnoid").val();
        console.log(str);
        xmlhttp.open("GET","zipnetchassisno.php?q="+str,true);
        xmlhttp.send();
	}
	function vahansamfun() {
     
        if ($('#regnocheckbox').is(':checked')) {
      	vahansamregno();
       } else   
        if ($('#enginenocheckbox').is(':checked')) {
        zipengineno();
       } else
        if ($('#chassisnocheckbox').is(':checked')) {
        zipchassisno();
       } else
       {
       	alert("Pick one of Three");
       }
    }
    function vahansamregno()
	{
        
        document.getElementById("box").innerHTML = '<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><img class="col-lg-offset-6" style="width:70px;" src="loadingimage.gif">';

		 if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            	console.log("haha");
                document.getElementById("box").innerHTML = this.responseText;
                zipnetresult=this.responseText;
            }
        };
        var str=$("#regnoid").val();
        console.log(str);
        xmlhttp.open("GET","vahansamregno.php?q="+str,true);
        xmlhttp.send();
	}
	$(document).ready(function() {
		$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
	   $(document).on('click', function(event) {
		
         if (event.target.tagName.toUpperCase() == 'IMG') {
       
             
             $("#img01").attr("src",event.target.src);
             $("#openmodalbutid").trigger("click");
          }
        
       });
      
	});

	function saveonlinedata()
	{
		 $("#dummy1id").val(zipnetresult);
		if($("#selectchoiceid").val()=="yes")
        {
           $("#dummy2id").val("yes");
        }
        else
        {
            $("#dummy2id").val("no");
        }
         $("#dummysubmitid").trigger('click');
        
	}
	
	
</script>
</body>
</html>