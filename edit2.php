<?php

 $db = mysqli_connect('localhost', 'root', '', 'dmrc_park');
$query = "SELECT DISTINCT(line) FROM stationtable ";
$result = mysqli_query($db,$query);
$str2="";
while($row=mysqli_fetch_array($result))
{
  $str2.= '<option  value="' . $row['line'] .'">' . $row['line'] .'</option>';
} 
        session_start(); 
$no=$_SESSION['contractorno'];
 $query='SELECT * FROM stationinfo WHERE stationuniqueno="'.$no.'"';
 $result= mysqli_query($db, $query);
 while ($row = mysqli_fetch_array($result)) {
         $_SESSION['line']=$row["line"];
         $_SESSION['station']=$row["station"];
         $_SESSION['contractorname']=$row["contractor"];
         $_SESSION['contractorinfo']=$row["contractorinfo"]; 
         
      }
      $code3="";
       $query3='SELECT *  FROM stationtable where line="'. $_SESSION['line']. '"';
      $result3= mysqli_query($db, $query3);
      while ($row = mysqli_fetch_array($result3)) {
    $code3.='<option value="' . $row['stationname'] .'">' . $row['stationname'] .'('.$row['stationcode'].')</option>';
}
      $_SESSION['code3']=$code3;

       
        $_SESSION['lineerror']='0';
    $_SESSION['stationerror']='0';
    $_SESSION['contractorerror']='0';
    $_SESSION['contractorinfoerror']='0';   $code3="";
if(isset($_POST["submit"]))
  {
    $_SESSION['line']=$_POST["line"];
       $_SESSION['station']=$_POST["station"];
       $_SESSION['contractorname']=$_POST["contractorname"];
       $_SESSION['contractorinfo']=$_POST["contractorinfoname"];
$_SESSION['lineerror']=$_POST['dummyerrorline'];
       $_SESSION['stationerror']=$_POST['dummyerrorstation'];
       $_SESSION['contractorerror']=$_POST['dummyerrorcontractor'];
       $_SESSION['contractorinfoerror']=$_POST['dummyerrorcontractorinfo'];
        $query3='SELECT *  FROM stationtable where line="'.$_POST["line"]. '"';
      $result3= mysqli_query($db, $query3);
      while ($row = mysqli_fetch_array($result3)) {
    $code3.='<option value="' . $row['stationname'] .'">' . $row['stationname'] .'('.$row['stationcode'].')</option>';
}
      $_SESSION['code3']=$code3;
      
      
      if($_POST["dummytext"]!='')
     {
       
       

     
     }
    
    else

    {
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
       if($_POST["contractorname"]=='')
       {
      $_SESSION['contractorerror']='1';
       }
   else
       {
      $_SESSION['contractorerror']='0';
       }
      if($_POST["contractorinfoname"]=='')
       {
      $_SESSION['contractorinfoerror']='1';
       }
   else
       {
      $_SESSION['contractorinfoerror']='0';
       }
        if(($_POST["line"]!='*')&&($_POST["station"]!='*')&&($_POST["contractorname"]!='')&&($_POST["contractorinfoname"]!=''))
      {
       $query5="SELECT MAX(stationuniqueno) as stationuniqueno FROM stationinfo";
          $result5= mysqli_query($db, $query5);

     while ($row = mysqli_fetch_array($result5)) {
         $no=$row["stationuniqueno"];
      }
      $no=$no+1;
      $stationcode='DSG';
      $query4='SELECT stationcode FROM stationtable WHERE stationname="'.$_POST["station"].'"';
       $result4= mysqli_query($db, $query4);

     while ($row = mysqli_fetch_array($result4)) {
         $stationcode=$row["stationcode"];
      }
      $query='UPDATE `stationinfo` SET `line`="'.$_POST["line"].'",`station`="'.$_POST["station"].'",`Stationcode`="'.$stationcode.'",`contractor`="'.$_POST["contractorname"].'",`contractorinfo`="'.$_POST["contractorinfo"].'" WHERE `stationuniqueno`="'.$no.'"';
      $result= mysqli_query($db, $query);
       header("location:contractortable.php");
     }
    }
       
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
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
  </style>
  <script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <button onclick="window.location.href='contractortable.php'">Back</button>
<div class="container">
 <h1><u>Edit Contractor no</u>-> <?php echo $no ?></h1><br><br>
 <form action="add2.php" method="post">
  <div id="linelabelerrorid">
 <font size="5px">Line No</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="lineid" name="line">
    <option value="*">Nothing</option>
    <?php echo $str2 ?>
    </select></div><br><br>
 <div id="stationlabelerrorid"><font size="5px">Station</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select id="stationid" name="station">
    <option value="*">Nothing</option>
    <?php echo $_SESSION['code3'] ?>
    </select></div><br><br>
 <div id="contractorlabelerrorid"><font size="5px">Contracter Name</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="contractorid" name="contractorname"><?php echo $_SESSION["contractorname"]?></textarea></div><br><br>

 <div id="contractorinfolabelerrorid"><font size="5px">Contracter Info</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea rows="1" cols="15" style="font-size: 12pt" id="contractorinfoid" name="contractorinfoname"><?php echo $_SESSION["contractorinfo"]?>  </textarea></div><br><br>
  <br><br>
  <input type="text" name="dummytext" id="dummyid" style="display:none;">
  <input type="text" name="dummyerrorline" id="dummyerrorline" style="display:none" value="<?php echo $_SESSION['lineerror'];?>">
  <input type="text" name="dummyerrorstation" id="dummyerrorstation" style="display:none" value="<?php echo $_SESSION['stationerror'];?>">
  <input type="text" name="dummyerrorcontractor" id="dummyerrorcontractor" style="display:none" value="<?php echo $_SESSION['contractorerror'];?>">
  <input type="text" name="dummyerrorcontractorinfo" id="dummyerrorcontractorinfo" style="display:none" value="<?php echo $_SESSION['contractorinfoerror'];?>">
 <button type="submit" name="submit" id="submit"><font size="5px"> Save</font></button>
  </form>
  <script type="text/javascript">
    $(document).ready(function() {

       $("#lineid").val("<?php echo $_SESSION['line'];?>");
       $("#stationid").val("<?php echo $_SESSION['station'];?>");
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
            if($("#dummyerrorcontractorinfo").val()=='1')
            {
              
              $("#contractorinfolabelerrorid").append('<i class="fa fa-remove" style="font-size:25px;color:red"></i><font style="font-size:15px;font-family: italic" class="error"  >Please Enter Contractor Info</font><br>');
            }

     $("#lineid").change(function() {
      
    var el = $(this) ;
     
    $("#dummyid").val(el.val());
    $("#submit").trigger('click');
   
  });
   });
  </script>
</body>
</html>