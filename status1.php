<?php
session_start(); 

$no= $_SESSION['no'];
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
     $frontphoto=$row["CarFrontPhoto"];
     $backphoto=$row["CarBackPhoto"];
     $leftphoto=$row["CarLeftPhoto"];
     $rightphoto=$row["CarRightPhoto"];
  }  
?>
<?php
 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
 if(isset($_POST["dummysubmit"])){
 	if($_POST["dummy13"]=='NEED TO CHECK THEFT')
 	{
 	$query='UPDATE `data` SET `Reg.No.`="'.$_POST["dummy1"].'",`EngineNo`="'.$_POST["dummy2"].'",`ChassisNo`="'.$_POST["dummy3"].'",`Status`="'.'NEED TO CHECK THEFT'.'",`Purchasedate`="'.$_POST["dummy8"].'",`body`="'.$_POST["dummy9"].'",`registerlocation`="'.$_POST["dummy10"].'",`ownername`="'.$_POST["dummy11"].'",`owneraddress`="'.$_POST["dummy12"].'" WHERE `No`="'.$no.'"';
    }
    else
    {
    $query='UPDATE `data` SET `Status`="'.'NEED MORE INFO'.'" WHERE `No`="'.$no.'"';
    }
 	 $result= mysqli_query($db, $query);
 	 header("location:parktable.php");
 }
?>
<!DOCTYPE html>
<html>
<head>
<style type="text/css">

#statuslabelid
{
	position:fixed;
	left :30px;
	top:30px;
	font-size: 35px;
}
#statusid
{
	position:fixed;
	left :130px;
	top:30px;
	font-size: 35px;
}
#reglabelid
{
	position:fixed;
	left :80px;
	top:110px;
	font-size: 20px;
}
#regid
{
	position:fixed;
	left :230px;
	top:110px;
	font-size: 20px;
}
#enginelabelid
{
	position:fixed;
	left :80px;
	top:150px;
	font-size: 20px;
}
#engineid
{
	position:fixed;
	left :230px;
	top:150px;
	font-size: 20px;
}
#chassilabelid
{
	position:fixed;
	left :80px;
	top:190px;
	font-size: 20px;
}
#chassiid
{
	position:fixed;
	left :230px;
	top:190px;
	font-size: 20px;
}
#reglabelid2
{
	position:fixed;
	right :680px;
	top:210px;
	font-size: 20px;
}
#regid2
{
	position:fixed;
	left :1120px;
	top:210px;
	font-size: 20px;
}
#enginelabelid2
{
	position:fixed;
	right :680px;
	top:250px;
	font-size: 20px;
}
#engineid2
{
	position:fixed;
	left :1120px;
	top:250px;
	font-size: 20px;
}
#chassilabelid2
{
	position:fixed;
	right :680px;
	top:290px;
	font-size: 20px;
}
#chassiid2
{
	position:fixed;
	left :1120px;
	top:290px;
	font-size: 20px;
}
#datalabelid
{
	position:fixed;
	right :260px;
	top:10px;
	font-size: 25px;
}
#regid3
{
	position:fixed;
	left :1400px;
	top:210px;
	font-size: 20px;
}
#engineid3
{
	position:fixed;
	left :1400px;
	top:250px;
	font-size: 20px;
}
#chassiid3
{
	position:fixed;
	left :1400px;
	top:290px;
	font-size: 20px;
}
#dataid
{
	position:fixed;
	right :120px;
	top:20px;
	font-size: 40px;
	margin-top: 30px;
}

