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
     $frontphoto=$row["CarFrontPhoto"];
     $backphoto=$row["CarBackPhoto"];
     $leftphoto=$row["CarLeftPhoto"];
     $rightphoto=$row["CarRightPhoto"];
     $contractor=$row["Contractor"];
  }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
 body{
 font-family: Arial, Helvetica, sans-serif;
    background-color: #054B25       ;
    padding-top: 30px;
    padding-bottom: 30px;
    padding-left: 20px;
    padding-right: 20px; 
}

* {
    box-sizing: border-box;
}


.container1{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: #E9EFEC    ;
    border-radius: 5px;
    font-size: 18px;
    color: #000000;
    width: 800px;
    float: left;
}



.container2{
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 10px;
    padding-right: 10px;
    background-color: #E9EFEC    ;
    border-radius: 5px;
    font-size: 18px;
    color: #000000;
    width: 800px;
    float: right;
}

h1{

  color: #2C066F     ;
}

</style>
 </head>
<body>

<div class="container1">
  <h1><center><b>Vehicle Details</b></center></h1>
  <form class="form-horizontal" action="/action_page.php">
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Vehicle ID:</label>
      <label class="control-label col-sm-2" for="pwd" style="font-weight:normal"><?php echo $no ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Station:</label>
      <label class="control-label col-sm-2" for="pwd" style="font-weight:normal"><?php echo $station ?></label>
     </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Registration Number:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $regno ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Engine Number:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $engineno ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Chassis Number:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $chassino ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Type:</label><label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $type ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Make:</label><label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $make ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Model:</label
        ><label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $model ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Color:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $color ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Contractor:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $contractor ?></label>
     </div>
     <div class="form-group">
     	 <label class="control-label col-sm-5" for="pwd">frontimage</label>
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($frontphoto); ?>" width="220"/>
     </div>
       <div class="form-group">
     	 <label class="control-label col-sm-5" for="pwd">backimage</label>
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($backphoto); ?>" width="220"/>
     </div>
   </br>
     <div class="form-group">
     	 <label class="control-label col-sm-5" for="pwd">leftimage</label>
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($leftphoto); ?>" width="220"/>
     </div>
     <div class="form-group">
     	 <label class="control-label col-sm-5" for="pwd">rightimage</label>
       <img id="frontphotoid" style=""src="data:image/jpeg;base64,<?php echo base64_encode($rightphoto); ?>" width="220"/>
     </div>
     <button type="button" class="btn btn-primary btn-lg">Edit</button>
     <button type="button" class="btn btn-danger btn-lg">Remove</button>
    <button type="button" class="btn btn-success btn-lg">Change Status</button>
    <!--<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>-->
  </form>
</div>
<!--<div class="container2">
  <h1><center><b>Online Details</b></center></h1>
  <form class="form-horizontal" action="/action_page.php">
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Vehicle ID:</label>
      <label class="control-label col-sm-2" for="pwd" style="font-weight:normal"><?php echo $no ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Station:</label>
      <label class="control-label col-sm-2" for="pwd" style="font-weight:normal"><?php echo $station ?></label>
     </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Registration Number:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $regno ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Engine Number:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $engineno ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Chassis Number:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $chassino ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Type:</label><label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $type ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Make:</label><label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $make ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Model:</label
        ><label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $model ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Color:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $color ?></label>
     </div>
     <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Contractor:</label>
      <label class="control-label col-sm-1" for="pwd" style="font-weight:normal"><?php echo $contractor ?></label>
     </div>
   
    
    <!--<div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>-->
  </form>
</div>

</body>
</html>

