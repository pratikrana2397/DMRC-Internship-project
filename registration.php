<?php
   // set_time_limit(0);
    $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
       

    $_SESSION['reg']='';
    $_SESSION['engine']='';
    $_SESSION['chassi']='';
    $_SESSION['parkedsince']='';
    
    $_SESSION['extrathings']='';
    $_SESSION['remarks']='';
    $_SESSION['type']='*';
    $_SESSION['make']='*';
    $_SESSION['model']='';
    $_SESSION['code']='';
    $_SESSION['code2']='';
    $_SESSION['code3']='';
    $_SESSION['code4']='';
    $_SESSION['othertype']="";
    $_SESSION['othermake']="";
    $_SESSION['othermodel']="";
    $_SESSION['line']="*";
    $_SESSION['station']="*";
    $_SESSION['contractor']="*";

    $_SESSION['regerror']='0';
    $_SESSION['lineerror']='0';
    $_SESSION['stationerror']='0';
    $_SESSION['contractorerror']='0';
    $_SESSION['typeerror']='0';
    $_SESSION['makeerror']='0';
    $_SESSION['modelerror']='0';
    $_SESSION['parkedsinceerror']='0';
    $_SESSION['image1error']='0';
    $_SESSION['image2error']='0';
    $_SESSION['image3error']='0';
    $_SESSION['image4error']='0';
    $_SESSION['image5error']='0';
    $_SESSION['checkmarkerror']='0';

    $code=$_SESSION['code'];
    $code2=$_SESSION['code2'];
    $code3=$_SESSION['code3'];
    $code4=$_SESSION['code4'];
    $errorreg="";
    $errorline="";
    $errorstation="";
    $errorcontractor="";
    $errortype="";
    $errormake="";
    $errormodel="";
    
