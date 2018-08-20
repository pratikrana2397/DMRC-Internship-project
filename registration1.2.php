<?php
require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
       
       
     $db = mysqli_connect('localhost', 'root', '', 'internship');	  	
if(isset($_POST["submitme"]))
{
	$query5="SELECT MAX(No) as No FROM data";
          $result5= mysqli_query($db, $query5);

     while ($row = mysqli_fetch_array($result5)) {
         $no=$row["No"];
      }
      $no=$no+1;
      $imgContent0="";
      $imgContent1="";
      $imgContent2="";
      $imgContent3="";
      $imgContent4="";
      echo $station2;
      echo "nice";
       
       if(isset($_FILES['image0'])){
       $check = getimagesize($_FILES["image0"]["tmp_name"]);
    if($check !== false){
      $image0 = $_FILES['image0']['tmp_name'];
        $imgContent0 = addslashes(file_get_contents($image0));
     
      }
     }
    if(isset($_FILES['image1'])){
        $check = getimagesize($_FILES["image1"]["tmp_name"]);
    if($check !== false){
        $image1 = $_FILES['image1']['tmp_name'];
        $imgContent1 = addslashes(file_get_contents($image1));
          }
      }
          if(isset($_FILES['image2'])){
        $check = getimagesize($_FILES["image2"]["tmp_name"]);
    if($check !== false){  
        $image2 = $_FILES['image2']['tmp_name'];
        $imgContent2 = addslashes(file_get_contents($image2));
       }
   }
       if(isset($_FILES['image3'])){
       $check = getimagesize($_FILES["image3"]["tmp_name"]);
    if($check !== false){
        $image3 = $_FILES['image3']['tmp_name'];
        $imgContent3 = addslashes(file_get_contents($image3));
       }
   }
       if(isset($_FILES['image4'])){
       $check = getimagesize($_FILES["image4"]["tmp_name"]);
    if($check !== false){
        $image4 = $_FILES['image4']['tmp_name'];
        $imgContent4 = addslashes(file_get_contents($image4));
       }
   }
        $type=$_POST['vehicletype'];
        $make=$_POST['vehiclemake'];
        $model=$_POST['vehiclemodel'];

        if($_POST["vehicletype"]=="other")
        {
            $type=$_POST["othertype"];
        }
        if($_POST["vehiclemake"]=="other")
        {
            $make=$_POST["othermake"];
        }
        if($_POST["vehiclemodel"]=="other")
        {
            $model=$_POST["othermodel"];
        }
       $regno=$_POST["registrationno"];
        $engineno=$_POST["enginenumber"];
        $chassino=$_POST["chassinumber"];
        if($_POST["registrationno"]=="")
          $regno="NOT FOUND";
        if($_POST["enginenumber"]=="")
          $engineno="NOT FOUND";
        if($_POST["chassinumber"]=="")
          $chassino="NOT FOUND";
        $originalDate = $_POST["parkedsince"];
         $newDate = date("d-m-Y", strtotime($originalDate));
         $_SESSION['reg']='';
         $query0='INSERT INTO `data`(`No`, `Station`, `Contractor`, `ParkedSince`, `Type`, `Make`, `Model`, `Reg.No.`,`EngineNo`,`ChassisNo`, `color`, `CarNameplatePhoto`, `CarFrontPhoto`, `CarBackPhoto`, `CarLeftPhoto`, `CarRightPhoto`,`otheritems`, `remarks`) VALUES ("'.$no.'","'.$station2.'","'.$_POST["contractor"].'","'.$newDate.'","'.$type.'","'.$make.'","'.$model.'","'.$regno.'","'.$engineno.'","'.$chassino.'","'.$_POST["favcolor"].'","'.$imgContent0.'","'.$imgContent1.'","'.$imgContent2.'","'.$imgContent3.'","'.$imgContent4.'","'.$_POST["extrathings"].'","'.$_POST["remarks"].'")';
         //echo $query0;
        // mysqli_query($db, $query0);
         
         mysqli_query($db,$query0);/*, function(err,results) {
          
          header('location:kite.php');
          
        });*/
         header('location:parktable.php');	
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
	div.gallery2 {
    margin: 5px;
    border: 1px solid #ccc;
    background-color: white;  
    width: 320px;
    height:180px;
    }
    
    body
    {
    	width:100%;
    	height:100%;
    }
    select{
    	width:100%;
    	height:100%;

    }
    label
    {
    	font-size:13px;
    }
   
    textarea
    {
    	font-size:24px;
    	width:80%;
    	height:40px;
    }

    @media (min-width: 520px) {

label
    {
    	font-size:17px;
    }
    button {
    background-color: #0099ff; /* Green */
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 8px;
}
}
</style>
<body style="background-color: #008080;" onload="showtype();showcontractor();showcolor();">
	<nav class="navbar navbar-default" >
  
  <div class="container-fluid" style="background-color:#0099ff;">
    
    <div class="navbar-header" style="height:50px;margin-bottom: 10px;">
      
      <a  href="profile.php" style="font-size: 20px;color:white;"> <b> Delhi Metro Rail Corporation </b></a> <a href="#" > <img src="dmrc.png" height="56" width="56"></a>
    </div>
       
    

      </div>
   
</nav>

     <br>
	<div class='container' style="background-color:#e6f2ff;border-radius: 10px;border:3px solid #cecece;vertical-align: middle;">
    <div class="row">
    <div class="col-lg-offset-4  col-xs-12">
      <label  style="color:#0099ff;font-size:20px;border-bottom: 3px solid ;border-color:#0099ff;"><b>FILL THIS FORM TO ADD A NEW VEHICLE</b></label>
     </div></div>
<form action="registration1.2.php" id="myform" method="post" enctype="multipart/form-data">
    <br><br>
		 


 

 <div class="row">
<div class="col-lg-2 col-xs-5"><label>Contractor Agency</label></div><div class="col-lg-3" >
	<select id="contractorid" name="contractor" onchange="showcontractor(this.value)" required> 
	<option value="">Nothing</option>
</select></div></div><br><br>

	<div class="row">
		
<div class="col-lg-2 col-xs-5 "><label>Type</label></div><div class="col-lg-3 ">
    <select id="vehicletypeid" name="vehicletype" onchange="showmake(this.value)" required>
    <option value="">Nothing</option>
    </select>
    </div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
	    <div  class="col-lg-3 ">
	   <input style="display:none;" type="text" name="othertype" id="othertype">
	    </div>
</div>
    <br><br>
    <div class="row">
<div class="col-lg-2 col-xs-5"><label>Make</label></div><div class="col-lg-3">
	<select id="vehiclemakeid" name="vehiclemake" onchange="showmodel(this.value)" required>
	<option value="">Nothing</option>
</select></div>
<div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
 <div class="col-lg-3">
	   <input style="display:none;" type="text" name="othermake" id="othermake">
	    </div>
	    </div><br><br>
<div class="row">
<div class="col-lg-2 col-xs-5"><label>Model</label></div><div class="col-lg-3"><select id="vehiclemodelid" name="vehiclemodel" onchange="showothermodel(this.value)" required>
	<option value="">Nothing</option>
</select></div>
<div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
    <div class="col-xs-12"></div>
 <div class="col-lg-3">
	   <input style="display:none;" type="text" name="othermodel" id="othermodel">
	    </div></div><br><br>

<div class="row">
<div class="col-lg-2 col-xs-5"><label>Parked Since</label></div><div class="col-lg-3"><input type="Date" placeholder="Enter date" name="parkedsince" id="parkedsinceid" required></div></div><br><br>

<div class="row">
<div class="col-lg-2 col-xs-5"><label>Registration No.</label></div><div class="col-lg-5"><textarea  type="text" placeholder="Enter Registration Number" name="registrationno" id="registrationnoid" required></textarea></div></div>

<input type="checkbox" id="toggleenginechassi"  /><label >Tick if registration number is not found</label><br><br>
<div id="enginechassi" style="display:none;">
<div class="row">
	<div class="col-lg-offset-1">
	<label>Enter atleast one of chassi or engine no</label>
</div></div><br>
<div class="row">
<div class="col-lg-2 col-xs-5"><label>Chassi Number.</label></div><div class="col-lg-5"><textarea type="text" placeholder="Enter Chassi Number" name="chassinumber" id="chassinumberid"></textarea></div></div><br><br>

<div class="row">
<div class="col-lg-2 col-xs-5"><label>Engine Number.</label></div><div class="col-lg-5"><textarea type="text" placeholder="Enter Engine Number" name="enginenumber" id="enginenumber" ></textarea>
</div>
</div>
</div>
<br>
		 <div class="row">
<div class="col-lg-2 col-xs-5"><label>Color Of Vehicle</label></div><div class="col-lg-3" >
	 <select name="favcolor" id="colorid" required>
	<option value="">Nothing</option>
</select></div></div><br><br>
<br>
<div class="row">
<div class="col-lg-2 col-xs-12"><label>Car-Front-Nameplate Image:</label></div><div class="col-lg-4" >
	<input type='file' name="image0" id="image0id" accept="image/*" onchange="readURL(this,0);"/>

<div class="gallery" style="display:none" id="imagebox0id">
    <img id="blah0" src="#" alt="your image"  /></div><br>
    <div class="gallery2" id="imagebox0subid">
    </div></div>


</div><br>

<div class="row">
<div class="col-lg-2 col-xs-12"><label>Car-Front Image:</label></div><div class="col-lg-4" >
	<input type='file' name="image1" accept="image/*" onchange="readURL(this,1);"/>
    <div class="gallery" style="display:none" id="imagebox1id" >
    <img id="blah1" src="#" alt="your image"  /></div><br>
    <div class="gallery2" id="imagebox1subid" >
    </div>
</div>
<div class="col-lg-2 col-xs-12"><label>Car-Back Image:</label></div><div class="col-lg-4" >
	<input type='file' name="image2" accept="image/*" onchange="readURL(this,2);" />
         <div class="gallery" style="display:none" id="imagebox2id">
    <img id="blah2" src="#" alt="your image" /></div><br>
        <div class="gallery2" id="imagebox2subid">
    </div>
</div>

</div><br>
<div class="row">
<div class="col-lg-2 col-xs-12"><label>Car-Left Image:</label></div><div class="col-lg-4" >
	  <input type='file' name="image3" accept="image/*" onchange="readURL(this,3);" />
        <div class="gallery" style="display:none" id="imagebox3id">
    <img id="blah3" src="#" alt="your image" /></div><br>
        <div class="gallery2" id="imagebox3subid">
    </div>
</div>
<div class="col-lg-2 col-xs-12"><label>Car-Right Image:</label></div><div class="col-lg-4" >
	<input type='file' name="image4" accept="image/*" onchange="readURL(this,4);" />
        <div class="gallery" style="display:none" id="imagebox4id">
    <img id="blah4" src="#" alt="your image" /></div><br>
           <div class="gallery2" id="imagebox4subid">
    </div>  
</div>

</div><br>

<div class="row">
	<div class="col-lg-4 col-xs-5">
	<label style="color:#0099ff;font-size:20px;border-bottom: 3px solid ;border-color:#0099ff;">Optional</label>
</div>
</div>
 
 <br><br>

 <div class="row">
<div class="col-lg-4 col-xs-5"><label>Any Documents/items found in Car</label></div><div class="col-lg-4"><textarea style="height:100px; width:100%	"  type="text"  name="extrathings" ></textarea></div></div><br>

<div class="row">
<div class="col-lg-4 col-xs-5"><label>Remarks</label></div><div class="col-lg-4 "><textarea type="text" style="height:100px;width:100%		"  name="remarks"></textarea></div></div><br><br>

<br>
<div class="row">
	<div class="col-lg-offset-5	col-lg-5 col-xs-offset-5">
<button type="submit" name="submitme">Submit</button>
</div></div>
<br><br>
</form>
</div>
<script>
$(function(){
     var f=1;
	 $('#toggleenginechassi').change(function () {
      if(f==1)
      { f=0;
      	$("#enginechassi").show();
      }
      else
      {
      	f=1;
      	$("#enginechassi").hide();
      }
     });
    $('#myform').on('submit', function () {
   
    if(($("#registrationnoid").val()=="") &&($("#enginenumberid").val()=="") && ($("#chassinumberid").val()=="")){
         
         
         alert("Enter atleast engine no. or Chassis no. or both");
         return false;
        
    } else {
        return true;
    }
});
});
function showcontractor() {

   
        if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("contractorid").innerHTML = '<option value="">Nothing</option>'+this.responseText;
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        str="<?php echo $station2?>";
        xmlhttp.open("GET","findcontractor.php?q="+str,true);
        xmlhttp.send();
    }

function showtype() {

   
        if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vehicletypeid").innerHTML = '<option value="">Nothing</option>'+this.responseText+'<option value="other">other</option>';
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findtype.php?",true);
        xmlhttp.send();
    }

function showmake(str) {

   
    if(str=="other")
    	{
         $("#othertype").show();
        
    	}
    	else
    	{
    		$("#othertype").hide();
    	}
    if (str == "*") {
        document.getElementById("vehiclemakeid").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vehiclemakeid").innerHTML = '<option value="">Nothing</option>'+this.responseText+'<option value="other">other</option>';
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findmake.php?q="+str,true);
        xmlhttp.send();
    }
}
function showmodel(str) {
     if(str=="other")
    	{
         $("#othermake").show();
        
    	}
      else
    	{
    		$("#othermake").hide();
    	}
    if (str == "*") {
        document.getElementById("vehiclemodelid").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp2 = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp2 = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp2.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("vehiclemodelid").innerHTML = '<option value="">Nothing</option>'+this.responseText+'<option value="other">other</option>';
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp2.open("GET","findmodel.php?q="+str,true);
        xmlhttp2.send();
    }
}
function showothermodel(str)
{
   if(str=="other")
    	{
         $("#othermodel").show();
        
    	}
    	else
    	{
    		$("#othermodel").hide();
    	}
}
function showcolor() {

   
        if (window.XMLHttpRequest) {
// script for browser version above IE 7 and the other popular browsers (newer browsers)
            xmlhttp = new XMLHttpRequest();
        } else {
// script for the IE 5 and 6 browsers (older versions)
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("colorid").innerHTML = '<option value="">Nothing</option>'+this.responseText;
               // console.log(this.responseText);
// get the element in which we will use as a placeholder and space for table
            }
        };
        
        xmlhttp.open("GET","findcolor.php?",true);
        xmlhttp.send();
    }
function readURL(input,n) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log(n);
                reader.onload = function (e) {
                     if(n==0)
                     {
                        $('#imagebox0id').show();
                        $('#imagebox0subid').hide();
                    $('#blah0')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    }
                   if(n==1)
                   {    $('#imagebox1id').show();
                        $('#imagebox1subid').hide();
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                      }
                    if(n==2)
                    {     $('#imagebox2id').show();
                        $('#imagebox2subid').hide();
                    $('#blah2')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    }    
                    if(n==3)
                    {     $('#imagebox3id').show();
                        $('#imagebox3subid').hide();
                    $('#blah3')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    }    
                    if(n==4)
                    {     $('#imagebox4id').show();
                        $('#imagebox4subid').hide();
                    $('#blah4')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    }    
                };

                reader.readAsDataURL(input.files[0]);
            }
}
</script>
</body>
</html>