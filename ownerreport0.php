<?php
require_once('includes/load.php');
?>
<?php
$no= $_SESSION['no2'];
 $db = mysqli_connect('localhost', 'root', '', 'internship');
 $query='SELECT * FROM vehicle WHERE id="'.$no.'"';
 $result= mysqli_query($db, $query);
 //echo $no;
  while ($row=mysqli_fetch_array($result)) {
     $regno=$row['reg_no'];
     $engineno=$row['engine_no'];
     $chassino=$row['chasis_no'];
     $make=$row["maker_model"];
     $model=$row["vehicle_class"];
     $status=$row['categorie_id'];
     $station=$row['station'];
     $ownername=$row["o_name"];
  }  
 // echo $owneraddress;
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
      
       // echo $_POST["ownercopyto2"];
      header("location: ownerreport.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Owner Report</title>
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
  <h2 style="color:#4dd2ff">Enter Owner Letter Details</h2><br>
  <form action="ownerreport0.php" method="POST" id="ownerreportid" name="ownerreportname">
    <div class="form-group">
      <input type="checkbox" id="togglecheckdepartment" checked name="check" /><label for="department">Letter No:</label>
      <textarea type="text" style="height: 45px" class="form-control input-lg form-control-sm" id="department" placeholder="Enter Name of the person to whom you are writing" name="department2">No. DMRC/Ops/AM/O/C&P/Parking/UDV/ <?php echo date("m/Y");?></textarea>
    </div>
    <div class="form-group">
      <input type="checkbox" id="togglecheckreceivername" checked name="check" /><label for="receivername">Name of the person to whom you are writing</label>
      <textarea type="text" style="height: 45px" class="form-control input-lg form-control-sm" id="receivername" placeholder="Enter Name of the person to whom you are writing" name="receivername2"><?php echo $ownername?></textarea>
    </div>
    <div class="form-group" >
      <input type="checkbox" id="togglecheckreceiveraddress" checked name="check" /><label for="receiveraddress">Address of the person to whom you are writing</label>
      <textarea type="text" style="height: 90px" class="form-control input-lg" id="receiveraddress" placeholder="Enter Address of the person to whom you are writing" name="receiveraddress2"></textarea>
    </div>
     <div class="form-group" >
      <input type="checkbox" id="togglechecksubjectofletter" checked name="check" /><label for="subjectofletter">Subject Of The Letter</label>
      <textarea type="text" style="height: 60px" class="form-control input-lg" id="subjectofletter" placeholder="Enter Address of the person to whom you are writing" name="subjectofletter2">Notice for removal of your vehicle having registration number <?php echo $regno?> from Inderlok-5 Metro Station parking lot.</textarea>
    </div>
     <div class="form-group" >
      <input type="checkbox" id="togglecheckbodyofletter" checked name="check" /><label for="bodyofletter">Body of the Letter</label>
      <textarea type="text" style="height: 250px" class="form-control input-lg" id="bodyofletter" placeholder="Enter Address of the person to whom you are writing" name="bodyofletter2">With reference to the above subject, your vehicle having registration no. <?php echo $regno?> was parked in Seelampur Metro Station parking lot for longer period. Vehicles parked for longer period in metro station parking lot were security hazard and security agencies raised serious concern about such vehicles. Therefore, your vehicle was shifted to  Inderlok-5 metro station parking lot. 
               The ownership of above mentioned vehicle is registered on ypur name as per details received from security department of DMRC. You are required to contact Station Manager of Inder Lok metro station ( Station Mob. No. 9084878778) to remove the said vehicle immediately after paying the due charges. If you fail to remove your vehicle <u>within 15 days from the issue of this notice</u>, your vehicle would be auctioned / disposed off and neither parking contractor nor DMRC will be responsible for any kind of claim or compensation.</textarea>
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
      <textarea type="text"  style="height: 85px" class="form-control input-lg" id="dmrccopyto" placeholder="Enter DMRC departments you want to copy to" name="dmrccopyto2">CSC,DGM/O-16
        SM/ILOK
</textarea><br>
    </div>
    <br>
    
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
          $( "#bodyofletter" ).val( $("#bodyofletter" ).val().replace(/\n/g, '<br />'));
          $( "#bodyofletter" ).val( $("#bodyofletter" ).val().replace(/\t/g, '&nbsp;'));
          
        
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
    

   });

</script>
</body>
</html>
