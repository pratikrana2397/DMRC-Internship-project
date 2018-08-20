<?php
require_once('includes/load.php');
page_require_level(2);

?>
<?php

 if(isset($_POST["submitme"]))
    {
      echo "hello";
      $_SESSION["department"]=$_POST["department2"];
      $_SESSION["receivername"]=$_POST["receivername2"];
      $_SESSION["receiveraddress"]=$_POST["receiveraddress2"];
      $_SESSION["subjectofletter"]=$_POST["subjectofletter2"];
      $_SESSION["bodyofletter"]=$_POST["bodyofletter2"];
      $_SESSION['sendername']=$_POST['sendername2'];
      $_SESSION["senderdesignation"]=$_POST["senderdesignation2"];
      $_SESSION["dmrccopyto"]=$_POST["dmrccopyto2"];
      $_SESSION["policecopyto"]=$_POST["policecopyto2"];
       // echo $_POST["policecopyto2"];
      header("location: policereport.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Police Report</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    textarea {
    width:300px;
    font-size: 1px;

}

  </style>
</head>
<body>

<div class="container">
  <h2 style="color:#4dd2ff">Enter Letter Details</h2><br>
  <form action="policereport0.php" method="POST" id="policereportid" name="policereportname">
    <div class="form-group">
      <input type="checkbox" id="togglecheckdepartment" checked name="check" /><label for="department">Department</label>
      <textarea type="text" style="height: 45px" class="form-control input-lg form-control-sm" id="department" placeholder="Enter Name of the person to whom you are writing" name="department2">No. DMRC/O&M/Ops/Parking Cell/48 hrs/ <?php echo date("m/Y");?></textarea>
    </div>
    <div class="form-group">
      <input type="checkbox" id="togglecheckreceivername" checked name="check" /><label for="receivername">Name of the person to whom you are writing</label>
      <textarea type="text" style="height: 45px" class="form-control input-lg form-control-sm" id="receivername" placeholder="Enter Name of the person to whom you are writing" name="receivername2">DCP/Delhi Police (Metro)</textarea>
    </div>
    <div class="form-group" >
      <input type="checkbox" id="togglecheckreceiveraddress" checked name="check" /><label for="receiveraddress">Address of the person to whom you are writing</label>
      <textarea type="text" style="height: 90px" class="form-control input-lg" id="receiveraddress" placeholder="Enter Address of the person to whom you are writing" name="receiveraddress2">Metro Police Station,
Kashmere Gate,
Delhi-110006.</textarea>
    </div>
     <div class="form-group" >
      <input type="checkbox" id="togglechecksubjectofletter" checked name="check" /><label for="subjectofletter">Subject Of The Letter</label>
      <textarea type="text" style="height: 60px" class="form-control input-lg" id="subjectofletter" placeholder="Enter Address of the person to whom you are writing" name="subjectofletter2">Vehicles parked in the Metro Station parking lots for more than 48 hours on the basis of census taken on <?php echo date("d.m.Y");?></textarea>
    </div>
     <div class="form-group" >
      <input type="checkbox" id="togglecheckbodyofletter" checked name="check" /><label for="bodyofletter">Body of the Letter</label>
      <textarea type="text" style="height: 250px" class="form-control input-lg" id="bodyofletter" placeholder="Enter Address of the person to whom you are writing" name="bodyofletter2">As per details recieved from metro station submitted by parking contractors,the list of vehicles parked for more than 48 hours in the metro station parking lots as on <?php echo date("d.m.Y");?> is attached herewith.You are requested to take necessary action in this regard.</textarea>
    </div>
    <div class="form-group">
       <input type="checkbox" id="togglechecksendername" checked name="check" /><label for="sendername">Name of the person to signature the letter</label>
      <textarea type="text" style="height: 45px" class="form-control input-lg" id="sendername" placeholder="Enter Name of the person to signature the letter" name="sendername2">Sankalp Devandra</textarea>
    </div>
    <div class="form-group">
      <input type="checkbox" id="togglechecksenderdesignation" checked name="check" /><label for="senderdesignation">Designation of the person to signature the letter</label>
      <textarea type="text" style="height: 45px" class="form-control input-lg" id="senderdesignation" placeholder="Enter Designation of the person to signature the letter" name="senderdesignation2">Sr.Dy.General manager/Ops/Co-ord.</textarea>
    </div>
    <div class="form-group">
      <input type="checkbox" id="togglecheckdmrccopyto" checked name="check" /><label for="dmrccopyto">Copy to DMRC</label>
      <textarea type="text"  style="height: 85px" class="form-control input-lg" id="dmrccopyto" placeholder="Enter DMRC departments you want to copy to" name="dmrccopyto2">ED/O,ED/Civil,CSC,GM/O/Plg.
Sr.DGM/O-34,Sr.DGM/O-57
Sr.DGM/O-89,DGM/O-2 & DGM/O-16
</textarea><br>
    </div>
    <div class="form-group">
      <input type="checkbox" id="togglecheckpolicecopyto" checked name="check" /><label for="policecopyto">Copy to Police</label>
      <textarea type="text" style="height: 320px" class="form-control input-lg" id="policecopyto" placeholder="Enter police departments you want to copy to" name="policecopyto2">
SSP Ghaziabad,
Raj Nagar,Ghaziabad
UP-201013.
SSP Gautam Buddh Nagar,
Surajpur,Greater Noida
UP-201306.
ACP/DLF Gurugram
DLF Phase-V,sec-43,Sushant lok,
gurugram,Haryana-122002.</textarea>
    </div><br>
    
    <button type="submit" name="submitme" style="color:white; background-color:#33ccff;"class="btn btn-default" id="submitme">Submit</button>
  </form>
</div>
<script type="text/javascript">
   $(function(){
    $("#department").slideToggle();
    $("#receivername").slideToggle();
    $("#receiveraddress").slideToggle();
    $("#subjectofletter").slideToggle();
    $("#bodyofletter").slideToggle();
    $("#sendername").slideToggle();
    $("#senderdesignation").slideToggle();
    $("#dmrccopyto").slideToggle();
    $("#policecopyto").slideToggle();

    $('textarea').keypress(function(event) {
             
        if (event.which == 13) {
          event.preventDefault();
          var s = $(this).val();
          $(this).val(s+"\n");
            }
         });
         $("form").submit(function(){
          $( "#receiveraddress" ).val( $("#receiveraddress" ).val().replace(/\n/g, '<br />'));
          $( "#dmrccopyto" ).val( $("#dmrccopyto" ).val().replace(/\n/g, '<br />'));
          $( "#senderdesignation" ).val( $("#senderdesignation" ).val().replace(/\n/g, '<br />'));
          $( "#policecopyto" ).val( $("#policecopyto" ).val().replace(/\n/g, '<br />'));
          

        
    });
    $('#togglecheckdepartment').change(function () {
    $("#department").slideToggle();
     });
    $('#togglecheckreceivername').change(function () {
    $("#receivername").slideToggle();
     });
    $('#togglecheckreceiveraddress').change(function () {
    $("#receiveraddress").slideToggle();
     });
    $('#togglechecksubjectofletter').change(function () {
    $("#subjectofletter").slideToggle();
     });
    $('#togglecheckbodyofletter').change(function () {
    $("#bodyofletter").slideToggle();
     });
    $('#togglechecksendername').change(function () {
    $("#sendername").slideToggle();
     });
    $('#togglechecksenderdesignation').change(function () {
    $("#senderdesignation").slideToggle();
     });
    $('#togglecheckdmrccopyto').change(function () {
    $("#dmrccopyto").slideToggle();
     });
    $('#togglecheckpolicecopyto').change(function () {
    $("#policecopyto").slideToggle();
     });

   });

</script>
</body>
</html>
