<?php
  $page_title = 'Add Station';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_station'])){
    $req_fields = array('id','station_name','stationh_id','stationh_name','Line_no','size');
    validate_fields($req_fields);
        if(empty($errors)){
          $s_id      = $db->escape((int)$_POST['id']);
          $s_name    = $db->escape($_POST['station_name']);
          $s_lin     = $db->escape((int)$_POST['Line_no']);
          $s_shname  = $db->escape($_POST['stationh_name']);
          $s_shid    = $db->escape($_POST['stationh_id']);
          $s_size    = $db->escape($_POST['size']);
          
          $s_date    = make_date();

          $sql  = "INSERT INTO station (";
          $sql .= "id, station_name, stationh_id, stationh_name,  Line_no, size, date";
          $sql .= ") VALUES (";
          $sql .= " '{$s_id}' , '{$s_name}' , '{$s_shid}' , '{$s_shname}'  , '{$s_lin}' , '{$s_size}' , '{$s_date}'";
          $sql .= ")";

      if($db->query($sql)){
       $session->msg('s',"Station added ");
       redirect('add_station.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('station.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_station.php',false);
   }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary">Find It</button>
            </span>
            <input type="text" id="sug_input" class="form-control" name="title"  placeholder="Search for station name">
         </div>
         <div id="result" class="list-group"></div>
        </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Station</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_station.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="id" placeholder="Station Id">
               </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="station_name" placeholder="Station Name">
               </div>
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="Line_no" placeholder="Line No. ">
               </div>
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="stationh_name" placeholder="Station Head Name">
               </div>
              </div>
              
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="stationh_id" placeholder="Station Head Id ">
               </div>
              </div>
              

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="size" placeholder="Parking Capacity of station">
               </div>
              </div>

              
            <button type="submit" name="add_station" class="btn btn-danger">Add Station</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>



<?php include_once('layouts/footer.php'); ?>
