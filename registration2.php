<?php
if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
       
        /*
         * Insert image data into database
         */
        
        //DB details
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'dmrc_park';
        
        //Create connection and select DB
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        
        // Check connection
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
        //Insert image content into database
        $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
        
    }else{
        echo "Please select an image file to upload.";
    }
}
?>
<?php
    $db = mysqli_connect('localhost', 'root', '', 'userparking');
       

    $_SESSION['reg']='';
    $_SESSION['engine']='';
    $_SESSION['chassi']='';
    $_SESSION['parkedsince']='';
    $_SESSION['ownername']='';
    $_SESSION['ownerphoneno']='';
    $_SESSION['extrathings']='';
    $_SESSION['remarks']='';
    $_SESSION['type']='';
    $_SESSION['make']='';
    $_SESSION['model']='';
    $_SESSION['code']='';
    $_SESSION['code2']='';
    $_SESSION['code3']='';
    $_SESSION['code4']='';
    $_SESSION['othertype']="";
    $_SESSION['othermake']="";
    $_SESSION['othermodel']="";
    $_SESSION['line']="";
    $_SESSION['station']="";
    $_SESSION['contractor']="";
    $code=$_SESSION['code'];
    $code2=$_SESSION['code2'];
    $code3=$_SESSION['code3'];
    $code4=$_SESSION['code4'];
    
if(isset($_POST["submitme"])){
    
   if($_POST["dummytext"]!=''||$_POST["dummytext2"]!=''||$_POST["dummytext3"]!=''||$_POST["dummytext4"]!=''){
       
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
       $_SESSION['ownername']=$_POST["ownername"];
       $_SESSION['ownerphoneno']=$_POST["ownerphoneno"];
       $_SESSION['extrathings']=$_POST["extrathings"];
       $_SESSION['remarks']=$_POST["remarks"];
       
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
      $query3='SELECT DISTINCT station FROM stationinfo where line="'.$_POST["line"]. '"';
       
       
       
    $result3= mysqli_query($db, $query3);

while ($row = mysqli_fetch_array($result3)) {
    $code3.='<option value="' . $row['station'] .'">' . $row['station'] .'</option>';
}
       $query4='SELECT DISTINCT contractor FROM stationinfo where station="'.$_POST["station"]. '"';
       
      
    $result4= mysqli_query($db, $query4);

while ($row = mysqli_fetch_array($result4)) {
    $code4.='<option value="' . $row['contractor'] .'">' . $row['contractor'] .'</option>';
}
      $_SESSION['code3']=$code3;
      $_SESSION['code4']=$code4;
    }
    
    else
    { 
         $_SESSION['reg']='';
         
         header("location:leb.php");
    }
   }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

body {
    font-family: Arial, Helvetica, sans-serif;
    background-color: #134B51     ;
    padding-top: 70px;
    padding-bottom: 50px;
    padding-left: 200px;
    padding-right: 200px;
    color: #562D04;
}


* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {

    padding-top: 20px;
    padding-bottom: 40px;
    padding-left: 60px;
    padding-right: 60px;
    background-color: #959C9D  ;
    border-radius: 20px;
    font-size: 17px;

}

.othertext
{
  
    height: 21px;
    width:120px;
    border: 3px;
    
}
/* Full-width input fields */
p{
 color: #000000 ; 
}

mark { 
    background-color: yellow ;
    color: black;
}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 15px;
    margin: 10px 0 25px 0;
    display: inline-block;
    border: 1px solid black;
    background: white;
    border-radius: 5px;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: white;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}