#verdictid
{
	position:fixed;
	left :150px;
	top:250px;
	font-size: 25px;
}
#submitid
{
	position:fixed;
	right :300px;
	top:120px;
	font-size: 20px;
}
#refreshid
{
	position:fixed;
	right :20px;
	top:60px;
	font-size: 17px;
}
#saveid
{
	position:fixed;
	left :180px;
	top:310px;
	font-size: 20px;
}
#ourdataid
{
	position:fixed;
	left :1120px;
	top:160px;
	font-size: 30px;
}
#onlinedataid
{
	position:fixed;
	left :1400px;
	top:160px;
	font-size: 30px;
}
#typelabelid2
{
	position:fixed;
	right :680px;
	top:330px;
	font-size: 20px;
}
#makelabelid2
{
	position:fixed;
	right :680px;
	top:370px;
	font-size: 20px;
}
#modellabelid2
{
	position:fixed;
	right :680px;
	top:410px;
	font-size: 20px;
}
#colorlabelid2
{
	position:fixed;
	right :680px;
	top:450px;
	font-size: 20px;
}
#arealabelid2
{
	position:fixed;
	right :680px;
	top:490px;
	font-size: 20px;
}
#typeid2
{
	position:fixed;
	left :1120px;
	top:330px;
	font-size: 20px;
}
#makeid2
{
	position:fixed;
	left :1120px;
	top:370px;
	font-size: 20px;
}
#modelid2
{
	position:fixed;
	left :1120px;
	top:410px;
	font-size: 20px;
}

#colorid2
{
	position:fixed;
	left :1120px;
	top:450px;
	font-size: 20px;
}
#areaid2
{
	position:fixed;
	left :1120px;
	top:490px;
	font-size: 20px;
}
#typeid3
{
	position:fixed;
	left :1400px;
	top:330px;
	font-size: 20px;
}
#makeid3
{
	position:fixed;
	left :1400px;
	top:370px;
	font-size: 20px;
}
#modelid3
{
	position:fixed;
	left :1400px;
	top:410px;
	font-size: 20px;
}
#colorid3
{
	position:fixed;
	left :1400px;
	top:450px;
	font-size: 20px;
}
#areaid3
{
	position:fixed;
	left :1400px;
	top:490px;
	font-size: 20px;
}
#otheronlinedataid
{
	position:fixed;
	left :1400px;
	top:550px;
	font-size: 20px;
}
#purchasedatelabelid2
{
	position:fixed;
	left :1400px;
	top:590px;
	font-size: 20px;
}
#bodylabelid2
{
	position:fixed;
	left :1400px;
	top:640px;
	font-size: 20px;
}
#purchasedateid3
{
	position:fixed;
	left :1550px;
	top:590px;
	font-size: 20px;
}
#bodyid3
{
	position:fixed;
	left :1550px;
	top:640px;
	font-size: 20px;
}
#frontphotoid
{
	position:fixed;
	left :800px;
	top:540px;
	font-size: 20px;
}
#backphotoid
{
	position:fixed;
	left :1050px;
	top:540px;
	font-size: 20px;
}
#leftphotoid
{
	position:fixed;
	left :800px;
	top:700px;
	font-size: 20px;
}
#rightphotoid
{
	position:fixed;
	left :1050px;
	top:700px;
	font-size: 20px;
}				
</style>
<title></title>
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
<label id="statuslabelid">Status:</label><label id="statusid"></label>
<label id="reglabelid">Registration No:</label><label id="regid"></label>
<label id="enginelabelid">Engine No:</label><label id="engineid"></label>
<label id="chassilabelid">Chassi No:</label><label id="chassiid"></label>
<label id="datalabelid">Enter Data here</label>
<input type="text" id="dataid">
<div id="verdictid">
<select style="width: 200px; height:26px; font-size: 20px;" id="selectchoiceid">
<option value='nothing'>nothing</option>
<option value="found">Found & Matched</option>
<option value="notfound">Not Found</option>
</select>
</div>
<button id="submitid" onclick="submitdatafun()">Submit</button>
<button id="refreshid" onclick="refreshdatafun()">Refresh</button>

<label id="ourdataid" style="display:none;"><u>Our Data</u></label><label style="display:none;" id="onlinedataid"><u>Online Data</u></label>

<label id="reglabelid2" style="display:none;">Registration No:</label><label id="regid2" style="display:none;"></label><label id="regid3"></label>
<label id="enginelabelid2" style="display:none;">Engine No:</label><label id="engineid2" style="display:none;"></label><label id="engineid3"></label>
<label id="chassilabelid2" style="display:none;">Chassi No:</label><label id="chassiid2" style="display:none;"></label><label id="chassiid3"></label>
<label id="typelabelid2" style="display:none;">Type:</label><label id="typeid2" style="display:none;"></label><label id="typeid3"></label>
<label id="makelabelid2" style="display:none;">Make:</label><label id="makeid2" style="display:none;"></label><label id="makeid3"></label>
<label id="modellabelid2" style="display:none;">Model:</label><label id="modelid2" style="display:none;"></label><label id="modelid3"></label>
<label id="colorlabelid2" style="display:none;">Color:</label><input type="color" name="favcolor" id="colorid2" readonly disabled style="display:none;" value="<?php echo $color;?>"></label><label id="colorid3"></label>