$query = "SELECT * FROM color";
$result = mysqli_query($db,$query);
$str="";
while($row=mysqli_fetch_array($result))
{
  $str.= '<option style="background-color:'.$row['colorname'].'" value="' . $row['colorname'] .'">' . $row['colorname'] .'</option>';
}
$query = "SELECT DISTINCT(line) FROM stationtable ";
$result = mysqli_query($db,$query);
$str2="";
while($row=mysqli_fetch_array($result))
{
  $str2.= '<option  value="' . $row['line'] .'">' . $row['line'] .'</option>';
}
if(isset($_POST["submitme"])){

     $_SESSION['reg']=$_POST["registrationno"];
       $_SESSION['engine']=$_POST["enginenumber"];
       $_SESSION['chassi']=$_POST["chassinumber"];
       $_SESSION['parkedsince']=$_POST["parkedsince"];
       $_SESSION['type']=$_POST["vehicletype"];
       $_SESSION['make']=$_POST["vehiclemake"];
       $_SESSION['model']=$_POST["vehiclemodel"];
       $_SESSION['othertype']=$_POST['othertype'];
       $_SESSION['othermake']=$_POST['othermake'];
       $_SESSION['line']=$_POST["line"];
       $_SESSION['station']=$_POST["station"];
       $_SESSION['contractor']=$_POST["contractor"];
       $_SESSION['extrathings']=$_POST["extrathings"];
       $_SESSION['remarks']=$_POST["remarks"];
       $_SESSION['regerror']=$_POST['dummyerrorreg'];
       $_SESSION['lineerror']=$_POST['dummyerrorline'];
       $_SESSION['stationerror']=$_POST['dummyerrorstation'];
       $_SESSION['contractorerror']=$_POST['dummyerrorcontractor'];
       $_SESSION['typeerror']=$_POST['dummyerrortype'];
       $_SESSION['makeerror']=$_POST['dummyerrormake'];
       $_SESSION['modelerror']=$_POST['dummyerrormodel'];
       $_SESSION['parkedsinceerror']=$_POST['dummyerrorparkedsince'];
       $_SESSION['image1error']=$_POST['dummyerrorimage1'];
       $_SESSION['image2error']=$_POST['dummyerrorimage2'];
       $_SESSION['image3error']=$_POST['dummyerrorimage3'];
       $_SESSION['image4error']=$_POST['dummyerrorimage4'];
       $_SESSION['image5error']=$_POST['dummyerrorimage5'];
       $_SESSION['checkmarkerror']=$_POST['dummyerrorcheckmark'];
 


        $query='SELECT DISTINCT Make FROM vehicleData where Type="'.$_POST["vehicletype"]. '"';
       
       

    $result= mysqli_query($db, $query);

while ($row = mysqli_fetch_array($result)) {
    $code.='<option value="' . $row['Make'] .'">' . $row['Make'] .'</option>';
}
       $query2='SELECT DISTINCT Model FROM vehicleData where Make="'.$_POST["vehiclemake"]. '"';
       
      
    $result2= mysqli_query($db, $query2);

while ($row = mysqli_fetch_array($result2)) {
    $code2.='<option value="' . $row['Model'] .'">' . $row['Model'] .'</option>';
}
      $_SESSION['code2']=$code2;
      $_SESSION['code']=$code;
      $query3='SELECT * FROM stationtable where line="'.$_POST["line"]. '"';
       
       
       
    $result3= mysqli_query($db, $query3);

while ($row = mysqli_fetch_array($result3)) {
    $code3.='<option value="' . $row['stationcode'] .'">' . $row['stationname'] .'('.$row['stationcode'].')</option>';
}
       $query4='SELECT DISTINCT contractor FROM stationinfo where stationcode="'.$_POST["station"]. '"';
       
      
    $result4= mysqli_query($db, $query4);

while ($row = mysqli_fetch_array($result4)) {
    $code4.='<option value="' . $row['contractor'] .'">' . $row['contractor'] .'</option>';
}
      $_SESSION['code3']=$code3;
      $_SESSION['code4']=$code4;
   
   if(($_POST["dummytext"]!=''||$_POST["dummytext2"]!=''||$_POST["dummytext3"]!=''||$_POST["dummytext4"]!=''))
   {
       
       

     
    }
    
    else

    { 
       if($_POST["registrationno"]=='')
       {
        
        $_SESSION['regerror']='1';
       }
   else
       {
      
      $_SESSION['regerror']='0';
       }

      
       if($_POST["line"]=='*')
       {
      $_SESSION['lineerror']='1';
       }
   else
       {
      $_SESSION['lineerror']='0';
       }
       if($_POST["station"]=='*')
       {
      $_SESSION['stationerror']='1';
       }
   else
       {
      $_SESSION['stationerror']='0';
       }
       if($_POST["contractor"]=='*')
       {
      $_SESSION['contractorerror']='1';
       }
   else
       {
      $_SESSION['contractorerror']='0';
       }
       if($_POST["vehicletype"]=='*')
       {
      $_SESSION['typeerror']='1';
       }
         else
       {
      $_SESSION['typeerror']='0';
       }
       if($_POST["vehiclemake"]=='*')
       {
      $_SESSION['makeerror']='1';
       }
         else
       {
      $_SESSION['makeerror']='0';
       }
       if($_POST["vehiclemodel"]=='')
       {
      $_SESSION['modelerror']='1';
       }
         else
       {
      $_SESSION['modelerror']='0';
       }
        if($_POST["parkedsince"]=='')
       {
      $_SESSION['parkedsinceerror']='1';
       }
         else
       {
      $_SESSION['parkedsinceerror']='0';
       }
       if(filesize($_FILES["image0"]["tmp_name"])==0)
       {
        $_SESSION['image1error']='1';
       }
       else
       {
        $_SESSION['image1error']='0';
       }
        if(filesize($_FILES["image1"]["tmp_name"])==0)
       {
        $_SESSION['image2error']='1';
       }
       else
       {
        $_SESSION['image2error']='0';
       }
        if(filesize($_FILES["image2"]["tmp_name"])==0)
       {
        $_SESSION['image3error']='1';
       }
       else
       {
        $_SESSION['image3error']='0';
       }
        if(filesize($_FILES["image3"]["tmp_name"])==0)
       {
        $_SESSION['image4error']='1';
       }
       else
       {
        $_SESSION['image4error']='0';
       }
        if(filesize($_FILES["image4"]["tmp_name"])==0)
       {
        $_SESSION['image5error']='1';
       }
       else
       {
        $_SESSION['image5error']='0';
       }
       if($_POST["checkboxname"]!='checked')
       {
      $_SESSION['checkmarkerror']='1';
       }
         else
       {
      $_SESSION['checkmarkerror']='0';
       }

      if(($_POST["registrationno"]!='')&&($_POST["line"]!='*')&&($_POST["station"]!='*')&&($_POST["contractor"]!='*')&&($_POST["vehicletype"]!='*')&&($_POST["vehiclemake"]!='*')&&($_POST["vehiclemodel"]!='')&&($_POST["parkedsince"]!='')&&(filesize($_FILES["image0"]["tmp_name"])!=0)&&(filesize($_FILES["image1"]["tmp_name"])!=0)&&(filesize($_FILES["image2"]["tmp_name"])!=0)&&(filesize($_FILES["image3"]["tmp_name"])!=0)&&(filesize($_FILES["image4"]["tmp_name"])!=0)&&($_POST["checkboxname"]=='checked'))
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
       
       $check = getimagesize($_FILES["image0"]["tmp_name"]);
    if($check !== false){
      $image0 = $_FILES['image0']['tmp_name'];
        $imgContent0 = addslashes(file_get_contents($image0));
     }
        $check = getimagesize($_FILES["image1"]["tmp_name"]);
    if($check !== false){
        $image1 = $_FILES['image1']['tmp_name'];
        $imgContent1 = addslashes(file_get_contents($image1));
          }
        $check = getimagesize($_FILES["image2"]["tmp_name"]);
    if($check !== false){  
        $image2 = $_FILES['image2']['tmp_name'];
        $imgContent2 = addslashes(file_get_contents($image2));
       }
       $check = getimagesize($_FILES["image3"]["tmp_name"]);
    if($check !== false){
        $image3 = $_FILES['image3']['tmp_name'];
        $imgContent3 = addslashes(file_get_contents($image3));
       }
       $check = getimagesize($_FILES["image4"]["tmp_name"]);
    if($check !== false){
        $image4 = $_FILES['image4']['tmp_name'];
        $imgContent4 = addslashes(file_get_contents($image4));
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
        if($_POST["registrationno"]=="")
          $regno="NOT FOUND";
        if($_POST["enginenumber"]=="")
          $engineno="NOT FOUND";
        if($_POST["chassinumber"]=="")
          $chassino="NOT FOUND";
        
        $originalDate = $_POST["parkedsince"];
         $newDate = date("d-m-Y", strtotime($originalDate));
         $_SESSION['reg']='';
        
         //echo $query0;
        // mysqli_query($db, $query0);
         $query0='UPDATE `data` SET `Station`="'.$station2.'",`Contractor`="'.$_POST["contractor"].'",`ParkedSince`="'.$newDate.'",`Type`="'.$type.'",`Make`="'.$make.'",`Model`="'.$model.'",`Reg.No.`="'.$regno.'",`EngineNo`="'.$engineno.'",`ChassisNo`="'.$chassino.'",`color`="'.$_POST["favcolor"].'",`CarNameplatePhoto`="'.$imgContent0.'",`CarFrontPhoto`="'.$imgContent1.'",`CarBackPhoto`="'.$imgContent2.'",`CarLeftPhoto`="'.$imgContent2.'",`CarRightPhoto`="'.$imgContent4.'",`otheritems`="'.$_POST["extrathings"].'",`remarks`="'.$_POST["remarks"].'" WHERE `No`="'.$no.'"';
         mysqli_query($db,$query0);
         //echo $query0;
        // mysqli_query($db, $query0);
         
         /*, function(err,results) {
          
          header('location:kite.php');
          
        });*/
         header('location:parktable.php');
          
       }  
    }
   }
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: white;
    padding-top: 0px;
    padding-bottom: 0px;
    padding-left: 180px;
    padding-right: 180px;
}


* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding-top: 20px;
    padding-bottom: 20px;
    padding-left: 20px;
    padding-right: 20px;
    border: 4px solid black;
    box-sizing: border-box;
    margin: 100px;
    background-color: #E8F8F5;

}
.othertext
{
    
    height: 21px;
    width:120px;
    border: 3px;
    
}
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 20px;
    margin: 10px 0 25px 0;
    display: inline-block;
    border: none;
    background: #CAD2D0;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #04211C;
    color: white;
    padding: 15px 20px;
    margin: 12px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.7;
}

.registerbtn:hover {
    opacity: 1;
}
div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    
    width: 320px;
    height:180px;
}
div.gallery2 {
    margin: 5px;
    border: 1px solid #ccc;
    background-color: white;  
    width: 320px;
    height:180px;
}
/* Add a blue text color to links */
a {
    color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
    background-color: darkblue;
    text-align: center;
}
.container2 {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 18px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.container2 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 20px;
    width: 20px;
    background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container2:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container2 input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.container2 input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.container2 .checkmark:after {
     left: 5px;
    top: 2px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
font.error {
    color: red;
}
</style>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<form action="registration.php" method="POST" enctype="multipart/form-data">
  <div class="container">
    <h1>Add Here For New Vehicle</h1>
    <p>Please fill in this form to add a new vehicle.</p>
    <br>

    <input type="text" name="dummytext3" id="dummyid3" style="display:none">
   <input type="text" name="dummytext4" id="dummyid4"  style="display:none">

  <input type="text" name="dummyerrorreg" id="dummyerrorreg" style="display:none" value="<?php echo $_SESSION['regerror'];?>">
  <input type="text" name="dummyerrorline" id="dummyerrorline" style="display:none" value="<?php echo $_SESSION['lineerror'];?>">
  <input type="text" name="dummyerrorstation" id="dummyerrorstation" style="display:none" value="<?php echo $_SESSION['stationerror'];?>">
  <input type="text" name="dummyerrorcontractor" id="dummyerrorcontractor" style="display:none" value="<?php echo $_SESSION['contractorerror'];?>">
  <input type="text" name="dummyerrortype" id="dummyerrortype" style="display:none" value="<?php echo $_SESSION['typeerror'];?>">
  <input type="text" name="dummyerrormake" id="dummyerrormake" style="display:none" value="<?php echo $_SESSION['makeerror'];?>">
  <input type="text" name="dummyerrormodel" id="dummyerrormodel" style="display:none" value="<?php echo $_SESSION['modelerror'];?>">
  <input type="text" name="dummyerrorparkedsince" id="dummyerrorparkedsince" style="display:none" value="<?php echo $_SESSION['parkedsinceerror'];?>">
  <input type="text" name="dummyerrorimage1" id="dummyerrorimage1" style="display:none" value="<?php echo $_SESSION['image1error'];?>">
  <input type="text" name="dummyerrorimage2" id="dummyerrorimage2" style="display:none" value="<?php echo $_SESSION['image2error'];?>">
  <input type="text" name="dummyerrorimage3" id="dummyerrorimage3" style="display:none" value="<?php echo $_SESSION['image3error'];?>">
  <input type="text" name="dummyerrorimage4" id="dummyerrorimage4" style="display:none" value="<?php echo $_SESSION['image4error'];?>">
  <input type="text" name="dummyerrorimage5" id="dummyerrorimage5" style="display:none" value="<?php echo $_SESSION['image5error'];?>">
  <input type="text" name="dummyerrorcheckmark" id="dummyerrorcheckmark" style="display:none" value="<?php echo $_SESSION['checkmarkerror'];?>">

    <div id="linelabelerrorid"><label ><b>Line No</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="lineid" name="line">
    <option value="*">Nothing</option>
    <?php echo $str2 ?>
    </select>
    </div>
    
    </br> </br>
    


    <div id="stationlabelerrorid"><label ><b>select Station</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="stationid" name="station">
    <option value="*">Nothing</option>
    <?php echo $_SESSION['code3'] ?>
    </select>
    </div>

    </br> </br>
    
    <div id="contractorlabelerrorid"><label ><b>Contactor Agency</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;
    <select id="contractorid" name="contractor">
    <option value="*">Nothing</option>
      <?php echo $_SESSION['code4'] ?>  
      <option value="other">Other</option>
    </select>
    </div>

     </br> </br>
 </br></br>
     <input type="text" name="dummytext" id="dummyid" style="display:none">
   <input type="text" name="dummytext2" id="dummyid2"  style="display:none">
    <div id="typelabelerrorid"><label for="Vehicle Type"><b>Vehicle Type</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="vehicletypeid" name="vehicletype">
    <option value="*">Nothing</option>
    <option value="Motorcycle">MotorCycle</option>
    <option value="Car">Car</option>
    <option value="Truck">Truck</option>
    <option value="Bus">Bus</option>
    <option value="other">Other</option>
    </select>
    </div>

    <textarea id="othertypeid" name="othertype" class="othertext" value="<?php echo $_SESSION['othertype'];?>"></textarea>
    
    </br> </br>
    


    <div id="makelabelerrorid"><label for="Vehicle Make"><b>Vehicle Make</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="vehiclemakeid" name="vehiclemake">
    <option value="*">Nothing</option>
    <?php echo $_SESSION['code'] ?>
    <option value="other">Other</option>
    </select>
    </div>

    <textarea id="othermakeid" name="othermake" class="othertext" value="<?php echo $_SESSION['othermake'];?>"></textarea>
    </br> </br>
    
    <div id="modellabelerrorid"><label for="Vehicle Model"><b>Vehicle Model</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="vehiclemodelid" name="vehiclemodel">
    <option value="">Nothing</option>
      <?php echo $_SESSION['code2'] ?>  
      <option value="other">Other</option>
    </select>
    </div>

    <textarea id="othermodelid" name="othermodel" class="othertext" ></textarea>
    </br> </br>
   
    </br> </br>
    <div id="parkedsincelabelerrorid"><label for="Parked Since"><b>Parked Since</b><sup style="color:red; font-size:20px;">*</sup></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="Date" placeholder="Enter date" name="parkedsince" id="parkedsinceid" value="<?php echo $_SESSION['parkedsince'];?>">
    </div>
   </br> </br>

   </br> </br>
   <div id="reglabelerrorid"><label for="registration number"><b>Vehicle Registration Number</b><sup style="color:red; font-size:20px;">*</sup></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div> <!--<?php// echo $_SESSION["regerrorvar"] ?>-->
  <input type="text" placeholder="Enter Registration Number" name="registrationno" id="registrationnoid" value="<?php echo $_SESSION['reg'];?>">
     <label for="Chassi Number"><b>Chassi Number</b></label>
    <input type="text" placeholder="Enter Chassi Number" name="chassinumber" id="chassinumberid" value="<?php echo $_SESSION['chassi'];?>">
    </br> 


    <label for="Engine Number"><b>Engine Number</b></label>
    <input type="text" placeholder="Enter Engine Number" name="enginenumber" id="enginenumber" value="<?php echo $_SESSION['engine'];?>">
   </br> </br>
   
    <label for="Color Of vehicle"><b>Color Of Vehicle</b><sup style="color:red; font-size:20px;">*</sup></label>
     
     <div class="dropdown">
    
    <select name="favcolor" id="colorid">
  <?php echo $str  ?>
</select>
  </div>


  <!--<input type="color" name="favcolor" id="colorid" value="#f00000">-->
  

       </br> </br>
        </br> </br>
      <strong><u>Car images</u></strong>
      <br><br>
      
      Car-Nameplate Image:<sup style="color:red; font-size:20px;">*</sup>
        <input type='file' name="image0" id="image0id" onchange="readURL(this,0);" /><div id="image1labelerrorid"></div>
    <div class="gallery" style="display:none" id="imagebox0id">
    <img id="blah0" src="#" alt="your image"  /></div><br>
    <div class="gallery2" id="imagebox0subid">
    </div>  <br> <br>
    <div style="float:right; margin-top: 40px; ">
       <label> Car-Back Image:</label>
        <input type='file' name="image2" onchange="readURL(this,2);" /><div id="image3labelerrorid"></div>
         <div class="gallery" style="display:none" id="imagebox2id">
    <img id="blah2" src="#" alt="your image" /></div><br>
        <div class="gallery2" id="imagebox2subid">
    </div>
       
  </div>  <br><br>

       <label > Car-Front Image:<sup style="color:red; font-size:20px;">*</sup></label>
        <input type='file' name="image1" onchange="readURL(this,1);" /><div id="image2labelerrorid"></div>
    <div class="gallery" style="display:none" id="imagebox1id" >
    <img id="blah1" src="#" alt="your image"  /></div><br>
    <div class="gallery2" id="imagebox1subid" >
    </div><br><br>
        <div style="float:right;">
          <label> Car-Right Image:<sup style="color:red; font-size:20px;">*</sup></label>
        <input type='file' name="image4" onchange="readURL(this,4);" /><div id="image5labelerrorid"></div>
        <div class="gallery" style="display:none" id="imagebox4id">
    <img id="blah4" src="#" alt="your image" /></div><br>
           <div class="gallery2" id="imagebox4subid">
    </div>  
         <br><br>
  </div>

          <label> Car-Left Image:<sup style="color:red; font-size:20px;">*</sup></label>
        <input type='file' name="image3" onchange="readURL(this,3);" /><div id="image4labelerrorid"></div>
        <div class="gallery" style="display:none" id="imagebox3id">
    <img id="blah3" src="#" alt="your image" /></div><br>
        <div class="gallery2" id="imagebox3subid">
    </div>
                </br>
      <strong><u>Optional</u></strong>
      <br><br>
    
    <label ><b>Any Documents/items found in Car</b></label>
  <input type="text" placeholder="Enter Any Documents/items found in Car" name="extrathings" value="<?php echo $_SESSION['extrathings'];?>">
    </br>

   
    <label ><b>Remarks</b></label>
  <input type="text" placeholder="Enter Remarks" name="remarks" value="<?php echo $_SESSION['remarks'];?>">
    </br> 
   
    
    
    <input name="checkboxname" value="0" type="hidden">
    <br><br>
    <div id="checkmarklabelerrorid"><label class="container2">Data entered by me is correct<sup style="color:red; font-size:20px;">*</sup>
  <input type="checkbox" name="checkboxname" value="checked">
  <span class="checkmark"></span>
</label></div>

    <br><br>
    <button type="submit" class="registerbtn" name="submitme" id="submitme" > Register </button>
  </div>
   
  </form>
<script type="text/javascript">
         $(document).ready(function() {
         
         
            if($("#dummyerrorreg").val()=='1')
            {
              
              $("#reglabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Registration Number</font><br>');
            }
            if($("#dummyerrorline").val()=='1')
            {
              
              $("#linelabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Line Number</font><br>');
            }
            if($("#dummyerrorstation").val()=='1')
            {
              
              $("#stationlabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Station</font><br>');
            }
            if($("#dummyerrorcontractor").val()=='1')
            {
              
              $("#contractorlabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Contractor</font><br>');
            }
            if($("#dummyerrortype").val()=='1')
            {
              
              $("#typelabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Vehicle Type</font><br>');
            }
            if($("#dummyerrormake").val()=='1')
            {
              
              $("#makelabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Vehicle Make</font><br>');
            }
            if($("#dummyerrormodel").val()=='1')
            {
              
              $("#modellabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Vehicle Model</font><br>');
            }
            if($("#dummyerrorparkedsince").val()=='1')
            {
              
              $("#parkedsincelabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Parked Since Date</font><br>');
            }
            if($("#dummyerrorimage1").val()=='1')
            {
              
              $("#image1labelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter image</font><br>');
            }
             if($("#dummyerrorimage2").val()=='1')
            {
              
              $("#image2labelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter image</font><br>');
            } if($("#dummyerrorimage3").val()=='1')
            {
              
              $("#image3labelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter image</font><br>');
            } if($("#dummyerrorimage4").val()=='1')
            {
              
              $("#image4labelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter image</font><br>');
            } if($("#dummyerrorimage5").val()=='1')
            {
              
              $("#image5labelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter image</font><br>');
            }
            if($("#dummyerrorcheckmark").val()=='1')
            {
              
              $("#checkmarklabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Tick the checkmark</font><br>');
            }

            $("#vehicletypeid").val("<?php echo $_SESSION['type'];?>");
    $("#vehiclemakeid").val("<?php echo $_SESSION['make'];?>");
     $("#vehiclemodelid").val("<?php echo $_SESSION['model'];?>");

      $("#othertypeid").val("<?php echo $_SESSION['othertype'];?>");
       $("#othermakeid").val("<?php echo $_SESSION['othermake'];?>");
        $("#othermodelid").val("<?php echo $_SESSION['othermodel'];?>");

        $("#lineid").val("<?php echo $_SESSION['line'];?>");
    $("#stationid").val("<?php echo $_SESSION['station'];?>");
     $("#contractorid").val("<?php echo $_SESSION['contractor'];?>");

     if($("#vehicletypeid").val()=="other")
    {
        $("#othertypeid").show();
    }
    else
    {
        $("#othertypeid").hide();
    }

    if($("#vehiclemakeid").val()=="other")
    {
        $("#othermakeid").show();
    }
    else
    {
        $("#othermakeid").hide();
    }

    if($("#vehiclemodelid").val()=="other")
    {
        $("#othermodelid").show();
    }
    else
    {
        $("#othermodelid").hide();
    }
    
         $("#vehicletypeid").change(function() {
    
    var el = $(this) ;

    $("#dummyid").val(el.val());
    $("#submitme").trigger('click');
   
   
   
  });
        /* $("#vehiclemakeid").on("click change", function(e) {
             $("#dummyid").val($("#vehicletypeid").val());  
    $("#submitme").trigger('click');
         
});*/
       $("#vehiclemakeid").change(function() {

    var el = $(this) ;

    $("#dummyid2").val(el.val());
    $("#submitme").trigger('click');
    
   
   
  });
       $("#vehiclemodelid").change(function() {

    
    if($("#vehiclemodelid").val()=="other")
    {
        $("#othermodelid").show();
    }
    else
    {
        $("#othermodelid").hide();
    }
   
   
  });
       $("#lineid").change(function() {
    
    var el = $(this) ;
     
    $("#dummyid3").val(el.val());
    $("#submitme").trigger('click');
   
   
   
  });
        /* $("#vehiclemakeid").on("click change", function(e) {
             $("#dummyid").val($("#vehicletypeid").val());  
    $("#submitme").trigger('click');
         
});*/
       $("#stationid").change(function() {

    var el = $(this) ;

    $("#dummyid4").val(el.val());
    $("#submitme").trigger('click');
    
   
   
  });
      });
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