div.gallery {
    margin: 5px;
    border: 1px solid #ccc;
    
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

.jumbotron
{
padding-bottom: 2px;
padding-top: 2px;
padding-left: 5px;
padding-right: 5px;

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

.btnbtn-primary{
  padding-top: 5px;
  padding-bottom: 5px;
  padding-left: 5px;
  padding-right: 5px;

}


.jumbotron{
background-color: #959C9D      ;

}

</style>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a href="dashboard.php" class="navbar-brand"> <b> Delhi Metro Rail Corporation </b> <a href="#" > <img src="dmrc.png" height="50" width="50"></a>
    </div>
  </div>
</nav>


<form action="registration2.php" method="POST" enctype="multipart/form-data">
  <div class="container">

    
    <h1><b>Add Here For New Vehicle</b></h1>
  </br>

  <h4 class="bg-primary">Please fill in this form to add a new vehicle.</h4>
    
    <br>

    <input type="text" name="dummytext3" id="dummyid3" style="display:none">
   <input type="text" name="dummytext4" id="dummyid4"  style="display:none">
    <label>Line No</label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

    <select id="lineid" name="line">
    <option value="">Nothing</option>
    <option value="line1">line1</option>
    <option value="line2">line2</option>
    <option value="line3">line3</option>
    <option value="line4">line4</option>
    <option value="line5">line5</option>
    <option value="line6">line6</option>
    <option value="line7">line7</option>
    <option value="line8">line8</option>
    <option value="ael">ael</option>
    </select>
    
    </br> </br>

    <label ><b>Select Station</b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="stationid" name="station">
    <option value="">Nothing</option>
    <?php echo $_SESSION['code3'] ?>
    </select>
    
    </br> </br>
    
    <label ><b>Contactor Agency</b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="contractorid" name="contractor">
    <option value="">Nothing</option>
      <?php echo $_SESSION['code4'] ?>  
      <option value="other">Other</option>
    </select>
     </br> </br>

     <input type="text" name="dummytext" id="dummyid" style="display:none">
   <input type="text" name="dummytext2" id="dummyid2"  style="display:none">
    <label for="Vehicle Type"><b>Vehicle Type</b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="vehicletypeid" name="vehicletype">
    <option value="">Nothing</option>
    <option value="Motorcycle">MotorCycle</option>
    <option value="Car">Car</option>
    <option value="Truck">Truck</option>
    <option value="Bus">Bus</option>
    <option value="other">Other</option>
    </select>
    <textarea id="othertypeid" name="othertype" class="othertext" value="<?php echo $_SESSION['othertype'];?>"></textarea>
    </br> </br>
    


    <label for="Vehicle Make"><b>Vehicle Make</b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="vehiclemakeid" name="vehiclemake">
    <option value="">Nothing</option>
    <?php echo $_SESSION['code'] ?>
    <option value="other">Other</option>
    </select>
    <textarea id="othermakeid" name="othermake" class="othertext" value="<?php echo $_SESSION['othermake'];?>"></textarea>
    </br> </br>
    
    <label for="Vehicle Model"><b>Vehicle Model</b></label>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <select id="vehiclemodelid" name="vehiclemodel">
    <option value="">Nothing</option>
      <?php echo $_SESSION['code2'] ?>  
      <option value="other">Other</option>
    </select>
    <textarea id="othermodelid" name="othermodel" class="othertext" ></textarea>
    </br> </br>


    <div class="form-group">
      <label for="text"> Vehicle Registration Number </label> <input type="file" name="pic" accept="image/*">
      <input type="text" class="form-control" id="text" placeholder="Enter Registration Number">
    </div>

<div class="form-group">
      <label for="text"> Chasi Number </label>
      <input type="text" class="form-control" id="text" placeholder="Enter Chasi Number">
    </div>

    <div class="form-group">
      <label for="text"> Engine Number </label>
      <input type="text" class="form-control" id="text" placeholder="Enter Engine Number">
    </div>


   <label for="Parked Since"><b>Parked Since</b></label>
    &ensp;
    <input type="date" placeholder="Enter date" name="parked since" >
   </br> </br>

 
  <label for="Color Of vehicle"><b>Color Of Vehicle</b></label>
    <input type="color" name="favcolor" value="#ff0000">
  <input type="submit">
    &ensp;
  </br> </br>

    <strong><b> Car images </b></strong>
      <br><br>
       <b> Car-Front Image: </b>
        <input type='file' name="image" onchange="readURL(this,1);" />
    <div class="gallery">
    <img id="blah1" src="#" alt="Choose image"  /></div><br><br><br>
    
    <b>   Car-Back Image: </b>
        <input type='file' name="image" onchange="readURL(this,2);" />
         <div class="gallery">
    <img id="blah2" src="#" alt="Choose image" /></div><br><br><br>
        
      <b>   Car-Left Image: </b>
        <input type='file' name="image" onchange="readURL(this,3);" />
        <div class="gallery">
    <img id="blah3" src="#" alt="Choose image" /></div><br><br><br>
        
     <b>    Car-Right Image: </b>
        <input type='file' name="image" onchange="readURL(this,4);" />
        <div class="gallery">
    <img id="blah4" src="#" alt="Choose image" /></div>
              
               </br> </br>
               <p><b> <mark>Optional</mark></b></p>
     
      <br>


      <div class="form-group">
      <label for="text"> Any other information </label>
      <input type="text" class="form-control" id="text" placeholder="Enter Any Documents/items found in Car" name="extrathings" value="<?php echo $_SESSION['extrathings'];?>">
    </div>


    <div class="form-group">
      <label for="text"> Remarks </label>
      <input type="text" class="form-control" id="text" placeholder="Enter Remarks">
    </div>
   
  
    <label class="container2">Data entered is correct
  <input type="checkbox" checked="checked">
  <span class="checkmark"></span>
</label>

    <br>
      <button type="button" class="btn btn-primary btn-lg" >Add Record </button>
    
   
  </form>
<script type="text/javascript">
         $(document).ready(function() {
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
                   if(n==1)
                    $('#blah1')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    if(n==2)
                    $('#blah2')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    if(n==3)
                    $('#blah3')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                    if(n==4)
                    $('#blah4')
                        .attr('src', e.target.result)
                        .width(320)
                        .height(180);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