<label id="otheronlinedataid" style="display:none;"><u>Additional Details</u></label>
<label id="purchasedatelabelid2" style="display:none;">Purchase Date:</label><label id="purchasedateid3" style="display:none;"></label>
<label id="bodylabelid2" style="display:none;">Body:</label><label id="bodyid3" style="display:none;"></label>
<label id="arealabelid2" style="display:none;">Station/Area Registered:</label><label id="areaid2" style="display:none;"></label><label id="areaid3"></label>
 
<img id="frontphotoid" style="display:none;"src="data:image/jpeg;base64,<?php echo base64_encode($frontphoto); ?>" width="220"/>
<img id="backphotoid" style="display:none;"src="data:image/jpeg;base64,<?php echo base64_encode($backphoto); ?>" width="220"/>
<img id="leftphotoid" style="display:none;"src="data:image/jpeg;base64,<?php echo base64_encode($leftphoto); ?>" width="220"/>
<img id="rightphotoid" style="display:none;"src="data:image/jpeg;base64,<?php echo base64_encode($rightphoto); ?>" width="220"/>

<button id="saveid" onclick="presavedata()">Save</button>
<form action="status1.php" method="post" style="display:none;">
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
	<button type="submit" name="dummysubmit" id="dummysubmitid"</button>
</form>
<script type="text/javascript">
	var regno,engineno,chassisno,type,make,model,color,purchasedate,registerlocation,body,ownername,owneraddress;
	$(function(){
		document.getElementById('regid').innerHTML="<?php echo $regno;?>";

		if("<?php echo $engineno;?>"!="")
		document.getElementById('engineid').innerHTML="<?php echo $engineno;?>";
		else
		document.getElementById('engineid').innerHTML="NOT AVAILABLE";
        
        if("<?php echo $chassino;?>"!="")
		document.getElementById('chassiid').innerHTML="<?php echo $chassino;?>";
		else
		document.getElementById('chassiid').innerHTML="NOT AVAILABLE";

	    document.getElementById('regid2').innerHTML="<?php echo $regno;?>";

		if("<?php echo $engineno;?>"!="")
		document.getElementById('engineid2').innerHTML="<?php echo $engineno;?>";
		else
		document.getElementById('engineid2').innerHTML="NOT AVAILABLE";
        
        if("<?php echo $chassino;?>"!="")
		document.getElementById('chassiid2').innerHTML="<?php echo $chassino;?>";
		else
		document.getElementById('chassiid2').innerHTML="NOT AVAILABLE";

	    document.getElementById('typeid2').innerHTML="<?php echo $type;?>";
	    document.getElementById('makeid2').innerHTML="<?php echo $make;?>";
	    document.getElementById('modelid2').innerHTML="<?php echo $model;?>";
	     document.getElementById('areaid2').innerHTML="<?php echo $station;?>";

        document.getElementById('statusid').innerHTML="<?php echo $status;?>";

        
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
       document.getElementById('areaid3').innerHTML=ans;
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
	}
	function refreshdatafun()
	{
		$("#dataid").val('');

	}
	function presavedata()
	{
		console.log("joker"+$("#selectchoiceid").val());
         if($("#selectchoiceid").val()=="found")
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
        $("#dummy13id").val("NEED TO CHECK THEFT");
		$("#dummysubmitid").trigger('click');
         	}
         else if($("#selectchoiceid").val()=="notfound")
         {
         	$("#dummy13id").val("NEED more Details");
         	$("#dummysubmitid").trigger('click');
         }
         else
         {
         	window.location.href = "parktable.html";
         }
	}
	function savedata()
	{
		
		
	}
	
</script>
</body>
</html>